<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Users;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{

    public function logActivity()
    {
        // get all users
        $users = Users::all();
        // dd($users);

        $logs = LogActivity::logActivityLists();
        return view('admin.modules.logs.index', compact('logs', 'users'));
    }
}
