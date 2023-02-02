
    <form wire:submit.prevent="submit_fback">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" wire:model="name" class="form-control" id="name">
            @if ($errors->has('name')) <span class="error">{{ $errors->first('name') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" wire:model="email" class="form-control" id="email">
            @if ($errors->has('email')) <span class="error">{{ $errors->first('email') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea wire:model="message" class="form-control" id="message"></textarea>
            @if ($errors->has('message')) <span class="error">{{ $errors->first('message') }}</span> @endif
        </div>
        <button type="submit" class="btn mt-4 btn-primary">Submit</button>
    </form>
