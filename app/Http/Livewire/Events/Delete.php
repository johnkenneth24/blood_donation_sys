<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class Delete extends Component
{
    public $event;

    public $listeners = ['delete'];

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->event->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $event = Event::where('id', $id)->first();
        if ($event != null) {
            $event->delete();
            // $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully deleted an Event record']);
            return redirect()->route('events.index')->with('success', 'Event deleted successfully');
        }
    }

    public function render()
    {
        return view('livewire.events.delete');
    }
}
