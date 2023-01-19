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
        return view('modules.home.home');
    }

    public function about()
    {
        return view('modules.about.about');
    }

    public function blog()
    {
        return view('modules.blog.blog');
    }

    public function contact()
    {
        return view('modules.contact.contact');
    }
}
