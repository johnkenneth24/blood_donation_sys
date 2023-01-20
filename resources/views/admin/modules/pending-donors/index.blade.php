@extends('admin.layout.app')

@section('content')
    @livewireStyles
    @livewire('pending.show-pending')
@endsection

@push('scripts')
    @livewireScripts
@endpush
