@extends('admin.layout.app')

@section('title', 'Events')

@section('content')
    @livewireStyles

    <div class="card card-custom gutter-b">
        <x-errors></x-errors>
        <x-success></x-success>
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h1 text-dark">
                    <i class="flaticon2-document text-danger font-size-h1"></i> Events List</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage event details here</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('events.create') }}" class="btn btn-danger font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                        <i class="flaticon2-document"></i><i class="la la-plus"></i>
                    </span>New Record</a>
            </div>
        </div>
        <div class="card-body py-0">
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0 pr-0">#</th>
                            <th style="width: 200px">Event Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Time</th>
                            <th style="width: 200px">Details</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th class="text-center pr-0" style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Illuminate\Support\Str;
                        @endphp
                        @forelse ($events as $event)
                            <tr>
                                <td class="text-muted pl-0 pr-0">{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ date('M. d, Y', strtotime($event->date)) }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->time }}</td>
                                <td>{{ Str::words($event->description, 5, $end='...')}}</td>
                                <td>{{ $event->author }}</td>
                                <td>
                                    <img src="/image/{{ $event->image }}" alt="event image" class="img-thumbnail"
                                        width="100">
                                </td>
                                <td class="pr-0 text-center">
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-primary mr-1">
                                        <span><i class="fa fa-edit" aria-hidden="true"></i></span>
                                    </a>
                                    @livewire('events.delete', ['event' => $event], key($event->id))
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $events->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush
