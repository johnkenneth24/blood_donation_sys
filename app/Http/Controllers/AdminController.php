<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.dashboard');
    }
}
