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

    public function landingHome()
    {
        return view('modules.landingpage.home.home');
    }

    public function about()
    {
        return view('modules.landingpage.about.about');
    }

    public function blog()
    {
        return view('modules.landingpage.blog.blog');
    }

    public function contact()
    {
        return view('modules.landingpage.contact.contact');
    }

    public function login()
    {
        return view('auth.login');
    }
}
