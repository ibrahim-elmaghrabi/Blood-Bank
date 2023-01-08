<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
         $this->middleware('permission:role-list' , ['only' => ['index']] );
         $this->middleware('permission:role-create' , ['only' => ['create' , 'store']] );
         $this->middleware('permission:role-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:role-delete' , ['only' => ['destroy']] );
        
    }
     public function index()
    {
        $roles = Role::paginate(20);
        return view('admin.roles.index', ['roles' => $roles]);
    }

    
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', ['permissions' => $permissions]);
    }

     
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name' ,
            'permission_list' => 'required|array'
        ]);
        $role = Role::create($data);
        $role->permissions()->attach($data['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Added Successfully');
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', ['role' => $role ,  'permissions' => $permissions ] );
    }

  
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id  ,
            'permission_list' => 'required|array'
        ]);
        $role->update($data);
        $role->permissions()->sync($data['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Updated Successfully');

    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role Deleted Successfully');

    }
}
