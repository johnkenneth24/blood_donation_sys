<?php

namespace App\Http\Controllers;

use App\Models\Donor;
// use App\Http\Requests\Donors\StoreRequest;
// use Illuminate\Http\Client\Request;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\Mail\RegisteredNotification;
use Illuminate\Support\Facades\Mail;
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
        $bloodtypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $gender = ['Male', 'Female'];

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

        Mail::to($donor->email)->send(new RegisteredNotification($donor));
        LogActivity::addToLog('Registered a new donor: ' . $donor->firstname . ' ' . $donor->lastname);

        return redirect()->route('donor.register')->with('success', 'Thank you for registering! You will receive email of confirmation.');
    }

    public function updateStatus(Donor $donor, $id)
    {
        $validated = request()->validate([
            'bag_blood' => 'required',
            'donated_date' => 'required',
        ]);

        $donor = Donor::find($id);

        $oldBagBlood = $donor->bag_blood;
        $oldDonatedDate = $donor->donated_date;

        if ($oldDonatedDate > $validated['donated_date']) {
            return redirect()->route('donor.index')->with('error', 'Invalid date!');
        }

        $donor->update([
            'bag_blood' => $oldBagBlood + $validated['bag_blood'],
            'donated_date' => $validated['donated_date'],
        ]);

        LogActivity::addToLog('Updated donor status: ' . $donor->firstname . ' ' . $donor->lastname . ', added ' . $validated['bag_blood'] . ' bag/s of blood.');

        return redirect()->route('donor.index')->with('success', 'Donor status updated successfully!');
    }

    public function pendingStatus(Donor $donor, $id)
    {
        $validated = request()->validate([
            'bag_blood' => 'required',
            'donated_date' => 'required',
            'blood_type' => 'nullable',
        ]);

        $donor = Donor::find($id);

        $donor->update([
            'status' => 'donated',
            'bag_blood' => $validated['bag_blood'],
            'donated_date' => $validated['donated_date'],
            'blood_type' => $validated['blood_type'] ?? $donor->blood_type ?? 'A+',
        ]);

        LogActivity::addToLog('Updated donor status: ' . $donor->firstname . ' ' . $donor->lastname . ', added ' . $validated['bag_blood'] . ' bag/s of blood.');

        return redirect()->route('donor.pending')->with('success', 'Donor status updated successfully!');
    }

    // public function search(Request $req){
    //     $donors =Donor::where('lastname', 'like' ,  "%{$req->searchTerm}%")?->get();
    //     return view('admin.modules.donors.index', compact('donors'));
    // }

}
