<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class NotificationController extends Controller
{
    use HttpResponse;

    /*
        *register-token,remove-token functions
         *for send Notification  from app to user
        *Attach user with device to send notification
    */
                    
    public function registerToken(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
            'type'  => 'required|in:ios,android',
        ]);
        Token::where('token', $data['token'])->delete();
        $request->user()->tokens()->create($request->all());
        return $this->apiResponse(1, 'Success Token is added');
    }

    /*  remove token function to remove token if the device or mobile log out from the app */
    public function removeToken(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
        ]);

        Token::where('token', $data['token'])->delete();
        return $this->apiResponse(1, 'Success Token Removed');
    }

    public function notificationSettings(Request $request)
    {
        $data = $request->validate([
            "governorates" => 'array',
            "blood_types" => 'array',

        ]);
         $governorates = $request->user()->governorates()->sync($data['governorates']);
         $bloodTypes  = $request->user()->bloodTypes()->sync($data['blood_types']);
        return $this->apiResponse(1, 'Success', ["governorates" => $governorates, "blood_types" => $bloodTypes]);
    }
}
