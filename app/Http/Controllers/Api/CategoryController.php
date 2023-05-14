<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasicDataResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return $this->success(message: "Success", data: BasicDataResource::collection(Category::paginate(10)));
    }

}
