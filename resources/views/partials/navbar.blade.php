@php
$settings = \App\Models\SiteSetting::current();
$navPages = \App\Models\Page::published()->whereIn('slug', ['about', 'services', 'projects', 'demo-login', 'contact'])->orderBy('sort_order')->get();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
    <div class="container py-2">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">{{ $settings->t('company_name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                @foreach($navPages as $p)
                    <li class="nav-item"><a class="nav-link" href="{{ $p->slug === 'demo-login' ? route('demo-login') : route($p->slug === 'projects' ? 'projects.index' : $p->slug) }}">{{ $p->t('title') }}</a></li>
                @endforeach
                <li class="nav-item"><a class="btn btn-sm btn-outline-light rounded-pill px-3" href="{{ route('locale.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">{{ __('messages.language') }}</a></li>
                @auth
                    <li class="nav-item"><a class="btn btn-sm btn-primary rounded-pill px-3" href="{{ route('admin.dashboard') }}">{{ __('messages.nav.admin') }}</a></li>
                @else
                    <li class="nav-item"><a class="btn btn-sm btn-outline-light rounded-pill px-3" href="{{ route('login') }}">{{ __('messages.nav.admin_login') }}</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
