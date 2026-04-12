@extends('layouts.app', ['title' => 'Edit Project'])
@section('content')
<div class="container"><h1 class="mb-3">Edit Project</h1><form method="POST" action="{{ route('admin.projects.update',$project) }}" class="card p-4">@method('PUT')@include('admin.projects.form')</form></div>
@endsection
