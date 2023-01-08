<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;


class ResetClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client-web');
    }
    
    public function resetPage(){
        return view('frontend.forgetPassword');
    }

    public function sendCode(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email' ,
        ]);
        $user = Client::where('email', $data['email'])->first();
        if ($user) {
            $code = rand(1111, 9999);
            $user->pin_code = $code;
            $user->save();

            Mail::to($user->email)->send(new ResetPassword($user));
            return view('frontend.reset-password');
           
        }
        else {
            return back()->with('status' , 'email not found');
        }
    }

    public function resetClientPassword(Request $request){
         $data = $request->validate([
            'pin_code' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Client::where('pin_code', $data['pin_code'])->where('pin_code', '!=', 0)->first();
        if ($user) {
            $data['password'] = bcrypt($data['password']);
            $user->pin_code = null;
            $user->password = $data['password'] ;
            $user->save();
            return redirect()->route('clients-web.login-page');
            
        }else{
            return back();
        }
    }
}
