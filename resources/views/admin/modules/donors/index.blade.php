@extends('admin.layout.app')

@section('content')
    @livewireStyles
    @livewire('donor.show-donors')
@endsection

@push('scripts')
    @livewireScripts
@endpush
