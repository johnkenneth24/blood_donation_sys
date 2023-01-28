<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterDonor\StoreRequest;
use App\Models\Event;

class HomeController extends Controller
{
    public function landingHome()
    {
        $events = Event::orderBy('date', 'desc')->paginate(4);
        return view('modules.home.home', compact('events'));
    }

    public function blog()
    {
        return view('modules.blog_page.read-blog');
    }
}
