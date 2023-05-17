<?php

namespace App\Http\Controllers\Web;

use App\Models\{City, BloodType, Governorate, DonationRequest};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\DonationRequestRequest;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web', ['only' => ['create', 'store']]);
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
        $bloodTypes= BloodType::get();
        $cities = City::get();

        return view('frontend.donation_requests', compact('donations', 'bloodTypes', 'cities'));
    }

    public function create(Request $request)
    {
        $bloodTypes= BloodType::get();
        $governorates= Governorate::get(["name","id"]);
        $cities = City::where("governorate_id", $request->governorate_id)->get(["name","id"]);
        return view('frontend.create_donation', compact('bloodTypes', 'governorates', 'cities'));
    }

    public function store(DonationRequestRequest $request)
    {
        $data = $request->validated();
        DonationRequest::create($data + ['client_id'=>  auth('client-web')->id()]);
        return redirect()->route('clients.home')->with('status', 'Donation Created SuccessFully');
    }

    public function show(DonationRequest $donation)
    {
        return view('frontend.inside_request', compact('donation'));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where('governorate_id', $request->governorate_id)->get(['name', 'id']);
        return response()->json($data);
    }

}
