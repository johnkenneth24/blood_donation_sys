<?php

namespace App\Http\Livewire\Users;

use App\Helpers\LogActivity;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{

    public $name;
    public $email;
    public $password;

    public function createUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        LogActivity::addToLog('User ' . $user->name . ' created.');

        session()->flash('message', 'User created successfully.');
    }


    public function render()
    {
        return view('livewire.users.create');
    }
}
