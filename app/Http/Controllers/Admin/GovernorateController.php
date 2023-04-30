<?php

namespace App\Http\Controllers\Admin;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GovernorateRequest;

class GovernorateController extends Controller
{

    public function __construct()
    {
         $this->middleware('permission:governorate-list' , ['only' => ['index']] );
         $this->middleware('permission:governorate-create',['only' => ['create' , 'store']] );
         $this->middleware('permission:governorate-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:governorate-delete',['only' => ['destroy']] );
    }

    public function index()
    {
        $governorate = Governorate::paginate(20);
        return view('admin.governorates.index', compact('governorate'));
    }


    public function create()
    {
        return view('admin.governorates.create');
    }


    public function store(GovernorateRequest $request)
    {
        Governorate::create($request->validated());
        return redirect()->route('governorates.index')->with('status', 'Governorate Created Successfully');
    }

    public function edit(Governorate $governorate)
    {
        return view('admin.governorates.edit', compact('governorate'));
    }

    public function update(GovernorateRequest $request, Governorate $governorate)
    {
        $governorate->update($request->validated());
        return redirect()->route('governorates.index')->with('status', 'Governorate updated Successfully');
    }

    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return redirect()->route('governorates.index')->with('status', 'governorate Deleted Successfully');
    }
}
