<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\Incident;
use App\Models\Complaint;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    public function home()
    {
        return view('modules.landingpage.index');
    }

    public function login()
    {
        return view('auth.login');
    }
}
