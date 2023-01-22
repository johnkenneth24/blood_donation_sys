<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="{{ route('admin-dashboard') }}" class="brand-logo">
            <img alt="Logo" class="w-95px" src="{{ asset('images/blood-drop.png') }}" />
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{ !request()->routeIs('admin-dashboard') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('admin-dashboard') }}" class="menu-link">
                        <i class="menu-icon flaticon2-shelter"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('donor.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('donor.index') }}" class="menu-link">
                        <i class="menu-icon  flaticon2-drop"></i>
                        <span class="menu-text text-nowrap">Donors</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('pending.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('pending.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-calendar-3"></i>
                        <span class="menu-text text-nowrap">Pending Donors</span>
                    </a>
                </li>

                <li class="menu-item {{ !request()->routeIs('events.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('events.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-calendar-8"></i>
                        <span class="menu-text">Events</span>
                    </a>
                </li>

                <li class="menu-item {{ !request()->routeIs('report.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('report.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-document"></i>
                        <span class="menu-text">Reports</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('users.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-user-1"></i>
                        <span class="menu-text">Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
