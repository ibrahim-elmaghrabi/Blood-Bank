<?php

namespace App\Http\Controllers\Api;

use App\Models\Governorate;
use App\Http\Controllers\Controller;
use App\Http\Resources\BasicDataResource;

class GovernorateController extends Controller
{
    public function index()
    {
        return $this->success(message: "Success", data: BasicDataResource::collection(Governorate::paginate(10)));
    }

}
