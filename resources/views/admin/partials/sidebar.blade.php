<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark py-3 m-0">
            <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none fw-bold">Queue Admin</a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><span class="nav-link-title">Dashboard</span></a></li>
                <li class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.projects.index') }}"><span class="nav-link-title">Projects</span></a></li>
                <li class="nav-item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pages.index') }}"><span class="nav-link-title">Pages / Content</span></a></li>
                <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.settings.edit') }}"><span class="nav-link-title">Site Settings</span></a></li>
                <li class="nav-item mt-2"><a class="nav-link" href="{{ route('home') }}" target="_blank"><span class="nav-link-title">View Website</span></a></li>
            </ul>
        </div>
    </div>
</aside>
