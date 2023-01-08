<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProfileResource;
use App\Models\Client;
use App\Mail\ResetPassword;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LoginClientRequest;
use App\Http\Requests\StoreClientRequest;


class AuthController extends Controller
{
    use HttpResponse;

    public function register(StoreClientRequest $request)
    {
        $request->validated($request->all());
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'd_o_b' => $request->d_o_b,
            'blood_type_id' => $request->blood_type_id,
            'city_id' => $request->city_id,
            'last_donation_date' => $request->last_donation_date,
            'password' => bcrypt($request->password),
        ]);
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        
        $token =$client->createToken('Api Token of' .$client->name)->plainTextToken ;
        return $this->success($client, $token);
    }

    
    public function login(LoginClientRequest $request)
    {
        $request->validated($request->all());
        $client = Client::where('phone', $request->phone)->first() ;
        if (!$client || !Hash::check($request['password'], $client->password)) {
            return $this->error('', 'wrong Credentials', 403);
        }
         $token =$client->createToken('Api Token of' .$client->name)->plainTextToken ;
         return $this->success($client, $token);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->success('', 'you logged out');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required' ,
        ]);
        $user = Client::where('phone', $data['phone'])->first();
        if ($user) {
            $code = rand(1111, 9999);
            $user->pin_code = $code;
            $update = $user->save();
            if ($update) {
                Mail::to($user->email)->bcc('bloodbank200022@gmail.com')->send(new ResetPassword($user));
                return $this->apiResponse(1, 'please check your Email', ['reset_code' => $code]);
            } else {
                return $this->apiResponse(0, 'Error happened please try gain');
            }
        } else {
            return $this->apiResponse(0, 'this phone not found');
        }
    }

    public function newPassword(Request $request)
    {
        $data = $request->validate([
            'pin_code' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = Client::where('pin_code', $data['pin_code'])->where('pin_code', '!=', 0)->first();
        if ($user) {
            $user->password = bcrypt($data['password']);
            $user->pin_code = null;
            if ($user->save()) {
                return $this->apiResponse(1, 'password changed Successfully !');
            } else {
                return $this->apiResponse(0, 'there were an error please try again !');
            }
        } else {
            return $this->apiResponse(0, 'pin code is not valid !');
        }
    }

    public function profile(Request $request)
    {
        $validation= validator()->make($request->all(), [
            'password' => 'confirmed',
            'email'=> 'unique:clients,email,'.$request->user()->id,
            'phone'=> 'unique:clients,phone,'.$request->user()->id,
        ]);
        if($validation->fails())
        {
             $validation->errors();
            return $this->error(0, 'Failed', 403);
        }
        $loginUser = $request->user();
        $loginUser->update($request->all());
        if($request->has('password'))
        {
            $loginUser->password = bcrypt($request->password);
        }
        $loginUser->save();
        return $this->apiResponse(1, 'Data Updated Successfully', new ProfileResource($loginUser));
    }

}
 