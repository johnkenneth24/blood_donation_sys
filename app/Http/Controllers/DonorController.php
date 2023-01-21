<?php

namespace App\Http\Controllers;

use App\Models\Donor;
// use App\Http\Requests\Donors\StoreRequest;
use Illuminate\Http\Client\Request;
use App\Http\Requests\RegisterDonor\StoreRequest;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::sortable()->paginate(10);
        return view('admin.modules.donors.index', compact('donors'));
    }

    public function pending()
    {
        return view('admin.modules.pending-donors.index');
    }

    public function create()
    {
        $bloodtypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'I dont know'];
        $gender = ['Male', 'Female', 'Prefer not to say'];

        return view('modules.register-donor.register', compact('bloodtypes', 'gender'));
    }

    public function pendingStore(StoreRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);

        $donor = Donor::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'middlename' => $validated['middlename'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'contact_no' => $validated['contact_no'],
            'blood_type' => $validated['blood_type'],
            'gender' => $validated['gender'],
            'bdate' => $validated['bdate'],
            'age' => date_diff(date_create($validated['bdate']), date_create('now'))->y,
            'status' => 'pending',
            'bag_blood' => 0,
        ]);

        return redirect()->route('donor.register')->with('success', 'Thank you for registering! We will contact you soon.');
    }

    public function setStatus(Donor $donor, $id)
    {
        $validated = request()->validate([
            'bag_blood' => 'required',
        ]);

        $donor = Donor::find($id);

        $donor->update([
            'status' => 'donated',
            'bag_blood' => $validated['bag_blood'],
        ]);

        return redirect()->route('donor.pending')->with('success', 'Donor status updated successfully, check the donor list for more details.');
    }
}
