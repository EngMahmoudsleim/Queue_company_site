@php($settings = \App\Models\SiteSetting::current())
@extends('layouts.app', ['title' => $project->meta_title ?: $project->title, 'metaDescription' => $project->meta_description ?: $project->short_description])

@section('content')
<section class="py-5 bg-soft border-bottom">
    <div class="container">
        <nav class="small mb-3"><a href="{{ route('projects.index') }}">{{ __('messages.nav.projects') }}</a> / {{ $project->title }}</nav>
        <h1 class="mb-2">{{ $project->title }}</h1>
        <p class="lead mb-3">{{ $project->short_description }}</p>
        <div class="d-flex gap-2 flex-wrap">
            <span class="badge text-bg-light border">{{ $project->category }}</span>
            <span class="badge text-bg-light border">{{ ucfirst($project->project_type ?? 'web') }}</span>
            <span class="badge status-badge status-{{ $project->status }}">{{ __('messages.labels.status_'.$project->status) }}</span>
            @if($project->industry)
                <span class="badge text-bg-light border">{{ $project->industry }}</span>
            @endif
        </div>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                @if(count($project->gallery_image_urls))
                    <div id="gallery{{ $project->id }}" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-4">
                            @foreach($project->gallery_image_urls as $img)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{ $img }}" class="d-block w-100" alt="{{ $project->title }} screenshot {{ $loop->iteration }}">
                                </div>
                            @endforeach
                        </div>
                        @if(count($project->gallery_image_urls) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#gallery{{ $project->id }}" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                            <button class="carousel-control-next" type="button" data-bs-target="#gallery{{ $project->id }}" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
                        @endif
                    </div>
                @else
                    <img src="{{ $project->featured_image_url }}" class="img-fluid rounded-4 mb-4" alt="{{ $project->title }}">
                @endif

                <div class="surface-card mb-4">
                    <h3>Overview</h3>
                    <p>{{ $project->full_description }}</p>
                    @if($project->deployment_mode)
                        <p class="mb-2"><strong>Deployment:</strong> {{ $project->deployment_mode }}</p>
                    @endif
                    @if(is_array($project->supported_platforms) && count($project->supported_platforms))
                        <p class="mb-0"><strong>Platforms:</strong> {{ implode(', ', $project->supported_platforms) }}</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="credentials-box p-4 sticky-lg-top">
                    <h4 class="mb-3">{{ __('messages.demo_credentials') }}</h4>
                    @if($project->demo_url)
                        <p class="small text-secondary mb-2">Username: <code>{{ $project->demo_username ?: '-' }}</code></p>
                        <p class="small text-secondary mb-3">Password: <code>{{ $project->demo_password ?: '-' }}</code></p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary rounded-pill" target="_blank" rel="noopener noreferrer" href="{{ $project->demo_url }}" data-track-event="demo_click" data-project-id="{{ $project->id }}">{{ __('messages.buttons.open_demo') }}</a>
                            <button type="button" class="btn btn-outline-primary rounded-pill copy-text-trigger" data-copy-text="{{ $project->demo_username }}">{{ __('messages.buttons.copy') }} Username</button>
                            <button type="button" class="btn btn-outline-primary rounded-pill copy-text-trigger" data-copy-text="{{ $project->demo_password }}">{{ __('messages.buttons.copy') }} Password</button>
                        </div>
                    @else
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-dark rounded-pill" data-bs-toggle="collapse" data-bs-target="#demoRequestForm">{{ __('messages.buttons.request_demo') }}</button>
                            <a class="btn btn-outline-success rounded-pill" data-track-event="whatsapp_click" data-project-id="{{ $project->id }}" target="_blank" href="https://wa.me/{{ preg_replace('/\D+/', '', $settings->whatsapp_number ?? '') }}">{{ __('messages.buttons.whatsapp') }}</a>
                            <a class="btn btn-outline-primary rounded-pill" data-track-event="telegram_click" data-project-id="{{ $project->id }}" target="_blank" href="{{ $settings->telegram_link ?: '#' }}">{{ __('messages.buttons.telegram') }}</a>
                        </div>
                        @if($project->demo_note)
                            <p class="small text-secondary mt-3 mb-0">{{ $project->demo_note }}</p>
                        @endif
                        <div class="collapse mt-3" id="demoRequestForm">
                            <form method="POST" action="{{ route('demo-requests.store') }}" class="row g-2">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="col-12"><input class="form-control form-control-sm" name="name" placeholder="Name" required></div>
                                <div class="col-12"><input class="form-control form-control-sm" type="email" name="email" placeholder="Email" required></div>
                                <div class="col-12"><input class="form-control form-control-sm" name="whatsapp" placeholder="WhatsApp"></div>
                                <div class="col-12">
                                    <select class="form-select form-select-sm" name="preferred_channel">
                                        <option value="email">Email</option>
                                        <option value="whatsapp">WhatsApp</option>
                                        <option value="telegram">Telegram</option>
                                    </select>
                                </div>
                                <div class="col-12"><textarea class="form-control form-control-sm" rows="2" name="message" placeholder="Message"></textarea></div>
                                <div class="col-12"><button class="btn btn-sm btn-primary w-100">Send Request</button></div>
                            </form>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
