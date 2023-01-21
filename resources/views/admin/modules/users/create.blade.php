@extends('admin.layout.app')

@section('title')
    Users | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{-- route('users.store') --}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create User" :back-url="route('users.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Fullname:<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Enter Fullname" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Username:<span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                placeholder="Enter username" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                placeholder="Enter password">
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">CREATE USER
                                RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
