<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view('admin.modules.donors.index', compact('donors'));
    }

    public function create()
    {
        return view('admin.modules.donors.create');
    }
}
