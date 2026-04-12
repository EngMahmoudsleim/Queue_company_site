@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])
@section('content')
<section class="py-6 bg-soft"><div class="container"><h1 class="mb-3">{{ $page?->t('hero_title') }}</h1><p class="lead mb-0">{{ $page?->t('hero_subtitle') ?: __('messages.contact_intro') }}</p></div></section>
<section class="py-6"><div class="container"><div class="row g-4"><div class="col-lg-7"><div class="surface-card h-100">@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('contact.store') }}" data-track-event="contact_submission_attempt" class="row g-3">@csrf
<div class="col-md-6"><label class="form-label">Name</label><input name="name" value="{{ old('name') }}" class="form-control" required></div>
<div class="col-md-6"><label class="form-label">{{ __('messages.labels.email') }}</label><input name="email" type="email" value="{{ old('email') }}" class="form-control" required></div>
<div class="col-md-6"><label class="form-label">{{ __('messages.labels.phone') }}</label><input name="phone" value="{{ old('phone') }}" class="form-control"></div>
<div class="col-md-6"><label class="form-label">Subject</label><input name="subject" value="{{ old('subject') }}" class="form-control" required></div>
<div class="col-12"><label class="form-label">Message</label><textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea></div>
<div class="col-12"><button class="btn btn-primary rounded-pill px-4">{{ __('messages.buttons.send_message') }}</button></div></form></div></div>
<div class="col-lg-5"><div class="surface-card h-100"><h5>{{ __('messages.labels.company_contact') }}</h5><p class="mb-2"><strong>{{ __('messages.labels.email') }}:</strong> {{ $settings->contact_email }}</p><p class="mb-2"><strong>{{ __('messages.labels.phone') }}:</strong> {{ $settings->phone_number }}</p><p class="mb-0"><strong>{{ __('messages.labels.office') }}:</strong> {{ $settings->t('office_address') }}</p></div></div></div></div></section>
@endsection
