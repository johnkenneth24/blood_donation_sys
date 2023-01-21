<?php

namespace App\Http\Livewire\Pending;

use App\Models\Donor;
use Livewire\Component;
use Illuminate\Support\Arr;

class ShowPending extends Component
{
    public $email;
    public $firstname;
    public $middlename;
    public $lastname;
    public $bdate;
    public $gender;
    public $contact_no;
    public $address;
    public $blood_type;
    public $bag_blood;
    public $bag_count;
    public $status;
    public $donor_id;

    protected $listeners = ['delete'];

    protected $rules = [
        'email' => 'required',
        'firstname' => 'required',
        'middlename' => 'nullable',
        'lastname' => 'required',
        'bdate' => 'required',
        'gender' => 'required',
        'contact_no' => ['required', 'min:10', 'max:15'],
        'address' => 'required',
        'blood_type' => 'nullable',
        'status' => ['nullable'],
        'bag_blood' => ['nullable'],
    ];

    public function resetInputFields()
    {
        $this->email = '';
        $this->firstname = '';
        $this->middlename = '';
        $this->lastname = '';
        $this->bdate = '';
        $this->gender = '';
        $this->contact_no = '';
        $this->address = '';
        $this->blood_type = '';
        $this->bag_count = '';
    }

    public function edit($id)
    {
        $donor = Donor::find($id);

        $this->donor_id = $id;
        $this->email = $donor->email;
        $this->firstname = $donor->firstname;
        $this->middlename = $donor->middlename;
        $this->lastname = $donor->lastname;
        $this->bdate = $donor->bdate;
        $this->gender = $donor->gender;
        $this->contact_no = $donor->contact_no;
        $this->address = $donor->address;
        $this->blood_type = $donor->blood_type;
        $this->status = $donor->status;
        $this->bag_count = $donor->bag_blood;
    }

    public function store()
    {
        $validated = $this->validate();
        // dd($validated);

        $donor = Donor::create([
            'email' => $this->email,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'bdate' => $this->bdate,
            'age' => date_diff(date_create($this->bdate), date_create('now'))->y,
            'gender' => $this->gender,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'blood_type' => $this->blood_type,
            'status' => 'pending',
            'bag_blood' => 0,
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');
        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully added a new Donor record']);
    }

    public function update()
    {
        $donor = Donor::find($this->donor_id);

        $validated = $this->validate();

        $donor->update([
            'email' => $this->email,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'bdate' => $this->bdate,
            'age' => date_diff(date_create($this->bdate), date_create('now'))->y,
            'gender' => $this->gender,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'blood_type' => $this->blood_type,
            'status' => 'pending',
            'bag_blood' => 0,
        ]);
        $this->resetInputFields();
        $this->emit('hideModal', '#edit');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated a Donor record']);
    }


    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $donor = Donor::where('id', $id)->first();
        if ($donor != null) {
            $donor->delete();
            // $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully deleted a Donor record']);
            return redirect()->route('donor.pending')->with('success', 'You have successfully deleted a Donor record');
        }
    }

    public function render()
    {
        $donors = Donor::where('status', 'pending')->sortable()->orderBy('lastname', 'asc')->paginate(10);
        return view('livewire.pending.show-pending', compact('donors'));
    }
}
