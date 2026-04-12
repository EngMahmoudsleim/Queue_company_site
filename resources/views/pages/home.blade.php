@extends('layouts.app', ['title' => 'Queue Company | Software Development'])
@section('content')
<section class="hero-section py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7"><h1 class="display-5 fw-bold">Build Smarter Software Products with Queue Company</h1><p class="lead">We deliver custom platforms, ERP systems, POS solutions, and scalable SaaS products for ambitious businesses.</p><a href="{{ route('projects.index') }}" class="btn btn-primary me-2">Explore Projects</a><a href="{{ route('contact') }}" class="btn btn-outline-light">Start a Project</a></div>
      <div class="col-lg-5"><div class="glass-card p-4"><h5 class="mb-3">At a glance</h5><p class="mb-1">{{ $projectCount }} successful project implementations</p><p class="mb-0">Cross-industry delivery in ERP, POS, and cloud products.</p></div></div>
    </div>
  </div>
</section>
<div class="container py-5">
  <h2 class="section-title">Featured Projects</h2>
  <div class="row g-4">
  @forelse($featuredProjects as $project)
    <div class="col-md-4"><div class="card h-100 shadow-sm"><img src="{{ $project->featured_image ?: 'https://placehold.co/600x350' }}" class="card-img-top" alt="{{ $project->title }}"><div class="card-body"><h5>{{ $project->title }}</h5><p>{{ $project->short_description }}</p><a href="{{ route('projects.show',$project->slug) }}" class="btn btn-sm btn-primary">View Details</a></div></div></div>
  @empty
    <p class="text-muted">No featured projects available yet.</p>
  @endforelse
  </div>
</div>
@endsection
