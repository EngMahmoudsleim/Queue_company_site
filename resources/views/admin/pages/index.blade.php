@extends('admin.layouts.app', ['title' => __('messages.admin.pages')])

@section('breadcrumbs')
<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin.dashboard') }}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ __('messages.admin.pages') }}</a></li>
</ol>
@endsection

@section('content')
<div class="page-header d-print-none mb-3">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">{{ __('messages.admin.pages') }}</h2>
            <div class="text-secondary">{{ __('messages.admin.pages_help') }}</div>
        </div>
        <div class="col-auto ms-auto">
            <a class="btn btn-primary" href="{{ route('admin.pages.create') }}">{{ __('messages.admin.create_page') }}</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table card-table table-vcenter">
            <thead>
            <tr>
                <th>{{ __('messages.admin.table.title') }}</th>
                <th>{{ __('messages.admin.table.slug') }}</th>
                <th>{{ __('messages.admin.table.status') }}</th>
                <th class="text-end">{{ __('messages.admin.table.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pages as $page)
                <tr>
                    <td>{{ $page->title_en }}<div class="text-secondary small">{{ $page->title_ar }}</div></td>
                    <td>/{{ $page->slug }}</td>
                    <td><span class="badge bg-{{ $page->status === 'published' ? 'green' : 'yellow' }}-lt">{{ __('messages.admin.status.' . $page->status) }}</span></td>
                    <td class="text-end">
                        <div class="btn-list justify-content-end">
                            <a class="btn btn-sm btn-outline-secondary" target="_blank" href="{{ $page->slug === 'home' ? route('home') : url('/' . ltrim($page->slug, '/')) }}">{{ __('messages.buttons.preview') }}</a>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.pages.edit', $page) }}">{{ __('messages.buttons.edit') }}</a>
                            <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('messages.admin.delete_page_confirm') }}')">{{ __('messages.buttons.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-5 text-secondary">{{ __('messages.admin.empty_pages') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $pages->links() }}</div>
@endsection
