<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        $donors = Donor::all();

        $donCount = $donors->count();

        $bloodCount = Donor::sum('bag_blood');

        $male = $donors->where('gender', 'Male')->count();
        $female = $donors->where('gender', 'Female')->count();

        $pA = $donors->where('blood_type', 'A+')->count();
        $pB = $donors->where('blood_type', 'B+')->count();
        $pAB = $donors->where('blood_type', 'AB+')->count();
        $pO = $donors->where('blood_type', 'O+')->count();
        $nA = $donors->where('blood_type', 'A-')->count();
        $nB = $donors->where('blood_type', 'B-')->count();
        $nAB = $donors->where('blood_type', 'AB-')->count();
        $nO = $donors->where('blood_type', 'O-')->count();



        return view('admin.dashboard', compact('donCount', 'male', 'female', 'bloodCount', 'pA', 'pB', 'pAB', 'pO', 'nA', 'nB', 'nAB', 'nO'));

    }

}
