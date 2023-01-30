<?php

namespace App\Http\Controllers\Auth;

use PgSql\Lob;
use App\Helpers\LogActivity;
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
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            LogActivity::addToLog('Login successfully of ' . $request->username . '!');
            return Redirect::intended('admin-dashboard');
        } else {
            return back()->withErrors([
                'username' => 'The provided credentials is invalid!'
            ])->onlyInput('username');
            LogActivity::addToLog('Login failed of ' . $request->username . '!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        LogActivity::addToLog('Logout successfully of ' . $request->username . '!');
        return redirect()->route('login');
    }
}
