<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\Auth\LoginRequest;

class LoginClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function LoginForm()
    {
        return view('frontend.sign_in_account');
    }

     public function Login(LoginRequest $request)
    {
        $data = $request->validated();
         if (Auth::guard('client-web')->attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            return redirect()->route('clients.home')->with('status', 'You Logged in! ');
         }
    }

    public function Logout(Request $request)
    {
       Auth::guard('client-web')->logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('clients.home');
   }

}
