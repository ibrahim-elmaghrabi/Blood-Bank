<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Auth\ClientRequest;

class RegisterController extends Controller
{
    public function register(ClientRequest $request)
    {
        $client = Client::create($request->validated()+ [
            'client_token' => Str::uuid(),
            'pin_code' =>  rand(1111, 9999),
        ]);
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        return $this->success(message: 'verification email code sent, please check your email');
    }
}
