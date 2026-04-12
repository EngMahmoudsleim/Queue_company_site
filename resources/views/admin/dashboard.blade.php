@extends('admin.layouts.app', ['title' => 'Dashboard'])
@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">Admin Dashboard</h2><div class="text-secondary">Business analytics and inbox overview.</div></div>
<div class="row row-deck row-cards mb-4">
@foreach([
['label'=>'Total Visits','value'=>$stats['visits']],['label'=>'Unique Visitors','value'=>$stats['unique_visitors']],['label'=>'Project Views','value'=>$stats['project_views']],['label'=>'Demo Clicks','value'=>$stats['demo_clicks']],['label'=>'WhatsApp Clicks','value'=>$stats['whatsapp_clicks']],['label'=>'Telegram Clicks','value'=>$stats['telegram_clicks']],['label'=>'Contact Submissions','value'=>$stats['contact_submissions']],['label'=>'Feedback Reports','value'=>$stats['feedback_reports']],
] as $card)
<div class="col-sm-6 col-lg-3"><div class="card card-sm"><div class="card-body"><div class="font-weight-medium">{{ $card['value'] }}</div><div class="text-secondary">{{ $card['label'] }}</div></div></div></div>
@endforeach
</div>
<div class="row row-cards">
<div class="col-lg-6"><div class="card"><div class="card-header"><h3 class="card-title">Top Viewed Pages</h3></div><div class="table-responsive"><table class="table card-table"><thead><tr><th>Page</th><th class="text-end">Views</th></tr></thead><tbody>@forelse($topPages as $page)<tr><td>{{ $page->page_slug }}</td><td class="text-end">{{ $page->total }}</td></tr>@empty<tr><td colspan="2" class="text-center text-secondary py-3">No data</td></tr>@endforelse</tbody></table></div></div></div>
<div class="col-lg-6"><div class="card"><div class="card-header"><h3 class="card-title">Top Viewed Projects</h3></div><div class="table-responsive"><table class="table card-table"><thead><tr><th>Project</th><th class="text-end">Events</th></tr></thead><tbody>@forelse($topProjects as $row)<tr><td>{{ $row->project?->title ?? 'Unknown' }}</td><td class="text-end">{{ $row->total }}</td></tr>@empty<tr><td colspan="2" class="text-center text-secondary py-3">No data</td></tr>@endforelse</tbody></table></div></div></div>
<div class="col-12"><div class="card"><div class="card-header d-flex justify-content-between"><h3 class="card-title">Recent Incoming Submissions</h3><a href="{{ route('admin.inbox.index') }}" class="btn btn-sm btn-primary">Open Inbox</a></div><div class="table-responsive"><table class="table card-table"><thead><tr><th>Type</th><th>Subject</th><th>Date</th></tr></thead><tbody>@forelse($recentSubmissions as $item)<tr><td>{{ $item['type'] }}</td><td>{{ $item['subject'] }}</td><td>{{ $item['created_at']->format('Y-m-d H:i') }}</td></tr>@empty<tr><td colspan="3" class="text-center text-secondary py-3">No submissions yet.</td></tr>@endforelse</tbody></table></div></div></div>
</div>
@endsection
