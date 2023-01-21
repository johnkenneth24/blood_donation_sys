<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        // show all users except the admin user
        $users = User::where('id', '!=', 1)->get();
        return view('admin.modules.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.modules.users.create');
    }
}
