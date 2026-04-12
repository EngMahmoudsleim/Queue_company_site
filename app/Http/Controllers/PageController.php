<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Services\AnalyticsTracker;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function pageBySlug(string $slug): ?Page
    {
        return Page::where('slug', $slug)->where('status', 'published')->first();
    }

    public function home()
    {
        return view('pages.home', [
            'page' => $this->pageBySlug('home'),
            'settings' => SiteSetting::current(),
            'featuredProjects' => Project::where('is_featured', true)->ordered()->take(3)->get(),
            'projectCount' => Project::count(),
        ]);
    }

    public function about()
    {
        return view('pages.about', ['page' => $this->pageBySlug('about')]);
    }

    public function services()
    {
        return view('pages.services', ['page' => $this->pageBySlug('services')]);
    }

    public function projects()
    {
        return view('pages.projects.index', [
            'page' => $this->pageBySlug('projects'),
            'projects' => Project::ordered()->paginate(9),
        ]);
    }

    public function projectShow(string $slug, Request $request, AnalyticsTracker $tracker)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $tracker->track($request, 'project_view', ['project_id' => $project->id, 'page_slug' => 'projects/'.$slug]);

        return view('pages.projects.show', ['project' => $project]);
    }

    public function demoLogin()
    {
        return view('pages.demo-login', [
            'page' => $this->pageBySlug('demo-login'),
            'settings' => SiteSetting::current(),
            'projects' => Project::ordered()->get(),
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'page' => $this->pageBySlug('contact'),
            'settings' => SiteSetting::current(),
        ]);
    }

    public function setLocale(string $locale)
    {
        if (in_array($locale, ['en', 'ar'], true)) {
            session(['locale' => $locale]);
        }

        return back();
    }
}
