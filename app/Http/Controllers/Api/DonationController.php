<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonationResource;

class DonationController extends Controller
{
    use HttpResponse ;
        public function donations(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
            
            if ($request->has('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            if ($request->has('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })->with('bloodType')->get();
        return $this->apiResponse(1, "Request Success", DonationResource::collection($donations));
    }


    public function donation(DonationRequest $donationRequest)
    {
        return $this->apiResponse(1, "Request Success", new DonationResource($donationRequest));

        
    }

    public function createDonation(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'age'      => 'required' ,
            'city_id'  => 'required',
            'details'  => 'required',
            'latitude' =>'required' ,
            'longitude'=>'required',
            'blood_type_id'   => 'required',
            'hospital_name'   => 'required',
            'hospital_address'=> 'required',
            'bags_num'        => 'required',
        ]);
        $data['client_id'] = $request->user()->id;
        $donationRequest = DonationRequest::create($data);
         /* find clients that suitable for donation request ( blood type , city) */
        $clientsIds = $donationRequest->city->governorate->
            clients()->whereHas('bloodTypes', function ($q) use ($donationRequest) {
                $q->where('blood_types.id', $donationRequest->blood_type_id);
            })->pluck('clients.id')->toArray();

        if (count($clientsIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'new donation request ',
                'content' => 'we need donator to blood type'.$donationRequest->bloodType->name
            ]);
            $notification->clients()->attach($clientsIds);
            /// send notification to mobile phones (using FCM firebase Cloud messaging )
            $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)
            ->pluck('token')->toArray();
            if (count($tokens)) {
                $title = $notification->title;
                $body  = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id
                ];
                 $this->notifyByFirebase($title, $body, $tokens, $data);
            }
        }

        return $this->apiResponse(1, "Success Request", new DonationResource($donationRequest));
    }
}
