<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <a class="logo_name" href="{{ route('dashboard') }}">TechTrade</a>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin/products') }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Product</span>
            </a>
        </li>
        <li>
            <a href="/profile*">
                <i class='bx bx-cog'></i>
                <span class="links_name">Profile</span>
            </a>
        </li>
        <li class="log_out">
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')"
                             onclick="event.preventDefault();
                             this.closest('form').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">{{ __('Logout') }}</span>
                </a>
            </form>
        </li>
    </ul>
</div>