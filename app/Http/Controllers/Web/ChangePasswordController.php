<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\changePasswordRequest;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web');
    }

    public function edit()
    {
        return view('frontend.change_password');
    }


    public function update(changePasswordRequest $request)
    {
        $data = $request->validated();
        if (!Hash::check($data['current_password'], auth('client-web')->user()->password)) {
            return back()->with('status', 'Current password not correct');
        } else {
           auth('client-web')->user()->update([
            'password' => $data['password']
           ]);
        }
    }
}
