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
        $client = Client::finOrFail($id);
        return $this->success(message: 'Success', data: new profileResource($client));
    }

    public function update(ProfileRequest $request, $id)
    {
        $data = $request->validated();
        $client = Client::finOrFail($id);
        $client->update($data);
        return $this->apiResponse(1, 'Data Updated Successfully');
    }

    public function changePassword(changePasswordRequest $request, $id)
    {
        $data = $request->validated();
        $client = Client::finOrFail($id);
        if (Hash::check($data['new_password'], $client->password))
        {
            $client->update(['password' => $data['new_password']]);
            return $this->success(message: 'Password Updated Successfully');
        } else {
            return  $this->error(message : 'wrong password', code: 404);
        }


    }

}
