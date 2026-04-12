<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? __('messages.admin.panel') }} | Queue Company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body class="admin-body layout-fluid" style="font-family: Cairo, system-ui, sans-serif;">
<div class="page">
    @include('admin.partials.sidebar')
    <div class="page-wrapper">
        @include('admin.partials.navbar')
        <div class="page-body">
            <div class="container-xl">
                @include('admin.partials.alerts')
                @yield('content')
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
</body>
</html>
