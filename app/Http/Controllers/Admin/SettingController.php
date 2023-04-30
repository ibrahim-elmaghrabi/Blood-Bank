<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;

class SettingController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:settings-edit', ['only' => ['edit' , 'update']] );

    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }


    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());
        return back()->with('status', 'Settings Updated Successfully');
    }

}
