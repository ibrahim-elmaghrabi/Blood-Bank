<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $client = Client::create($request->validated());
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        return $this->success(message: 'please login');
    }
}
