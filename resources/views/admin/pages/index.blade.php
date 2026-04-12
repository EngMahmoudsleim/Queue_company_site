@extends('admin.layouts.app', ['title' => 'Pages / Content'])
@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">Pages / Content</h2></div>
<div class="card">
<table class="table card-table table-vcenter">
<thead><tr><th>Title</th><th>Slug</th><th>Status</th><th class="text-end">Action</th></tr></thead>
<tbody>
@foreach($pages as $page)
<tr>
<td>{{ $page->title_en }}<div class="text-secondary small">{{ $page->title_ar }}</div></td>
<td>/{{ $page->slug }}</td>
<td><span class="badge bg-{{ $page->status === 'published' ? 'green' : 'yellow' }}-lt">{{ ucfirst($page->status) }}</span></td>
<td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.pages.edit', $page) }}">Edit</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="mt-3">{{ $pages->links() }}</div>
@endsection
