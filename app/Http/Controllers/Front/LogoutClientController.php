<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutClientController extends Controller
{
      public function clientLogout(Request $request)
     {
        Auth::guard('client-web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('clients.home');
    }
}
