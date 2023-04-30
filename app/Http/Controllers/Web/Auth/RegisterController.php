<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\City;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function clientRegisterForm(Request $request)
      {
        $bloodTypes = BloodType::all();
        $governorates = Governorate::get(["name","id"]);
        $cities = City::where("governorate_id", $request->governorate_id)
                    ->get(["name","id"]);
        return view('frontend.create-account',
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

      public function clientRegister(RegisterRequest $request)
    {
        $client = Client::create($request->validated());
        auth()->guard('client-web')->login($client);
        return redirect()->route('clients.home')->with('status', 'Account Created Successfully');
    }

}
