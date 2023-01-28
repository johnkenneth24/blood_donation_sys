@extends('admin.layout.app')

@section('title', 'Report')

@section('content')
    @livewireStyles

    <div class="card card-custom gutter-b">
        <x-errors></x-errors>
        <x-success></x-success>
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h1 text-dark">
                    <i class="flaticon2-document text-danger font-size-h1"></i> Report to Download</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage blood type report details here</span>
            </h3>
        </div>
        <div class="card-body py-0 pb-5">
            @livewire('blood-pos-a.export')
            @livewire('blood-neg-a.export')
            @livewire('blood-pos-b.export')
            @livewire('blood-neg-b.export')
            @livewire('blood-pos-o.export')
            @livewire('blood-neg-o.export')
            @livewire('blood-pos-ab.export')
            @livewire('blood-neg-ab.export')
        </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush
