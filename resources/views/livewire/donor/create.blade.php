<form wire:submit.prevent="store">
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Donor</h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="resetInputFields"
                        aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="font-weight-bold">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror "
                                name="firstname" placeholder="Enter First Name" wire:model="firstname" />
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Middle Name</label>
                            <input type="text" class="form-control @error('middlename') is-invalid @enderror "
                                name="middlename" placeholder="Enter Middle Name" wire:model="middlename" />
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror "
                                name="lastname" placeholder="Enter Last Name" wire:model="lastname" />
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror "
                                name="age" placeholder="Enter Age" wire:model="age" />
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Gender <span class="text-danger">*</span></label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="exampleSelectd"
                                wire:model='gender'>
                                <option value="">Choose your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="I prefer not to say">I prefer not to say</option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <lable class="font-weight-bold">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror "
                                    name="address" placeholder="Enter address" wire:model="address" />
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Contact No.</label>
                            <input type="text" class="form-control @error('contact_no') is-invalid @enderror "
                                name="contact_no" placeholder="Enter contact no." wire:model="contact_no" />
                            @error('contact_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Blood Type</label>
                            <input type="text" name="bloodtype"
                                class="form-control @error('bloodtype') is-invalid @enderror" wire:model="bloodtype"
                                placeholder="Enter blood type (e.g. A+, B-, AB+, O-, etc)" />
                            @error('bloodtype')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
