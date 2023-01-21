<?php

namespace App\Http\Livewire\Donor;

use App\Models\Donor;
use Livewire\Component;

class ShowDonors extends Component
{
    public $firstname;
    public $middlename;
    public $lastname;
    public $age;
    public $gender;
    public $contact_no;
    public $address;
    public $bloodtype;
    public $donor_id;

    protected $listeners = ['delete'];

    protected $rules = [
        'firstname' => 'required',
        'middlename' => 'nullable',
        'lastname' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'contact_no' => 'required',
        'address' => 'required',
        'bloodtype' => 'nullable',
    ];

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->middlename = '';
        $this->lastname = '';
        $this->age = '';
        $this->gender = '';
        $this->contact_no = '';
        $this->address = '';
        $this->bloodtype = '';
    }

    public function edit($id)
    {
        $donor = Donor::find($id);

        $this->donor_id = $id;
        $this->firstname = $donor->firstname;
        $this->middlename = $donor->middlename;
        $this->lastname = $donor->lastname;
        $this->age = $donor->age;
        $this->gender = $donor->gender;
        $this->contact_no = $donor->contact_no;
        $this->address = $donor->address;
        $this->bloodtype = $donor->bloodtype;
    }

    public function store()
    {
        $validated = $this->validate();
        // dd($validated);

        $donor = Donor::create([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'age' => $this->age,
            'gender' => $this->gender,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'bloodtype' => $this->bloodtype,
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'age' => $this->age,
            'gender' => $this->gender,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'bloodtype' => $this->bloodtype,
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
            return redirect()->route('donors.index')->with('success', 'You have successfully deleted a Donor record');
        }
    }

    public function render()
    {
        $donors = Donor::sortable()->orderBy('lastname', 'asc')->paginate(10);
        return view('livewire.donor.show-donor', compact('donors'));
    }
}
