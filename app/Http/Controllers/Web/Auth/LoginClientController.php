<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }

    public function clientLoginForm()
    {
        return view('frontend.signin-account');
    }

     public function clientLogin(Request $request)
    {
             $data = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

         if (Auth::guard('client-web')->attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            return redirect()->route('clients.home')->with('status', 'You Logged in! ');
         }
    }

    public function clientLogout(Request $request)
    {
       Auth::guard('client-web')->logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('clients.home');
   }

}
