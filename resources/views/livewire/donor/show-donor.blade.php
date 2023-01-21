<div class="card card-custom gutter-b">
    @include('livewire.donor.create')
    @include('livewire.donor.edit')
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder font-size-h1 text-dark">
                <i class="flaticon2-drop text-danger font-size-h1"></i> Donors List</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage donor details here</span>
        </h3>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        <th class="pl-0 pr-0">#</th>
                        <th>{{-- @sortablelink('lastname', 'Fullname') --}}Name</th>
                        <th>{{-- @sortablelink('address', 'Address') --}}Address</th>
                        <th>{{-- @sortablelink('age', 'Age') --}}Age</th>
                        <th>Age</th>
                        <th>{{-- @sortablelink('bloodtype', 'Blood Type') --}}Blood Type</th>
                        <th>Contact No.</th>
                        <th class="text-center pr-0">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($donors as $donor) --}}
                    <tr>
                        {{-- <td class="text-muted pl-0 pr-0">{{ $loop->iteration }}</td>
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
                                {{ $donor->bloodtype }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->contact_no }}</td> --}}
                        {{-- <td class="pr-0 text-right">
                                <a href="#" class="btn btn-sm btn-primary mr-1"
                                    wire:click='edit({{ $donor->id }})' data-target="#edit" data-toggle="modal">
                                    <span><i class="fa fa-edit" aria-hidden="true"></i></span>Confir
                                </a>
                                <a href="#" class="btn btn-sm btn-primary mr-1"
                                    wire:click='edit({{ $donor->id }})' data-target="#edit" data-toggle="modal">
                                    <span><i class="fa fa-edit" aria-hidden="true"></i></span>EDIT
                                </a>
                                <a href="#" class="btn btn-sm btn-danger mr-1"
                                    wire:click='deleteConfirm({{ $donor->id }})'>
                                    <span><i class="fa fa-trash" aria-hidden="true"></i></span>DELETE
                                </a>
                            </td>  --}}
                    </tr>
                    {{-- @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
            {{-- {!! $donors->appends(\Request::except('page'))->render() !!} --}}
        </div>
    </div>
</div>