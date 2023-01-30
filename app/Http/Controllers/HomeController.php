<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function landingHome()
    {
        $events = Event::orderBy('date', 'desc')->paginate(4);
        return view('modules.home.home', compact('events'));
    }
}
