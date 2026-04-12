<header class="navbar navbar-expand-md d-print-none admin-topbar">
    <div class="container-xl">
        <div class="d-flex align-items-center gap-2 me-2">
            <button class="btn btn-ghost-secondary btn-icon d-none d-lg-inline-flex" id="sidebarCollapseBtn" type="button" title="{{ __('messages.admin.toggle_sidebar') }}">
                <i class="bi bi-layout-sidebar"></i>
            </button>
        </div>

        <div class="navbar-nav flex-row order-md-last gap-2 align-items-center">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link px-2" data-bs-toggle="dropdown" aria-label="{{ __('messages.admin.language_switcher') }}">
                    <i class="bi bi-translate me-1"></i>{{ strtoupper(app()->getLocale()) }}
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('locale.switch', 'en') }}" class="dropdown-item">English</a>
                    <a href="{{ route('locale.switch', 'ar') }}" class="dropdown-item">العربية</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                    <div class="d-none d-xl-block px-2 text-{{ app()->getLocale() === 'ar' ? 'end' : 'start' }}">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">{{ __('messages.admin.profile') }}</a>
                    <a href="{{ route('admin.profile.edit') }}#password" class="dropdown-item">{{ __('messages.admin.change_password') }}</a>
                    <a href="{{ route('home') }}" class="dropdown-item" target="_blank">{{ __('messages.buttons.view_site') }}</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">{{ __('messages.admin.logout') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light w-100">
                <div class="breadcrumb-arrows" aria-label="breadcrumbs">@yield('breadcrumbs')</div>
            </div>
        </div>
    </div>
</header>
