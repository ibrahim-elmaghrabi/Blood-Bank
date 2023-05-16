<?php

namespace App\Http\Controllers\Admin;

use App\Models\BloodType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BloodTypeRequest;

class BloodTypeController extends Controller
{
    public function  __construct()
    {
         $this->middleware('permission:blood_types-list', ['only' => ['index']]);
         $this->middleware('permission:blood_types-create', ['only' => ['create' , 'store']]);
         $this->middleware('permission:blood_types-edit', ['only' => ['edit' , 'update']]);
         $this->middleware('permission:blood_types-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = BloodType::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(BloodTypeRequest $request)
    {
        BloodType::create($request->validated());
        return redirect()->route('categories.index')->with('status', 'bloodType Created Successfully');
    }

    public function edit(BloodType $bloodType)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(BloodTypeRequest $request, bloodType $bloodType)
    {
        $bloodType->update($request->validated());
        return redirect()->route('categories.index')->with('status', 'bloodType Updated Successfully');
    }

    public function destroy(BloodType $bloodType)
    {
        $bloodType->delete();
        return redirect()->route('categories.index')->with('status', 'bloodType Deleted Successfully');
    }
}
