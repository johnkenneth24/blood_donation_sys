<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Requests\Donors\StoreRequest;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::sortable()->paginate(10);
        return view('admin.modules.donors.index', compact('donors'));
    }
}
