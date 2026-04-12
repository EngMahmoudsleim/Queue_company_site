@extends('admin.layouts.app', ['title' => 'Create Project'])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">Create Project</h2></div>
<form method="POST" action="{{ route('admin.projects.store') }}" class="card" enctype="multipart/form-data">
    <div class="card-body">@include('admin.projects.form')</div>
</form>
@endsection
