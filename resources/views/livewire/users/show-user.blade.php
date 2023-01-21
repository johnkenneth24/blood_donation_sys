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
                    <span class="svg-icon svg-icon-md svg-icon-white"> </i><i class="la la-plus"></i>
                    </span>New Record</a>
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
                            <th style="width: 200px">Details</th>
                            <th class="text-center pr-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($users as $user) --}}
                            <tr>
                                <td class="text-muted pl-0 pr-0">{{--$loop->iteration }}</td>
                                <td>{{--$user->name --}}</td>
                                <td>{{--$user->username --}}</td>
                                <td>{{--$user->password --}}</td>
                                <td class="pr-0 text-right">
                                    {{-- <a href="{{ route('events.edit',$event->id) }}" class="btn btn-sm btn-primary mr-1">
                                        <span><i class="fa fa-edit" aria-hidden="true"></i></span>
                                    </a> --}}
                                    {{-- @livewire('events.delete', ['event' => $event], key($event->id)) --}}
                                </td>
                            </tr>
                        {{-- @empty
                            <tr>
                                <td colspan="8" class="text-center">No records found.</td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
                {{-- {!! $events->appends(\Request::except('page'))->render() !!} --}}
            </div>
        </div>
    </div>
</div>
