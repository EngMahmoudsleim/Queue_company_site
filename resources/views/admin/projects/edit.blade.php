@extends('admin.layouts.app', ['title' => __('messages.buttons.edit').' '.__('messages.admin.projects')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('messages.admin.projects') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.buttons.edit') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">{{ __('messages.buttons.edit') }} {{ __('messages.admin.projects') }}</h2></div>
<form method="POST" action="{{ route('admin.projects.update', $project) }}" class="card" enctype="multipart/form-data">
    @method('PUT')
    <div class="card-body">@include('admin.projects.form')</div>
</form>
@endsection
