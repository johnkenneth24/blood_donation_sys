@extends('admin.layout.app')

@section('title', 'Donors')

@section('content')
    @livewireStyles
    @livewire('donor.show-donors')
@endsection

@push('scripts')
    @livewireScripts
@endpush
