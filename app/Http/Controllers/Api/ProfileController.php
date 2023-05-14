<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProfileResource;
use App\Http\Requests\Mobile\ProfileRequest;
use App\Http\Requests\Mobile\changePasswordRequest;

class ProfileController extends Controller
{

    public function edit($id)
    {
        $client = Client::with('bloodType', 'city')->findOrFail($id);
        return $this->success(message: 'Success', data: profileResource::make($client));
    }

    public function updateData(clientRequest $request)
    {
        $data = $request->validated();
        $client = Client::find(auth()->id());
        $client->update($data);
        return $this->apiResponse(1, 'Data Updated Successfully');
    }

    public function changePassword(changePasswordRequest $request)
    {
        $data = $request->validated();
        $client = Client::find(auth()->id());
        if (Hash::check($data['password'], $client->password)) {
            $client->update(['password' => $data['new_password']]);
            return $this->success(message: 'Password Updated Successfully');
        } else {
            return  $this->error(message : 'wrong password', code: 404);
        }
    }

}
