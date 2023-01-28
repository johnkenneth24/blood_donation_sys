@extends('admin.layout.app')

@section('title')
    Event | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Event" :back-url="route('events.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Title of Event:<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                placeholder="Enter Event Title" />
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-bolder">Date of Event:<span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}"
                                placeholder="Enter Event Date" />
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-bolder">Time of Event:<span class="text-danger">*</span></label>
                            <input type="time" name="time" class="form-control" value="{{ old('time') }}"
                                placeholder="Enter Event Time" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Location of Event:<span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}"
                                placeholder="Enter Event Location" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Description of Event:<span
                                    class="text-danger">*</span></label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Enter event description (e.g. place where event will be held, agencies or organizations that will participate, etc.)">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Image:<span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">CREATE EVENT
                                RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
