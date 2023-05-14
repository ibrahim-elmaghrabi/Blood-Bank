<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Http\Controllers\Controller;
use App\Http\Resources\BasicDataResource;

class BloodTypeController extends Controller
{
    public function index()
    {
        return $this->success(message: "Success", data: BasicDataResource::collection(BloodType::paginate(10)));
    }

}
