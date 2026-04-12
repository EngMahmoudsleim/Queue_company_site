@extends('admin.layouts.app', ['title' => __('messages.admin.edit_page')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">{{ __('messages.admin.pages') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.buttons.edit') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h2 class="page-title">{{ __('messages.admin.edit_page') }}: {{ $page->slug }}</h2>
    <a href="{{ $page->slug === 'home' ? route('home') : url('/' . ltrim($page->slug, '/')) }}" target="_blank" class="btn btn-outline-secondary">{{ __('messages.buttons.preview') }}</a>
</div>
<form method="POST" action="{{ route('admin.pages.update', $page) }}" class="card">
    @csrf
    @method('PUT')
    @include('admin.pages.form')
</form>
@endsection
