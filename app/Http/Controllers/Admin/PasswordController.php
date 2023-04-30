<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.passwords.edit');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validated();
        if (! Hash::check($data['current_password'], auth()->user()->password)) {
            return back()->with('status', 'Current password not correct');
        } else {
            $update = auth()->user()->update(['password' => $data['password'] ]);
            if ($update) {
                return back()->with('status', 'Password Updated Successfully');
            } else {
                return back()->with('status', 'Error Happen please try Again');
            }
        }
    }
}
