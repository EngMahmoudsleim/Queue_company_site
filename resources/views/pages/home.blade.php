@extends('layouts.app', ['title' => 'Queue Company | Software Development'])

@section('content')
<section class="hero-section interactive-hero position-relative overflow-hidden" data-mouse-parallax>
    <div class="hero-orb orb-1" aria-hidden="true"></div>
    <div class="hero-orb orb-2" aria-hidden="true"></div>
    <div class="container py-6 position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="hero-kicker">Trusted Product Engineering Partner</span>
                <h1 class="display-4 fw-bold mt-3 mb-3">Build smarter digital products with a team that understands operations.</h1>
                <p class="lead text-white-50 mb-4">From custom software to ERP, POS, and SaaS platforms, we craft systems that help teams move faster and scale with confidence.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg rounded-pill px-4">Explore Projects</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">Book Consultation</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-stat-card mouse-lift">
                    <h5 class="mb-4">Why teams choose Queue</h5>
                    <div class="d-flex justify-content-between border-bottom border-secondary-subtle pb-2 mb-2"><span>Delivered Projects</span><strong>{{ $projectCount }}+</strong></div>
                    <div class="d-flex justify-content-between border-bottom border-secondary-subtle pb-2 mb-2"><span>ERP & POS Expertise</span><strong>Enterprise</strong></div>
                    <div class="d-flex justify-content-between"><span>Support Model</span><strong>Long-term</strong></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <h2 class="section-title">Core Services</h2>
            <p class="section-subtitle">Business-first engineering across product and process layers.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['Custom Software','Purpose-built internal systems and customer-facing platforms.'],
                ['ERP Systems','Integrated modules for finance, HR, procurement, and inventory.'],
                ['POS Solutions','Reliable POS workflows for retail, F&B, and healthcare.']
            ] as [$name, $desc])
                <div class="col-md-4">
                    <article class="feature-card h-100 mouse-lift">
                        <h5>{{ $name }}</h5>
                        <p class="mb-0">{{ $desc }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-6 bg-soft">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h2 class="section-title mb-1">Featured Projects</h2>
                <p class="section-subtitle mb-0">Production-ready systems shipped for real operations.</p>
            </div>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary rounded-pill">View All Projects</a>
        </div>
        <div class="row g-4">
            @forelse($featuredProjects as $project)
                <div class="col-lg-4 col-md-6">
                    <article class="project-card h-100 mouse-lift">
                        <img src="{{ $project->featured_image ?: 'https://placehold.co/600x350' }}" alt="{{ $project->title }}" class="img-fluid rounded-3 mb-3">
                        <span class="badge text-bg-light border mb-2">{{ $project->category }}</span>
                        <h5>{{ $project->title }}</h5>
                        <p class="text-muted">{{ $project->short_description }}</p>
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-primary rounded-pill px-3">View Details</a>
                    </article>
                </div>
            @empty
                <div class="col-12"><div class="empty-state">No featured projects available yet.</div></div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="cta-banner text-center">
            <h3 class="mb-2">Need a reliable software partner?</h3>
            <p class="mb-4">Let’s plan your next product, migration, or business system rollout.</p>
            <a href="{{ route('contact') }}" class="btn btn-light rounded-pill px-4">Talk to Our Team</a>
        </div>
    </div>
</section>
@endsection
