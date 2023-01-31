<?php

namespace App\Http\Livewire\Donor;

use DB;
use App\Models\Donor;
use Livewire\Component;
use App\Helpers\LogActivity;
use PhpOffice\PhpWord\TemplateProcessor;

class ShowDonors extends Component
{
    public $firstname;
    public $middlename;
    public $lastname;
    public $age;
    public $gender;
    public $contact_no;
    public $address;
    public $blood_type;
    public $donor_id;

    public $search;
    public const TEMPLATE_PATH_CERT = 'docx/cert_donor.docx';

    protected $listeners = ['delete'];

    protected $rules = [
        'firstname' => 'required',
        'middlename' => 'nullable',
        'lastname' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'contact_no' => 'required',
        'address' => 'required',
        'blood_type' => 'nullable',
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
        $this->blood_type = '';
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
        $this->blood_type = $donor->blood_type;
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
            'blood_type' => $this->blood_type,
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        LogActivity::addToLog('Added a new Donor record');
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
            'blood_type' => $this->blood_type,
        ]);
        $this->resetInputFields();
        $this->emit('hideModal', '#edit');

        LogActivity::addToLog('Updated a Donor record');
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
            LogActivity::addToLog('Deleted a Donor record');
            return redirect()->route('donor.index')->with('success', 'You have successfully deleted a Donor record');
        }
    }

    public function search()
    {
        $this->donors = Donor::where('firstname', 'like', '%' . $this->search . '%')
            ->orWhere('lastname', 'like', '%' . $this->search . '%')
            ->orWhere(DB::raw("concat(firstname, ' ', lastname)"), 'like', '%' . $this->search . '%')
            ->get();
    }

    public function certExport($id)
    {

        $path = storage_path(self::TEMPLATE_PATH_CERT);
        $templateProcessor = new TemplateProcessor($path);

        $donors = Donor::find($id);
        // dd($donors);

        $templateProcessor->setValue('fullname', $donors->firstname. ' ' . $donors->lastname);
        $templateProcessor->setValue('date', date('F d, Y'));

        $filename = 'certificate_' . $donors->firstname . '_' . $donors->lastname;
        $tempPath = 'reports/' . $filename . '.docx';

        if (!file_exists(storage_path('reports'))) {
            mkdir(storage_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs(storage_path($tempPath));
        return response()->download(storage_path($tempPath));
    }

    public function render()
    {
        $donors = Donor::where('status', 'donated')->sortable()->orderBy('lastname', 'asc')->paginate(10);
        return view('livewire.donor.show-donor', compact('donors'));
    }
}
