<?php

namespace App\Http\Controllers\Mobile\Auth;

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
        $client = Client::where('phone', $request->phone)->first() ;
        if (!$client || !Hash::check($request['password'], $client->password)) {
            return $this->error(message: 'wrong phone or password', code: 404);
        }
         $token =$client->createToken('Api Token of' .$client->name)->plainTextToken ;
         return $this->success(message: 'success', data: new LoginResource($token));
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success(message: 'logged out');
    }
}
