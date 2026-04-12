@extends('layouts.app', ['title' => $project->meta_title ?: $project->title, 'metaDescription' => $project->meta_description ?: $project->short_description])

@section('content')
<section class="py-5 bg-soft border-bottom">
    <div class="container">
        <nav class="small mb-3"><a href="{{ route('projects.index') }}">Projects</a> / {{ $project->title }}</nav>
        <h1 class="mb-2">{{ $project->title }}</h1>
        <p class="lead mb-3">{{ $project->short_description }}</p>
        <div class="d-flex gap-2 flex-wrap">
            <span class="badge text-bg-light border">{{ $project->category }}</span>
            <span class="badge status-badge status-{{ $project->status }}">{{ ucfirst(str_replace('_',' ',$project->status)) }}</span>
            @if($project->industry)<span class="badge text-bg-light border">{{ $project->industry }}</span>@endif
        </div>
    </div>
</section>
<section class="py-6">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <img src="{{ $project->featured_image ?: 'https://placehold.co/1200x500' }}" class="img-fluid rounded-4 mb-4" alt="{{ $project->title }}">
                <div class="surface-card mb-4"><h3>Overview</h3><p class="mb-0">{{ $project->full_description }}</p></div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="surface-card h-100"><h4>Features</h4><ul class="mb-0">@forelse(($project->features ?? []) as $feature)<li>{{ $feature }}</li>@empty<li>Features will be listed soon.</li>@endforelse</ul></div></div>
                    <div class="col-md-6"><div class="surface-card h-100"><h4>Tech Stack</h4><ul class="mb-0">@forelse(($project->tech_stack ?? []) as $tech)<li>{{ $tech }}</li>@empty<li>Technology stack details coming soon.</li>@endforelse</ul></div></div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="credentials-box p-4 sticky-lg-top">
                    <h4 class="mb-3">Demo Credentials</h4>
                    @if($project->demo_url)
                        <p class="mb-2"><span class="text-secondary">Login URL</span><br><a href="{{ $project->demo_url }}" target="_blank" class="fw-semibold">{{ $project->demo_url }}</a></p>
                        <p class="mb-2"><span class="text-secondary">Username</span><br><code>{{ $project->demo_username }}</code></p>
                        <p class="mb-3"><span class="text-secondary">Password</span><br><code>{{ $project->demo_password }}</code></p>
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary w-100 rounded-pill">Open Demo</a>
                    @else
                        <p class="text-muted mb-0">Demo access is currently private or coming soon.</p>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
