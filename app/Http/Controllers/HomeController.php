<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function landingHome()
    {
        $events = Event::orderBy('date', 'desc')->paginate(4);
        return view('modules.home.home', compact('events'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ]);

        // dd($validatedData);
        Mail::to('teamdev2023@gmail.com')->send(new ContactUsMail($request->all()));

        return back()->with('message', 'Your message was sent successfully!');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactUsMail($validatedData));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
