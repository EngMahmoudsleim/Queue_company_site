@php
$settings = \App\Models\SiteSetting::current();
$activeTheme = \App\Services\ThemeManager::resolvedTheme($settings->active_theme);
$themeStyle = collect([
    $settings->theme_primary_color ? '--brand: '.$settings->theme_primary_color : null,
    $settings->theme_secondary_color ? '--brand-dark: '.$settings->theme_secondary_color : null,
])->filter()->implode(';');
@endphp
<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? $settings->t('default_seo_title') }}</title>
    <meta name="description" content="{{ $metaDescription ?? $settings->t('default_seo_description') }}">
    @if($settings->favicon)<link rel="icon" href="{{ \Illuminate\Support\Facades\Storage::url($settings->favicon) }}">@endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset(\App\Services\ThemeManager::cssFile($activeTheme)) }}" rel="stylesheet">
</head>
<body class="public-body theme-{{ $activeTheme }} btn-{{ $settings->theme_button_radius }} spacing-{{ $settings->theme_spacing }} hero-{{ $settings->theme_hero_variant }}" style="{{ $themeStyle }}">
<div class="page-shell">
    @include('partials.navbar')
    <main>@yield('content')</main>
    @include('partials.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/public-effects.js') }}"></script>
<script src="{{ asset('js/event-tracker.js') }}"></script>
</body>
</html>
