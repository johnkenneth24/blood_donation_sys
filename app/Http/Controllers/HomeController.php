<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landingHome()
    {
        $events = Event::orderBy('date', 'desc')->paginate(4);
        return view('modules.home.home', compact('events'));
    }

    // public function sendFeedback(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required',
    //     ]);

    //     Mail::send('modules.home.home', $data, function($message) use ($data) {
    //         $message->to('teamdev2023@gmail.com', 'Recipient Name')
    //             ->subject('New Feedback');
    //         $message->from($data['email'], $data['name']);
    //     });

    //     return redirect()->back()->with('message', 'Thanks for your feedback!');
    // }
}
