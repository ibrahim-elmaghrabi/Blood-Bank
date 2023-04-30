<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Requests\Mobile\ProfileRequest;

class ProfileController extends Controller
{

    public function edit(Client $client)
    {
        return $this->success(message: 'Success', data: new profileResource($client));
    }

    public function update(ProfileRequest $request)
    {
        $validation= validator()->make($request->all(), [
            'password' => 'confirmed',
            'email'=> 'unique:clients,email,'.$request->user()->id,
            'phone'=> 'unique:clients,phone,'.$request->user()->id,
        ]);
        if ($validation->fails())
        {
             $validation->errors();
            return $this->error(0, 'Failed', 403);
        }
        $loginUser = $request->user();
        $loginUser->update($request->all());
        if ($request->has('password'))
        {
            $loginUser->password = bcrypt($request->password);
        }
        $loginUser->save();
        return $this->apiResponse(1, 'Data Updated Successfully', new ProfileResource($loginUser));
    }

}
