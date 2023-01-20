<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterDonor\StoreRequest;
use Illuminate\Http\Request;

class RegisterDonorController extends Controller
{
    // viewable in guest
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        dd($validated);

        return redirect()->route('home');
    }

    // only admin can view
    public function index()
    {
        // return view('modules.register-donor.index');
    }
}
