@extends('admin.layouts.app', ['title' => __('messages.buttons.create').' '.__('messages.admin.projects')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('messages.admin.projects') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.buttons.create') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">{{ __('messages.buttons.create') }} {{ __('messages.admin.projects') }}</h2></div>
<form method="POST" action="{{ route('admin.projects.store') }}" class="card" enctype="multipart/form-data">
    <div class="card-body">@include('admin.projects.form')</div>
</form>
@endsection
