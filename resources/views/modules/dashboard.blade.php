Dashboard sample here

<form method="get" action="{{ route('auth.logout') }}">
    @csrf
    <a href="#" target="_blank" class="btn btn-light-primary font-weight-bold"
        onclick="event.preventDefault();this.closest('form').submit();">Sign Out</a>
</form>
