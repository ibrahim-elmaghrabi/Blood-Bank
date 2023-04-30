<?php

namespace App\Http\Controllers\mobile;

use App\Models\BloodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BloodTypeResource;

class BloodTypeController extends Controller
{
    public function bloodTypes()
    {
        return $this->success(message: "Success", data: BloodTypeResource::collection(BloodType::paginate(10)));
    }

}
