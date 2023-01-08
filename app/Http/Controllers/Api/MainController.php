<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\BloodType;
use App\Models\Governorate;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\BloodTypeResource;
use App\Http\Resources\GovernorateResource;
use App\Http\Resources\SettingResource;

class MainController extends Controller
{
    use HttpResponse;

    public function governorates()
    {
        return $this->apiResponse(1, "SuccessRequest", GovernorateResource::collection(Governorate::all()));
    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        return $this->apiResponse(1, "SuccessRequest", CityResource::collection($cities));
    }

    public function bloodTypes()
    {
        return $this->apiResponse(1, "Success Request", BloodTypeResource::collection(BloodType::all()));
    }
    
   

    public function message(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($data);
        return $this->apiResponse(1, 'Message Sent Successfully !');
    }
    public function settings()
    {
        return $this->apiResponse(1, "Success Request", new SettingResource(Setting::first()));
    }
}
