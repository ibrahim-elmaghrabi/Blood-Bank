<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class PasswordController extends Controller
{
    public function edit(){
        return view('admin.passwords.edit');
    }

    public function update(Request $request , User $user){
        $data = $request->validate([
            'current_password' => 'required' ,
            'password' => 'required|confirmed|min:8'
        ]);
        if(!\Hash::check($data['current_password'], auth()->user()->password)){
            return back()->with('status', 'Current password not correct');
        }else{
            $data['password'] = bcrypt($data['password']);
            $update = auth()->user()->update(['password' => $data['password'] ]);
            if($update){
                return back()->with('status', 'Password Updated Successfully');
            }else{
                return back()->with('status', 'Error Happen please try Again');
            }

        }
        
         

    }
}
