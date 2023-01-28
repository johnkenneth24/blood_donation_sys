<div class="card card-custom gutter-b">
    @include('livewire.users.create')
    @include('livewire.users.edit')
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h1 text-dark">
                    <i class="flaticon2-document text-danger font-size-h1"></i> Users List</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage user details here</span>
            </h3>
            <div class="card-toolbar">
                <a href="#" class="btn btn-danger font-weight-bolder font-size-sm" data-toggle="modal"
                    data-target="#create">
                    <span class="svg-icon svg-icon-md svg-icon-white"><i class="la la-plus"></i></span>New User
                </a>
            </div>
        </div>
        <div class="card-body py-0">
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0 pr-0">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            {{-- <th style="width: 200px">Password</th> --}}
                            <th class="text-center pr-0" style="width: 250px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-muted pl-0 pr-0">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                {{-- <td>{{ $user->password }}</td> --}}
                                <td class="pr-0 text-center">
                                    <a href="#" class="btn btn-sm  mr-1" wire:click='edit({{ $user->id }})'
                                        data-target="#edit" data-toggle="modal">
                                        <span><i class="fa text-primary fa-edit" aria-hidden="true"></i></span>
                                    </a>
                                    <a href="#" class="btn btn-sm mr-1"
                                        wire:click='deleteConfirm({{ $user->id }})' wire:loading.attr="disabled">
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
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
