@extends('admin.layouts.app', ['title' => __('messages.admin.create_page')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">{{ __('messages.admin.pages') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.buttons.create') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3">
    <h2 class="page-title">{{ __('messages.admin.create_page') }}</h2>
</div>
<form method="POST" action="{{ route('admin.pages.store') }}" class="card">
    @csrf
    @include('admin.pages.form')
</form>
@endsection
