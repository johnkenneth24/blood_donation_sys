@extends('admin.layout.app')

@section('title')
    Users
@endsection

@section('content')
    @livewireStyles
 
    @livewire('users.show-user')
@endsection

@push('scripts')
    @livewireScripts
@endpush
