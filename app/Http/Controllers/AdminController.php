<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use Auth;
use Gate;

class AdminController extends Controller
{
    public function dashboard()
    {
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

    public function update(Request $request, User $user)
    {
        //\Log::info('Update request received for user ID: ' . $user->id);
        //\Log::info($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'bio']));

        return redirect()->route('admin.user_filter')->with('success', 'User updated successfully!');
    }



}
