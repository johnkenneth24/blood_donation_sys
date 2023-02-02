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
            <div class="row mr-2 align-items-center">
                <div class="col-lg-9 pr-0 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-12 my-2 my-md-0">
                            <div class="input-icon">
                                <input wire:model="searchPending" type="text" class="form-control" placeholder="Search..."
                                    id="kt_datatable_search_query" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <button wire:click="searchPending" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
                </div>
            </div>
            <a href="#" class="btn btn-danger font-weight-bolder font-size-sm" data-toggle="modal"
                data-target="#create">
                <span class="svg-icon svg-icon-md svg-icon-white">
                    <i class="flaticon2-drop"></i>
                </span>Add Pending Donor
            </a>

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
                        <th>Gender</th>
                        <th>@sortablelink('blood_type', 'Blood Type')</th>
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
                                {{ $donor->age }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->gender }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->blood_type }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->contact_no }}</td>
                            <td class="pr-0  text-right">
                                <a href="#" class="btn btn-sm  mr-1" wire:click='edit({{ $donor->id }})'
                                    data-target="#edit" data-toggle="modal">
                                    <span><i class="fa text-primary fa-edit" aria-hidden="true"></i></span>
                                </a>
                                {{-- anchor tag to a modal with id of setStatus --}}
                                <a href="#" class="btn btn-sm mr-1" data-toggle="modal"
                                    data-target="#setStatus{{ $donor->id }}">
                                    <span><i class="fa text-success fa-check" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="btn btn-sm mr-1"
                                    wire:click='deleteConfirm({{ $donor->id }})' wire:loading.attr="disabled">
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
            {{-- {!! $donors->appends(\Request::except('page'))->render() !!} --}}
        </div>
    </div>
</div>

{{-- modal with an id of setStatus with a form asking for how many bags of blood is donated --}}
@foreach ($donors as $donor)
    <div class="modal fade" id="setStatus{{ $donor->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('donor.pendingStatus', $donor->id) }}" method="POST">
                        @csrf
                        @if ($donor->blood_type === 'IDK')
                            <div class="form-group">
                                <label>Blood Type</label>
                                <select name="blood_type" class="form-control" required>
                                    <option value="">-- Please Select --</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>How many bags of blood is donated?</label>
                            <input type="number" name="bag_blood" min="1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Date of Blood Donation</label>
                            <input type="date" name="donated_date" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
