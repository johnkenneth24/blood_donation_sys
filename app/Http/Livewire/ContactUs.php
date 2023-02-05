<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{

    public $name;
    public $email;
    public $message;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ]);

        // dd($validatedData);
        Mail::to('teamdev2023@gmail.com')->send(new ContactUsMail($validatedData));

        session()->flash('message', 'Your message was sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
