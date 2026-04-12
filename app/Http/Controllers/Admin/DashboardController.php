<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticsEvent;
use App\Models\ContactMessage;
use App\Models\DemoRequest;
use App\Models\FeedbackReport;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $pageViews = AnalyticsEvent::where('event_type', 'page_view');

        return view('admin.dashboard', [
            'stats' => [
                'visits' => $pageViews->count(),
                'unique_visitors' => AnalyticsEvent::where('event_type', 'page_view')->distinct('visitor_id')->count('visitor_id'),
                'project_views' => AnalyticsEvent::where('event_type', 'project_view')->count(),
                'demo_clicks' => AnalyticsEvent::where('event_type', 'demo_click')->count(),
                'whatsapp_clicks' => AnalyticsEvent::where('event_type', 'whatsapp_click')->count(),
                'telegram_clicks' => AnalyticsEvent::where('event_type', 'telegram_click')->count(),
                'contact_submissions' => ContactMessage::count(),
                'feedback_reports' => FeedbackReport::count(),
            ],
            'topPages' => AnalyticsEvent::select('page_slug', DB::raw('COUNT(*) as total'))
                ->where('event_type', 'page_view')->groupBy('page_slug')->orderByDesc('total')->limit(7)->get(),
            'topProjects' => AnalyticsEvent::select('project_id', DB::raw('COUNT(*) as total'))
                ->with('project:id,title')
                ->whereNotNull('project_id')->whereIn('event_type', ['project_view', 'demo_click'])
                ->groupBy('project_id')->orderByDesc('total')->limit(7)->get(),
            'recentSubmissions' => collect([
                ...ContactMessage::latest()->take(3)->get()->map(fn ($m) => ['type' => 'Contact', 'subject' => $m->subject, 'created_at' => $m->created_at]),
                ...FeedbackReport::latest()->take(3)->get()->map(fn ($f) => ['type' => 'Feedback', 'subject' => $f->subject, 'created_at' => $f->created_at]),
                ...DemoRequest::latest()->take(3)->get()->map(fn ($d) => ['type' => 'Demo Request', 'subject' => $d->name, 'created_at' => $d->created_at]),
            ])->sortByDesc('created_at')->take(8),
            'projectsCount' => Project::count(),
        ]);
    }
}
