<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user-dropdown', compact('users'));
    }



    public function getUserInfo(Request $request)
    {
        $userId = $request->query('q');
        $user = User::find($userId);

        if (!$user) {
            return 'No User Found';
        }

        return "
        <strong>Name:</strong> {$user->name}<br>
        <strong>Email:</strong> {$user->email}<br>
        <strong>Phone:</strong> {$user->phone}<br>
        <strong>Bio:</strong> {$user->bio}<br>
        <strong>Division:</strong> {$user->division->name}<br>
        <strong>District:</strong> {$user->district->name}<br>
        <strong>Upazila:</strong> {$user->upazila->name}<br>           
        ";
    }
}
