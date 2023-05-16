<?php

namespace App\Http\Controllers\Api\Auth;

 use App\Models\Client;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Mobile\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = Client::where('phone', $request['phone'])->first();
        if ($user) {
            $user->pin_code = rand(1111, 9999);
            $user->client_token = Str::uuid();
            $user->save();
         //   Mail::to($user->email)->bcc('bloodbank200022@gmail.com')->send(new ResetPassword($user));
            return $this->success(message: 'please check your email', data: ['token' => $user->client_token]);
        } else {
            return $this->error(message: 'this phone not found', code: 404);
        }
    }

    public function newPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $user = Client::where('client_token', $data['client_token'])->where('client_token', '!=', null)->first();
        if ($user) {
            if ($data['pin_code'] == $user->pin_code) {
                $user->update([
                        'pin_code' => null,
                        'client_token' => null,
                        'password' => $data['password']
                ]);
                return $this->success(message: 'success, please login');
            } else {
                return $this->error(message: 'not valid pin code', code: 400);
            }
        } else {
            return $this->error(message: 'user not found', code: 404);
        }
    }


}
