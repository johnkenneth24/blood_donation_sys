<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $credentials = $request()->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Redirect::intended('dashboard');
        } else {
            return back()->withErrors([
                'username' => 'The provided credentials is invalid!'
            ])->onlyInput('username');
        }

        return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
