<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('created_at', 'desc')->paginate(10);


        return view('web.dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $roles = Role::all();

        return view('web.dashboard.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( UserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, )
    {
        $roles = Role::all();
        return view('web.dashboard.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        dd($data);
        $user->update($data);
        $user->syncRoles([$request->roles]);
        return redirect()->back()->with('success','updated User Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->with('success','deleted Permission Successfully!');
    }
}

