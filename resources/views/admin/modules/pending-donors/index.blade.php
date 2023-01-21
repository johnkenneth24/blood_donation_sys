@extends('admin.layout.app')

@section('title')
    Pending Donors
@endsection

@section('content')
    @livewireStyles
    @livewire('pending.show-pending')
@endsection

@push('scripts')
    @livewireScripts
@endpush
