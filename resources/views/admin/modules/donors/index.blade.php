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
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-drop text-danger"></i>
                </span>
                <h3 class="card-label">Donors List</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                {{-- <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav flex-column nav-hover">
                            <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon la la-print"></i>
                                    <span class="nav-text">Print</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon la la-copy"></i>
                                    <span class="nav-text">Copy</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon la la-file-excel-o"></i>
                                    <span class="nav-text">Excel</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon la la-file-text-o"></i>
                                    <span class="nav-text">CSV</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon la la-file-pdf-o"></i>
                                    <span class="nav-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Dropdown Menu-->
                </div> --}}
                <!--end::Dropdown-->
                <a href="{{ route('donors.create') }}" class="btn btn-danger font-weight-bolder">
                    <i class="flaticon2-drop"></i><i class="la la-plus"></i>New Record</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Blood Type</th>
                        <th>Contact No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    @forelse ($donors as $donor)
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Contact No.</th>
                            <th>Actions</th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found.</td>
                        </tr>
                    @endforelse
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
