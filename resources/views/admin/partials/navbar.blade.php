<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(https://ui-avatars.com/api/?name=Admin&background=206bc4&color=fff)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Admin</div>
                        <div class="mt-1 small text-secondary">{{ __('messages.admin.panel') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('home') }}" class="dropdown-item" target="_blank">{{ __('messages.buttons.view_site') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="breadcrumb-arrows" aria-label="breadcrumbs">
                    @yield('breadcrumbs')
                </div>
            </div>
        </div>
    </div>
</header>
