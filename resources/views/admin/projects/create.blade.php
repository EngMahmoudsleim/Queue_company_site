@extends('layouts.app', ['title' => 'Create Project'])
@section('content')
<div class="container"><h1 class="mb-3">Create Project</h1><form method="POST" action="{{ route('admin.projects.store') }}" class="card p-4">@include('admin.projects.form')</form></div>
@endsection
