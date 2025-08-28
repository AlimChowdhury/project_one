<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\User;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function filter_user()
    {
        return view('admin.user_filter');
    }

    public function getDistricts($divisionId)
    {
        $districts = District::where('division_id', $divisionId)->get();
        return response()->json($districts);
    }

    public function getUpazilas($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->get();
        return response()->json($upazilas);
    }




}
