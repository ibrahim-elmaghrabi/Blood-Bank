<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web', ['only' => ['addDonation', 'store']]);
    }
    
    public function index(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
        
        if ($request->has('city_id')) {
            $query->where('city_id', $request->city_id);
        }
        if ($request->has('blood_type_id')) {
            $query->where('blood_type_id', $request->blood_type_id);
        }
        })->paginate(5);
        $bloodTypes= BloodType::all();
        $cities = City::all();

        return view('frontend.donation-requests',
         [
          'donations' => $donations,
          'bloodTypes'=> $bloodTypes,
          'cities'    => $cities ,
        
        ]);
    }

    
    public function addDonation(Request $request)
    {
         
        $bloodTypes = BloodType::all();
        $governorates = Governorate::get(["name","id"]);
        $cities = City::where("governorate_id",$request->governorate_id)->get(["name","id"]);
        return view('frontend.create-donation',[
            'bloodTypes'    => $bloodTypes ,
            'governorates'  => $governorates ,
            'cities'        => $cities
        ]);
        
        
    }
     public function fetchCity(Request $request)
    {
         $data['cities'] = City::where('governorate_id',$request->governorate_id)->get(['name', 'id']);
         return response()->json($data);
   
    }

    public function store(Request $request)
    {
        
            $data = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'age' => 'required',
                'city_id' => 'required',
                'details' => 'required',
                'blood_type_id' => 'required',
                'hospital_name' => 'required',
                'hospital_address' => 'required',
                'bags_num' => 'required',

            ]);
            $data['client_id'] = auth('client-web')->user()->id;
            DonationRequest::create($data);
            return redirect()->route('clients.home')->with('status', 'Donation Created SuccessFully');
        
    }
    

    
    public function show(DonationRequest $donationRequest)
    {
        return view('frontend.inside-request', [
            'donationRequest' => $donationRequest
        ]);
    }

    
}
