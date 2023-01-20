<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterDonor\StoreRequest;
use App\Models\Event;

class HomeController extends Controller
{
    // public function home()
    // {
    //     return view('modules.home.home');
    // }

    public function landingHome()
    {
        $bloodtypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'I dont know'];
        $gender = ['Male', 'Female', 'Prefer not to say'];

        $events = Event::orderBy('date', 'desc')->paginate(3);

        return view('modules.home.home', compact('bloodtypes', 'gender', 'events'));
    }

    public function register(StoreRequest $request)
    {
        $validated = $request->validated();
        dd($validated);

        return redirect()->route('home');
    }
}
