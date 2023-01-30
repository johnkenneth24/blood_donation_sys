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
                                <input wire:model="search" type="text" class="form-control" placeholder="Search..."
                                    id="kt_datatable_search_query" />
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th class="text-center">Blood <br> Type</th>
                        <th class="text-center">Contact <br> No.</th>
                        <th class="text-center">Bag <br> Count</th>
                        <th class="text-center">Date of <br> Donation</th>
                        <th>Actions</th>
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
                            @if ($donor->gender == 'Male')
                                <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">M</td>
                            @elseif ($donor->gender == 'Female')
                                <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">F</td>
                            @else
                                <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg"> </td>
                            @endif
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->age }}</td>
                            <td class="text-dark-75 font-weight-bolder text-center text-hover-danger mb-1 font-size-lg">
                                {{ $donor->blood_type }}</td>
                            <td class="text-dark-75 font-weight-bolder text-hover-danger mb-1 font-size-lg">
                                {{ $donor->contact_no }}</td>
                            <td class="text-dark-75 font-weight-bolder text-center text-hover-danger mb-1 font-size-lg">
                                {{ $donor->bag_blood }}
                            </td>
                            <td class="text-dark-75 font-weight-bolder text-center text-hover-danger mb-1 font-size-lg">
                                {{ Carbon\Carbon::parse($donor->donated_date)->format('m/d/Y') }}
                            </td>
                            <td>
                                @if (Carbon\Carbon::parse($donor->donated_date)->addMonths(3)->isPast())
                                    <button data-toggle="modal" data-target="#setStatus{{ $donor->id }}"
                                        class="btn btn-icon btn-warning btn-sm">
                                        <span class="svg-icon svg-icon-md svg-icon-warning">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </button>
                                @else
                                    <button class="btn btn-icon btn-dark btn-sm" disabled>
                                        <span class="svg-icon svg-icon-md svg-icon-warning">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </button>
                                @endif
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
                    <form action="{{ route('donor.updateStatus', $donor->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>How many bags of blood is donated?</label>
                            <input type="number" min="1" name="bag_blood" class="form-control" required>
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
