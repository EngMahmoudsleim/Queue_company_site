@extends('layouts.app', ['title' => $project->meta_title ?: $project->title, 'metaDescription' => $project->meta_description ?: $project->short_description])
@section('content')
<div class="container">
  <nav><a href="{{ route('projects.index') }}">Projects</a> / {{ $project->title }}</nav>
  <div class="py-4"><h1>{{ $project->title }}</h1><p class="lead">{{ $project->short_description }}</p><span class="badge bg-primary">{{ $project->category }}</span> <span class="badge bg-dark">{{ ucfirst(str_replace('_',' ',$project->status)) }}</span></div>
  <img src="{{ $project->featured_image ?: 'https://placehold.co/1200x500' }}" class="img-fluid rounded mb-4" alt="{{ $project->title }}">
  <p>{{ $project->full_description }}</p>
  <div class="row g-4 mt-2"><div class="col-lg-6"><h4>Features</h4><ul>@foreach(($project->features ?? []) as $feature)<li>{{ $feature }}</li>@endforeach</ul></div><div class="col-lg-6"><h4>Tech Stack</h4><ul>@foreach(($project->tech_stack ?? []) as $tech)<li>{{ $tech }}</li>@endforeach</ul></div></div>
  <div class="credentials-box mt-4 p-4"><h4>Demo Access</h4>@if($project->demo_url)<p><strong>Login URL:</strong> <a href="{{ $project->demo_url }}" target="_blank">{{ $project->demo_url }}</a></p><p><strong>Username:</strong> {{ $project->demo_username }}</p><p><strong>Password:</strong> {{ $project->demo_password }}</p>@else<p class="text-muted">Demo access is not public yet.</p>@endif</div>
</div>
@endsection
