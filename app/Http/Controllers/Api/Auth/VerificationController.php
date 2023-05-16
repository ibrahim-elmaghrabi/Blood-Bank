<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Requests\Mobile\Auth\LoginRequest;
use App\Http\Requests\Mobile\Auth\VerificationRequest;

class VerificationController extends Controller
{
    public function __invoke(VerificationRequest $request)
    {
        $data = $request->validated();
        $client = Client::where('client_token', $data['client_token'])->first();
        if (!$client) {
            return $this->error(message: 'invalid client token', code: 400);
        }
        $client->update([
            'client_token' => null,
            'pin_code' => null,
            'active' => 1
        ]);
        return $this->success(message: 'please login');
    }
}
