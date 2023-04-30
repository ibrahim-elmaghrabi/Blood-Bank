<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role  ;
use App\Http\Requests\Admin\UserRequest;

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
        $roles = Role::paginate(20);
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->attach($request['roles_list']);
        return redirect()->route('users.index')->with('status', 'User Created Successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::paginate(20);
        return view('admin.users.edit', ['user' => $user , 'roles' => $roles]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request['roles_list']);
        return redirect()->route('users.index')->with('status', 'User updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'User Deleted Successfully');
    }

}
