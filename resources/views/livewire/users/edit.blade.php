<form wire:submit.prevent="update">
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="resetInputFields"
                        aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Fullname:<span class="text-danger">*</span></label>
                                <input type="text" name="name" wire:model='name' class="form-control"
                                    value="{{ old('name') }}" placeholder="Enter Fullname" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Username:<span class="text-danger">*</span></label>
                                <input type="text" name="username" wire:model='username' class="form-control"
                                    value="{{ old('username') }}" placeholder="Enter username" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bolder">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" wire:model='password' class="form-control"
                                    value="{{ old('password') }}" placeholder="Enter password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"
                        wire:click="resetInputFields">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
