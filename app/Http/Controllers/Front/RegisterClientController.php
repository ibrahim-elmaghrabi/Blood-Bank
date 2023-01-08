<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class RegisterClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function clientRegisterForm(Request $request)
      {
        $bloodTypes = BloodType::all();
        $governorates = Governorate::get(["name","id"]);
        $cities = City::where("governorate_id",$request->governorate_id)
                    ->get(["name","id"]);
        return view('frontend.create-account' ,
         [
          'bloodTypes' => $bloodTypes ,
          'governorates' => $governorates ,
           'cities'       =>$cities ,
           
        ]);
    }

    public function fetchCity(Request $request)
    {
    $data['cities'] = City::where('governorate_id', $request->governorate_id)->get(['name', 'id']);
            return response()->json($data);
   
    }

      public function clientRegister(Request $request)
    {
        $fields = $request->validate([
            'name'      => 'required|string' ,
            'email'     => 'required|email|unique:clients,email' ,
            'phone'     => 'required|unique:clients,phone' ,
            'd_o_b'     => 'required',
            'blood_type_id' => 'required' ,
            'city_id' => 'required',
            'last_donation_date' => 'required' ,
            'password' => 'required|confirmed'
        ]) ;
        
        $client = Client::create($fields);
        if(!$client){
            return back()->with('wrong data');
        }else{
            auth()->guard('client-web')->login($client);
            return redirect()->route('clients.home')->with('status', 'Account Created Successfully');

        }
            
    }
}
