@extends('admin.layouts.app', ['title' => 'Edit Project'])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">Edit Project</h2></div>
<form method="POST" action="{{ route('admin.projects.update',$project) }}" class="card">
    @method('PUT')
    <div class="card-body">@include('admin.projects.form')</div>
</form>
@endsection
