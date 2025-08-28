<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class AuthController extends Controller
{

    //Registration

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'viewer'
        ]);

       //dd(Auth::login(($user)));
        //return view('posts.index');

        return redirect()->route('login')->with('Success', 'Registration Successfully. Please Log In.');

    }

    //Login

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role and include user ID in URL
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard', ['id' => $user->id]);
            }

            // For regular users, you can create a user-specific route
            return redirect()->route('posts.index', ['id' => $user->id]);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
