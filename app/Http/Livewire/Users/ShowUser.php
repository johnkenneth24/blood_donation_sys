<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Models\Users;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ShowUser extends Component
{
    public $name;
    public $username;
    public $password;
    public $user_id;

    protected $listeners = ['delete'];

    protected $rules = [
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
    }

    public function edit($id)
    {
        $user = Users::find($id);

        $this->user_id = $id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->password = $user->password;
    }

    public function store()
    {
        $validated = $this->validate();

        $user = Users::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');
        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully added a new User']);
    }

    public function update()
    {
        $user = User::find($this->user_id);

        $validated = $this->validate();

        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#edit');
        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated a User record']);
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
        $user = Users::where('id', $id)->first();
        if ($user != null) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'You have successfully deleted a user record');
        }
    }

    public function render()
    {
        $users = User::where('id', '!=', 1)->paginate(10);
        return view('livewire.users.show-user', compact('users'));
    }
}
