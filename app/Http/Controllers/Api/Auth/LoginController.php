<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\LoginResource;
use App\Http\Requests\Mobile\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        $client = Client::with('bloodType')->where('phone', $request->phone)->first();
        if (! $client) {
            dd('ss');
            return $this->error(message: 'wrong phone or password', code: 404);
        }
        $client->_token  = $client->createToken('clientToken')->plainTextToken;
         return $this->success(message: 'success', data: LoginResource::make($client));
    }

    // public function logout()
    // {
    //     Auth::user()->currentAccessToken()->delete();
    //     return $this->success(message: 'logged out');
    // }

}
