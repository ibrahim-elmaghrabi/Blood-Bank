<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\{City, Client, BloodType, Governorate};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\ClientRequest;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function create(Request $request)
    {
        $bloodTypes = BloodType::all();
        $governorates = Governorate::get(["name","id"]);
        $cities = City::where("governorate_id",$request->governorate_id)->get(["name","id"]);
        return view('frontend.create_account', compact('bloodTypes', 'governorates', 'cities'));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where('governorate_id', $request->governorate_id)->get(['name', 'id']);
        return response()->json($data);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        $client = Client::create($data);
        if (! $client ){
            return back()->with('wrong data');
        } else {
            auth()->guard('client-web')->login($client);
            return redirect()->route('clients.home')->with('status', 'Account Created Successfully');
        }
    }
}
