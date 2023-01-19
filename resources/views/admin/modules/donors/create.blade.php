@extends('admin.layout.app')

@section('title')
    Donors
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>
@endsection

@push('scripts')
    @livewireScripts
@endpush
