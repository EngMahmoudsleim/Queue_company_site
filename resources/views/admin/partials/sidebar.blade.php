@php
$menuItems = [
    ['route' => 'admin.dashboard', 'label' => __('messages.admin.dashboard'), 'icon' => 'bi-grid-1x2-fill'],
    ['route' => 'admin.inbox.index', 'label' => __('messages.admin.inbox'), 'icon' => 'bi-inbox-fill', 'active' => 'admin.inbox.*'],
    ['route' => 'admin.projects.index', 'label' => __('messages.admin.projects'), 'icon' => 'bi-kanban-fill', 'active' => 'admin.projects.*'],
    ['route' => 'admin.pages.index', 'label' => __('messages.admin.pages'), 'icon' => 'bi-file-earmark-richtext-fill', 'active' => 'admin.pages.*'],
    ['route' => 'admin.settings.edit', 'label' => __('messages.admin.settings'), 'icon' => 'bi-sliders2-vertical', 'active' => 'admin.settings.*'],
    ['route' => 'admin.themes.edit', 'label' => __('messages.admin.theme_manager'), 'icon' => 'bi-palette-fill', 'active' => 'admin.themes.*'],
    ['route' => 'admin.profile.edit', 'label' => __('messages.admin.profile'), 'icon' => 'bi-person-circle', 'active' => 'admin.profile.*'],
];
@endphp
<aside id="adminSidebar" class="navbar navbar-vertical navbar-expand-lg admin-sidebar" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark py-3 m-0">
            <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none fw-bold">Queue Admin</a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                @foreach($menuItems as $item)
                    @php($activePattern = $item['active'] ?? $item['route'])
                    <li class="nav-item {{ request()->routeIs($activePattern) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($item['route']) }}">
                            <span class="nav-link-icon"><i class="bi {{ $item['icon'] }}" aria-hidden="true"></i></span>
                            <span class="nav-link-title">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
                <li class="nav-item mt-2">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <span class="nav-link-icon"><i class="bi bi-box-arrow-up-right"></i></span>
                        <span class="nav-link-title">{{ __('messages.buttons.view_site') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
