<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createUserRequest $request)
    {
       (new \App\Models\User)->createUser($request);
       return redirect()->route('user.index')->with('message', 'کاربر ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        User::updateUser($request, $user);
        return redirect()->route('user.index')->with('message', 'کاربر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userRole($id)
    {
        $user = User::query()->find($id);
        $roles = Role::query()->get();
        return view('admin.role.user_role', compact('user', 'roles'));
    }

    public function storeUserRole(Request $request , $id)
    {
        $user = User::query()->find($id);
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->with('message', 'نقش به کاربر متصل شد');

    }
}
