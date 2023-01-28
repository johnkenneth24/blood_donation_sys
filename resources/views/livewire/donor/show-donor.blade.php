<div class="card card-custom gutter-b">
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder font-size-h1 text-dark">
                <i class="flaticon2-drop text-danger font-size-h1"></i> Donors List</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage donor details here</span>
        </h3>
        <div class="card-toolbar">
            <div class="row align-items-center">
                <div class="col-lg-9 pr-0 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-12 my-2 my-md-0">
                            <div class="input-icon">

                                <input wire:model="search" type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <button wire:click="search" class="btn btn-light-primary px-6 font-weight-bold">Search</button>

                </div>
            </div>
        </div>
    </div>

    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        <th class="pl-0 pr-0">#</th>
                        <th>{{-- @sortablelink('lastname', 'Fullname') --}}Name</th>
                        <th>{{-- @sortablelink('address', 'Address') --}}Address</th>
                        <th>{{-- @sortablelink('age', 'Age') --}}Gender</th>
                        <th>Age</th>
                        <th>{{-- @sortablelink('bloodtype', 'Blood Type') --}}Blood Type</th>
                        <th>Contact No.</th>
                        <th>Blood bags</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($donors as $donor)
                        <tr>
                            <td class="text-muted pl-0 pr-0">{{ $loop->iteration }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg pl-0">
                                {{ $donor->lastname . ', ' . $donor->firstname . ' ' . substr($donor->middlename, 0, 1) . '.' }}
                            </td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->address }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->gender }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->age }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->blood_type }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->contact_no }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->bag_blood }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {!! $donors->appends(\Request::except('page'))->render() !!} --}}
        </div>
    </div>
</div>
