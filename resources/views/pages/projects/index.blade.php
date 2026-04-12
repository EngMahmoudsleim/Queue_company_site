@extends('layouts.app', ['title' => 'Projects | Queue Company'])

@section('content')
<section class="py-6 bg-soft">
    <div class="container">
        <h1 class="mb-3">Projects</h1>
        <p class="lead mb-0">Browse ERP, POS, SaaS, and custom software solutions built by our team.</p>
    </div>
</section>
<section class="py-6">
    <div class="container">
        <div class="row g-4">
            @forelse($projects as $project)
                <div class="col-md-6 col-lg-4">
                    <article class="project-card h-100 mouse-lift">
                        <img src="{{ $project->featured_image ?: 'https://placehold.co/600x350' }}" class="img-fluid rounded-3 mb-3" alt="{{ $project->title }}">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge text-bg-light border">{{ $project->category }}</span>
                            <span class="badge status-badge status-{{ $project->status }}">{{ ucfirst(str_replace('_', ' ', $project->status)) }}</span>
                        </div>
                        <h5>{{ $project->title }}</h5>
                        <p class="text-muted">{{ $project->short_description }}</p>
                        <div class="d-flex gap-2 mt-auto">
                            <a href="{{ route('projects.show',$project->slug) }}" class="btn btn-primary btn-sm rounded-pill px-3">View Details</a>
                            <a href="{{ $project->demo_url ?: route('demo-login') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3" @if($project->demo_url)target="_blank"@endif>Demo</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12"><div class="empty-state">No projects available right now.</div></div>
            @endforelse
        </div>
        <div class="mt-4">{{ $projects->links() }}</div>
    </div>
</section>
@endsection
