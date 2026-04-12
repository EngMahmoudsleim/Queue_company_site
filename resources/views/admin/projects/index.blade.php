@extends('admin.layouts.app', ['title' => __('messages.admin.projects')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.admin.projects') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3">
    <div class="row align-items-center">
        <div class="col"><h2 class="page-title">{{ __('messages.admin.projects') }}</h2></div>
        <div class="col-auto ms-auto"><a href="{{ route('admin.projects.create') }}" class="btn btn-primary">{{ __('messages.buttons.create') }}</a></div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter table-hover card-table">
            <thead>
            <tr>
                <th>{{ __('messages.admin.table.title') }}</th><th>{{ __('messages.admin.table.status') }}</th><th>{{ __('messages.admin.table.category') }}</th><th>{{ __('messages.admin.table.featured') }}</th><th class="text-end">{{ __('messages.admin.table.actions') }}</th>
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
                    <td>@if($project->is_featured)<span class="badge bg-primary-lt">{{ __('messages.admin.table.featured') }}</span>@else<span class="text-secondary">{{ app()->getLocale()==='ar' ? 'لا' : 'No' }}</span>@endif</td>
                    <td class="text-end">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.projects.edit',$project) }}">{{ __('messages.buttons.edit') }}</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.projects.destroy',$project) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('{{ app()->getLocale()==='ar' ? 'حذف المشروع؟' : 'Delete project?' }}')">{{ __('messages.buttons.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-5 text-secondary">{{ __('messages.admin.no_data') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $projects->links() }}</div>
@endsection
