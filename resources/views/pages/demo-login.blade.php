@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])

@section('content')
<section class="py-6 bg-soft">
    <div class="container">
        <h1 class="mb-3">{{ $page?->t('hero_title') ?: 'Demo Login' }}</h1>
        <p class="lead mb-0">{{ $page?->t('hero_subtitle') ?: 'Use these credentials to evaluate selected solutions.' }}</p>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="row g-4">
            @forelse($projects as $project)
                <div class="col-lg-6">
                    <article class="credentials-box h-100 p-4 mouse-lift">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-0">{{ $project->title }}</h5>
                            <span class="badge status-badge status-{{ $project->status }}">{{ __('messages.labels.status_'.$project->status) }}</span>
                        </div>
                        <p class="text-muted">{{ $project->short_description }}</p>

                        @if($project->demo_url)
                            <div class="small text-secondary mb-2">Username: <code>{{ $project->demo_username ?: '-' }}</code></div>
                            <div class="small text-secondary mb-3">Password: <code>{{ $project->demo_password ?: '-' }}</code></div>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn btn-outline-primary btn-sm copy-text-trigger" data-copy-text="{{ $project->demo_username }}">{{ __('messages.buttons.copy') }} Username</button>
                                <button type="button" class="btn btn-outline-primary btn-sm copy-text-trigger" data-copy-text="{{ $project->demo_password }}">{{ __('messages.buttons.copy') }} Password</button>
                                <a class="btn btn-primary btn-sm" target="_blank" rel="noopener noreferrer" href="{{ $project->demo_url }}">{{ __('messages.buttons.open_demo') }}</a>
                            </div>
                        @else
                            <a class="btn btn-outline-success rounded-pill" target="_blank" href="https://wa.me/{{ preg_replace('/\D+/', '', $settings->whatsapp_number ?? '') }}">{{ __('messages.buttons.request_demo') }} ({{ __('messages.buttons.whatsapp') }})</a>
                        @endif
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">{{ __('messages.no_demos') }}</div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
