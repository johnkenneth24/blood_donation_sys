@extends('admin.layout.app')

@section('title')
    Event | Edit
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Event" :back-url="route('events.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Title of Event:<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ $event->title }}"
                                placeholder="Enter Event Title" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Date of Event:<span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control"
                                value="{{ $event->date->format('Y-m-d') }}" placeholder="Enter Event Date" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Description of Event: (include place and time)<span
                                    class="text-danger">*</span></label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Enter event description (e.g. place where event will be held, agencies or organizations that will participate, etc.)">{{ $event->description }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Image:<span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" value="{{ $event->image }}">
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">UPDATE EVENT
                                RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
