@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])

@section('content')
<section class="py-6 bg-soft">
    <div class="container">
        <h1 class="mb-3">{{ $page?->t('hero_title') ?: 'Projects' }}</h1>
        <p class="lead mb-0">{{ $page?->t('hero_subtitle') ?: 'Browse ERP, POS, SaaS, and custom software solutions built by our team.' }}</p>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="row g-4">
            @forelse($projects as $project)
                <div class="col-md-6 col-lg-4">
                    <article class="project-card h-100 mouse-lift d-flex flex-column">
                        <img src="{{ $project->featured_image_url }}" class="img-fluid rounded-3 mb-3" alt="{{ $project->title }}">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge text-bg-light border">{{ $project->category }}</span>
                            <span class="badge status-badge status-{{ $project->status }}">{{ __('messages.labels.status_'.$project->status) }}</span>
                        </div>
                        <h5>{{ $project->title }}</h5>
                        <p class="text-muted">{{ $project->short_description }}</p>

                        <div class="d-flex gap-2 mt-auto flex-wrap">
                            <a href="{{ route('projects.show', $project->slug) }}" data-track-event="view_project_click" data-project-id="{{ $project->id }}" class="btn btn-primary btn-sm rounded-pill px-3">{{ __('messages.buttons.view_details') }}</a>
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" data-track-event="demo_click" data-project-id="{{ $project->id }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">{{ __('messages.buttons.open_demo') }}</a>
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 copy-text-trigger" data-copy-text="{{ $project->demo_username }}">{{ __('messages.buttons.copy') }} U</button>
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 copy-text-trigger" data-copy-text="{{ $project->demo_password }}">{{ __('messages.buttons.copy') }} P</button>
                            @else
                                <a href="{{ route('contact') }}" data-track-event="request_demo_click" data-project-id="{{ $project->id }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">{{ __('messages.buttons.request_demo') }}</a>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">No projects available right now.</div>
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $projects->links() }}</div>
    </div>
</section>
@endsection
