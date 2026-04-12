<nav class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
    <div class="container py-2">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Queue Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('demo-login') }}">Demo Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li class="nav-item"><a class="btn btn-sm btn-primary rounded-pill px-3" href="{{ route('admin.dashboard') }}">Admin</a></li>
                @else
                    <li class="nav-item"><a class="btn btn-sm btn-outline-light rounded-pill px-3" href="{{ route('login') }}">Admin Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
