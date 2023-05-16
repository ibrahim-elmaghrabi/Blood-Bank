<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
         $this->middleware('permission:roles-list', ['only' => ['index']]);
         $this->middleware('permission:roles-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:roles-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:roles-delete', ['only' => ['destroy']]);
    }
     public function index()
    {
        $roles = Role::paginate(20);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->attach($request['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Added Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::paginate(20);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role Deleted Successfully');
    }
}
