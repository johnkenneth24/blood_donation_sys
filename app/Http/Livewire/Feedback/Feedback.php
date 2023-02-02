<?php

namespace App\Http\Livewire\Feedback;

use Livewire\Component;
use App\Mail\FeedbackReceived;
use Illuminate\Support\Facades\Mail;

class Feedback extends Component
{
    public $name;
    public $email;
    public $message;

    public function submit_fback()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        

        Mail::to('teamdev2023@gmail.com')->send(new FeedbackReceived($this->name, $this->email, $this->message));

        session()->flash('message', 'Thank you for your feedback!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.feedback.feedback');
    }
}
