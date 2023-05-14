<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use App\Mail\ResetPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ResetPasswordResource;
use App\Http\Requests\Mobile\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = Client::where('phone', $request['phone'])->first();
        if ($user) {
            $code = rand(1111, 9999);
            $user->pin_code = $code;
            $user->save();
            Mail::to($user->email)->bcc('bloodbank200022@gmail.com')->send(new ResetPassword($user));
            return $this->success(message: 'please check your email');
        } else {
            return $this->error(message: 'this phone not found', code: 404);
        }
    }

    public function newPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $user = Client::where('pin_code', $data['pin_code'])->where('pin_code', '!=', 0)->first();
        if ($user) {
            $user->password = $data->password;
            $user->pin_code = null;
            $user->save();
            return $this->success(message: 'success, please login');
        } else {
            return $this->error(message: 'not valid pin code', code: 400);
        }
    }


}
