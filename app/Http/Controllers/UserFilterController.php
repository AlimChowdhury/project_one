<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;


class UserFilterController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        $users = User::with(['division', 'district', 'upazila'])->get(); // eager load if needed

        return view('admin.user_filter');
    }

    public function filter(Request $request)
    {
        $query = User::query();

        if ($request->division_id) {
            $query->where('division_id', $request->division_id);
        }

        if ($request->district_id) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->upazila_id) {
            $query->where('upazila_id', $request->upazila_id);
        }

        $users = $query->get();

        return response()->json($users);
    }
}
