<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\Events\StoreRequest;
use App\Http\Requests\Events\UpdateRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(3);
        return view('admin.modules.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.modules.events.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . '.' . $extension;
        $path = $request->file('image')->move(public_path('image'), $fileNameToStore);

        $events = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'author' => auth()->user()->name,
            'image' => $fileNameToStore,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function edit(Event $event, $id)
    {
        $event = Event::find($id);
        return view('admin.modules.events.edit', compact('event'));
    }

    public function update(UpdateRequest $request, Event $event, $id)
    {
        $validated = $request->validated();
        $event = Event::find($id);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . '.' . $extension;
            $path = $request->file('image')->move(public_path('image'), $fileNameToStore);
        } else {
            // old image
            $fileNameToStore = $event->image;
        }

        $event->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'author' => auth()->user()->name,
            'image' => $fileNameToStore,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }
}
