<div class="card card-custom gutter-b">
    @include('livewire.pending.create')
    @include('livewire.pending.edit')
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder font-size-h1 text-dark">
                <i class="flaticon2-drop text-danger font-size-h1"></i> Pending Donors List</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage pending donor details here</span>
        </h3>
        <div class="card-toolbar">
            <a href="#" class="btn btn-danger font-weight-bolder font-size-sm" data-toggle="modal"
                data-target="#create">
                <span class="svg-icon svg-icon-md svg-icon-white">
                    <i class="flaticon2-drop"></i><i class="la la-plus"></i>
                </span>New Record</a>
        </div>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        <th class="pl-0 pr-0">#</th>
                        <th>@sortablelink('lastname', 'Fullname')</th>
                        <th>@sortablelink('address', 'Address')</th>
                        <th>@sortablelink('age', 'Age')</th>
                        <th>Age</th>
                        <th>@sortablelink('bloodtype', 'Blood Type')</th>
                        <th>Contact No.</th>
                        <th class="text-center pr-0">Actions</th>
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
                                {{ $donor->bloodtype }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->contact_no }}</td>
                            <td class="pr-0  text-right">
                                <a href="#" class="btn btn-sm  mr-1" wire:click='edit({{ $donor->id }})'
                                    data-target="#edit" data-toggle="modal">
                                    <span><i class="fa text-primary fa-edit" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="btn btn-sm mr-1"
                                    wire:click='deleteConfirm({{ $donor->id }})'>
                                    <span><i class="fa text-danger fa-trash" aria-hidden="true"></i></span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $donors->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>
