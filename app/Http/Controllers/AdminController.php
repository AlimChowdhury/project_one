<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Gate;

class AdminController extends Controller
{
    public function dashboard() {
    return view('admin.dashboard');
}


    public function listUsers($id)
    {
        Gate::authorize('access-admin', $id);

        $users = User::all();
        return view('admin.users', compact('users'));
    }

     public function editPermissions($id, $userId)
    {
        Gate::authorize('access-admin', $id);

        $user = User::findOrFail($userId);
        $permissions = Permission::all();
        return view('admin.assign', compact('user', 'permissions'));
    }

    public function updatePermissions(Request $request, $id, $userId)
    {
        Gate::authorize('access-admin', $id);

        $user = User::findOrFail($userId);
        $user->permissions()->sync($request->permissions);
        return redirect()->route('admin.users', $id)->with('success', 'Permissions updated!');
    }
}
