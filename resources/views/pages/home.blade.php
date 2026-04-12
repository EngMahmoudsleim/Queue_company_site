@php
$sections = $page?->sections ?? [];
$services = data_get($sections, 'services', []);
@endphp
@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])

@section('content')
<section class="hero-section interactive-hero position-relative overflow-hidden" data-mouse-parallax>
    <div class="hero-orb orb-1" aria-hidden="true"></div>
    <div class="hero-orb orb-2" aria-hidden="true"></div>
    <div class="container py-6 position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="hero-kicker">{{ app()->getLocale()==='ar' ? data_get($sections,'trust_badge_ar',$settings->company_tagline_ar) : data_get($sections,'trust_badge_en',$settings->company_tagline_en) }}</span>
                <h1 class="display-4 fw-bold mt-3 mb-3">{{ $page?->t('hero_title') ?: ($settings?->t('company_name') ?? 'Queue Company') }}</h1>
                <p class="lead text-white-50 mb-4">{{ $page?->t('hero_subtitle') ?: __('messages.contact_intro') }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ $settings->homepage_primary_cta_link ?: route('projects.index') }}" class="btn btn-primary btn-lg rounded-pill px-4">{{ $settings->t('homepage_primary_cta_label') }}</a>
                    <a href="{{ $settings->homepage_secondary_cta_link ?: route('contact') }}" data-track-event="contact_click" class="btn btn-outline-light btn-lg rounded-pill px-4">{{ $settings->t('homepage_secondary_cta_label') }}</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-stat-card mouse-lift">
                    <h5 class="mb-4">{{ $settings->t('company_name') }}</h5>
                    <div class="d-flex justify-content-between border-bottom border-secondary-subtle pb-2 mb-2"><span>Delivered Projects</span><strong>{{ $projectCount }}+</strong></div>
                    <div class="d-flex justify-content-between border-bottom border-secondary-subtle pb-2 mb-2"><span>ERP & POS Expertise</span><strong>Enterprise</strong></div>
                    <div class="d-flex justify-content-between"><span>Support Model</span><strong>Long-term</strong></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-6"><div class="container"><div class="section-heading text-center mb-5"><h2 class="section-title">{{ __('messages.nav.services') }}</h2><p class="section-subtitle">Business-first engineering across product and process layers.</p></div><div class="row g-4">@foreach($services as $service)<div class="col-md-4"><article class="feature-card h-100 mouse-lift"><h5>{{ app()->getLocale()==='ar' ? data_get($service,'title_ar') : data_get($service,'title_en') }}</h5><p class="mb-0">{{ app()->getLocale()==='ar' ? data_get($service,'description_ar') : data_get($service,'description_en') }}</p></article></div>@endforeach</div></div></section>
<section class="py-6 bg-soft"><div class="container"><div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4"><div><h2 class="section-title mb-1">{{ __('messages.nav.projects') }}</h2><p class="section-subtitle mb-0">{{ app()->getLocale()==='ar' ? data_get($sections,'featured_intro_ar') : data_get($sections,'featured_intro_en') }}</p></div><a href="{{ route('projects.index') }}" class="btn btn-outline-primary rounded-pill">{{ __('messages.nav.projects') }}</a></div><div class="row g-4">@foreach($featuredProjects as $project)<div class="col-lg-4 col-md-6"><article class="project-card h-100 mouse-lift"><img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="img-fluid rounded-3 mb-3"><span class="badge text-bg-light border mb-2">{{ $project->category }}</span><h5>{{ $project->title }}</h5><p class="text-muted">{{ $project->short_description }}</p><a href="{{ route('projects.show', $project->slug) }}" data-track-event="view_project_click" data-project-id="{{ $project->id }}" class="btn btn-sm btn-primary rounded-pill px-3">{{ __('messages.buttons.view_details') }}</a></article></div>@endforeach</div></div></section>
<section class="py-6"><div class="container"><div class="cta-banner text-center"><h3 class="mb-2">{{ $page?->t('cta_text') ?: 'Need a reliable software partner?' }}</h3><p class="mb-4">{{ $page?->t('body') }}</p><a href="{{ $page?->cta_link ?: route('contact') }}" class="btn btn-light rounded-pill px-4">{{ $page?->t('cta_text') ?: 'Talk to Our Team' }}</a></div></div></section>
@include('partials.demo-modal')
@endsection
