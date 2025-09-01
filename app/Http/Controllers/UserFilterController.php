<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\User;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Auth;
use Log;

class UserFilterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $divisions = Division::all();
        $districts = collect();
        $upazilas = collect();
        $users = User::with(['division', 'district', 'upazila'])->get();

        return view('user-dropdown', compact('user', 'divisions', 'districts', 'upazilas', 'users'));
    }

    public function filterUsers(Request $request)
    {
        // Log::info(' Laravel received:', $request->only(['division_id', 'district_id', 'upazila_id']));
        //dd($request->all());

        $query = User::with(['division', 'district', 'upazila']);

        if ($request->division_id) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->district_id) {
            $query->where('district_id', $request->district_id);
        }
        if ($request->upazila_id) {
            $query->where('upazila_id', $request->upazila_id);
        }

        if ($request->created_date) {
            $query->whereDate('created_at', $request->created_date);
        }

        // $users = $query->get();
      //  $users = $query->paginate(3)->appends($request->all()); //show * user
           $users = User::paginate(3); 

        return view('partials.user-table', compact('users'));
    }

    public function getDistricts($divisionId)
    {
        return response()->json(District::where('division_id', $divisionId)->get());
    }

    public function getUpazilas($districtId)
    {
        return response()->json(Upazila::where('district_id', $districtId)->get());
    }
}

