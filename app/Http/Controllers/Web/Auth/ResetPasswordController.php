<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\Client;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Web\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function resetPage()
    {
        return view('frontend.forgetPassword');
    }

    public function sendCode(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $user = Client::where('email', $data['email'])->first();
        if ($user) {
            $code = rand(1111, 9999);
            $user->pin_code = $code;
            $user->save();
            Mail::to($user->email)->send(new ResetPassword($user));
            return view('frontend.reset_password');
        } else {
            return back()->with('status', 'email not found');
        }
    }

    public function resetClientPassword(ResetPasswordRequest $request)
    {
        $user = Client::where('pin_code', $request['pin_code'])->where('pin_code', '!=', 0)->first();
        if ($user) {
            $user->pin_code = null;
            $user->password = $request['password'] ;
            $user->save();
            return redirect()->route('clients-web.login-page');
        } else {
            return back();
        }
    }
}
