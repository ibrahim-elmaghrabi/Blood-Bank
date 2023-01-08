<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role  ;

class UserController extends Controller
{

     public function __construct()
    {
         $this->middleware('permission:user-list' , ['only' => ['index']] );
         $this->middleware('permission:user-create' , ['only' => ['create' , 'store']] );
         $this->middleware('permission:user-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:user-delete' , ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create' , ['roles' => $roles]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,',
            'password' => 'confirmed',
            'roles_list' => 'required|array' ,
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->roles()->attach($data['roles_list']);
        return redirect()->route('users.index')->with('status', 'User Created Successfully');

    }

    public function edit( User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user , 'roles' => $roles]);
    }

    public function update(Request $request , User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'roles_list' => 'required|array' ,
        ]);
        if($request->has('password')){
             $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        $user->roles()->sync($data['roles_list']);
        return redirect()->route('users.index')->with('status', 'User updated Successfully');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'User Deleted Successfully');
    }

}
