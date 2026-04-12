@extends('layouts.app', ['title' => 'Demo Login | Queue Company'])

@section('content')
<section class="py-6 bg-soft">
  <div class="container">
    <h1 class="mb-3">Demo Login</h1>
    <p class="lead mb-0">Use these credentials to evaluate selected solutions.</p>
  </div>
</section>
<section class="py-6">
  <div class="container">
    <div class="row g-4">
      @forelse($projects as $project)
        <div class="col-lg-6">
          <article class="credentials-box h-100 p-4 mouse-lift">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <h5 class="mb-0">{{ $project->title }}</h5>
              <span class="badge status-badge status-{{ $project->status }}">{{ ucfirst(str_replace('_',' ',$project->status)) }}</span>
            </div>
            <p class="text-muted">{{ $project->short_description }}</p>
            @if($project->demo_url)
              <div class="credential-row"><span>URL</span><code>{{ $project->demo_url }}</code></div>
              <div class="credential-row"><span>Username</span><code>{{ $project->demo_username }}</code></div>
              <div class="credential-row mb-3"><span>Password</span><code>{{ $project->demo_password }}</code></div>
              <a class="btn btn-primary rounded-pill" target="_blank" href="{{ $project->demo_url }}">Open Login Page</a>
            @else
              <p class="mb-0 text-muted">Demo credentials are not publicly available for this project yet.</p>
            @endif
          </article>
        </div>
      @empty
        <div class="col-12"><div class="empty-state">No demos have been published yet.</div></div>
      @endforelse
    </div>
  </div>
</section>
@endsection
