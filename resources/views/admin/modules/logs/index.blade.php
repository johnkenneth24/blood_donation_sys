@extends('admin.layout.app')

@section('title', 'Logs')

@section('content')
    @livewireStyles

    <div class="card card-custom gutter-b">
        <x-errors></x-errors>
        <x-success></x-success>
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h1 text-dark">
                    <i class="flaticon2-document text-danger font-size-h1"></i> History Logs</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">View history logs here</span>
            </h3>
        </div>
        <div class="card-body py-0">
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0 pr-0">#</th>
                            <th style="width: 250px">Subject</th>
                            <th style="width: 200px">URL</th>
                            <th>User</th>
                            <th>Method</th>
                            <th>Ip</th>
                            <th style="width: 200px">User Agent</th>
                            <th>Date and Time</th>
                            {{-- <th class="text-center pr-0" style="width: 150px">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Illuminate\Support\Str;
                        @endphp
                        @forelse ($logs as $log)
                            <tr>
                                <td class="text-muted pl-0 pr-0">{{ $loop->iteration }}</td>
                                <td>{{ $log->subject }}</td>
                                <td>{{ $log->url }}</td>
                                <td>
                                    @if ($log->user_id)
                                        @foreach ($users as $user)
                                            @if ($user->id == $log->user_id)
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="label label-lg label-light-danger label-inline">Guest</span>
                                    @endif
                                </td>
                                <td>{{ $log->method }}</td>
                                <td>{{ $log->ip }}</td>
                                <td>{{ Str::limit($log->agent, 50) }}</td>

                                <td>{{ $log->created_at->format('d/m/Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush
