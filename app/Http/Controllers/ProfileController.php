<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function edit()
    {
        $user = Auth::user();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        return view('profile.edit', compact('user', 'divisions', 'districts', 'upazilas'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id = $request->upazila_id;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated!');
    }

}
