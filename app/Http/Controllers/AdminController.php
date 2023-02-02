<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        $donors = Donor::all();

        $donCount = $donors->where('status', 'donated')->count();

        $bloodCount = Donor::sum('bag_blood');

        $male = $donors->where('gender', 'Male')->where('status', 'donated')->count();
        $female = $donors->where('gender', 'Female')->where('status', 'donated')->count();

        $pA = $donors->where('blood_type', 'A+')->where('status', 'donated')->count();
        $pB = $donors->where('blood_type', 'B+')->where('status', 'donated')->count();
        $pAB = $donors->where('blood_type', 'AB+')->where('status', 'donated')->count();
        $pO = $donors->where('blood_type', 'O+')->where('status', 'donated')->count();
        $nA = $donors->where('blood_type', 'A-')->where('status', 'donated')->count();
        $nB = $donors->where('blood_type', 'B-')->where('status', 'donated')->count();
        $nAB = $donors->where('blood_type', 'AB-')->where('status', 'donated')->count();
        $nO = $donors->where('blood_type', 'O-')->where('status', 'donated')->count();



        return view('admin.dashboard', compact('donCount', 'male', 'female', 'bloodCount', 'pA', 'pB', 'pAB', 'pO', 'nA', 'nB', 'nAB', 'nO'));

    }

}
