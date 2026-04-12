@extends('admin.layouts.app', ['title' => 'Projects'])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="#">Projects</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3">
    <div class="row align-items-center">
        <div class="col"><h2 class="page-title">Projects</h2></div>
        <div class="col-auto ms-auto"><a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create Project</a></div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter table-hover card-table">
            <thead>
            <tr>
                <th>Title</th><th>Status</th><th>Category</th><th>Featured</th><th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ $project->title }}</div>
                        <div class="text-secondary small">/{{ $project->slug }}</div>
                    </td>
                    <td><span class="badge bg-{{ $project->status === 'active' ? 'green' : ($project->status === 'coming_soon' ? 'yellow' : 'blue') }}-lt">{{ ucfirst(str_replace('_',' ', $project->status)) }}</span></td>
                    <td>{{ $project->category }}</td>
                    <td>{!! $project->is_featured ? '<span class="badge bg-primary-lt">Featured</span>' : '<span class="text-secondary">No</span>' !!}</td>
                    <td class="text-end">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.projects.edit',$project) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.projects.destroy',$project) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete project?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-5 text-secondary">No projects yet. Create your first project.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $projects->links() }}</div>
@endsection
