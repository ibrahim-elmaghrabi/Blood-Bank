<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;

class CityController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:city-list', ['only' => ['index']]);
         $this->middleware('permission:city-create', ['only' => ['create' , 'store']]);
         $this->middleware('permission:city-edit', ['only' => ['edit' , 'update']]);
         $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cities = City::paginate(20);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $select = Governorate::pluck('name', 'id');
        return view('admin.cities.create', compact('select'));
    }

    public function store(CityRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('cities.index')->with('status', 'City Created Successfully');
    }

    public function edit(City $city)
    {
        $select = Governorate::pluck('name', 'id');
        return view('admin.cities.edit', [
            'city' => $city,
            'select' => $select
        ]);
    }

    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('status', 'City Updated Successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('status', 'City Deleted Successfully');
    }
}
