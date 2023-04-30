<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonationResource;
use App\Http\Requests\Mobile\DonationRequestRequest;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
            if ($request->has('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            if ($request->has('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })->with('bloodType', 'city', )->paginate(10);
        return $this->success(message: 'Success', data: DonationResource::collection($donations));
    }

    public function show(DonationRequest $donationRequest)
    {
        return $this->success(message:'Success', data: new DonationResource($donationRequest));
    }

    public function store(DonationRequestRequest $request)
    {
        $donationRequest = DonationRequest::create($request->validated()+ ['client_id'=> auth()->id()]);
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
        return $this->apiResponse(message: "Donation Request Created Successfully");
    }
}
