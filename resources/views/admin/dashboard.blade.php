@extends('admin.layouts.app', ['title' => 'Dashboard'])

@section('breadcrumbs')
    <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
        <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
    </ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Admin Dashboard</h2>
            <div class="text-secondary">Manage projects, monitor activity, and keep demos current.</div>
        </div>
    </div>
</div>

<div class="row row-deck row-cards mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <span class="bg-primary text-white avatar me-3">#</span>
                    <div>
                        <div class="font-weight-medium">{{ $projectsCount }} Projects</div>
                        <div class="text-secondary">Total in catalog</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <span class="bg-azure text-white avatar me-3">★</span>
                    <div>
                        <div class="font-weight-medium">{{ $featuredCount }} Featured</div>
                        <div class="text-secondary">Highlighted projects</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <span class="bg-green text-white avatar me-3">✉</span>
                    <div>
                        <div class="font-weight-medium">{{ $messagesCount }} Messages</div>
                        <div class="text-secondary">Contact submissions</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Recent Projects</h3>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm">Manage Projects</a>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead><tr><th>Project</th><th>Status</th><th>Category</th><th class="text-end">Sort</th></tr></thead>
            <tbody>
                @forelse($recentProjects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td><span class="badge bg-blue-lt">{{ ucfirst(str_replace('_',' ', $project->status)) }}</span></td>
                        <td>{{ $project->category }}</td>
                        <td class="text-end">{{ $project->sort_order }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">No projects found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
