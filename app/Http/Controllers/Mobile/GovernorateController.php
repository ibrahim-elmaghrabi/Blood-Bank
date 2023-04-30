<?php

namespace App\Http\Controllers\mobile;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GovernorateResource;

class GovernorateController extends Controller
{
    public function index()
    {
        return $this->success(message: "Success", data: GovernorateResource::collection(Governorate::paginate(10)));
    }

}
