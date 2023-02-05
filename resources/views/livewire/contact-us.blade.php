<form>
    <h3 class="text-center text-muted">Contact Us</h3>
    <div class="form-group mb-2">
        <label>Name</label>
        <input type="text" wire:model="name" class="form-control" placeholder="Your Name">
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input type="email" wire:model="email" class="form-control" placeholder="Your Email">
    </div>
    <div class="form-group mb-2">
        <label>Message</label>
        <textarea wire:model="message" class="form-control" placeholder="Your Message"></textarea>
    </div>
    <button class="btn btn-primary" wire:click="submit">Submit</button>
</form>
