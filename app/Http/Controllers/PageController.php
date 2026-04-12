<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'featuredProjects' => Project::where('is_featured', true)->ordered()->take(3)->get(),
            'projectCount' => Project::count(),
        ]);
    }

    public function about() { return view('pages.about'); }
    public function services() { return view('pages.services'); }

    public function projects()
    {
        return view('pages.projects.index', ['projects' => Project::ordered()->paginate(9)]);
    }

    public function projectShow(string $slug)
    {
        return view('pages.projects.show', ['project' => Project::whereSlug($slug)->firstOrFail()]);
    }

    public function demoLogin()
    {
        return view('pages.demo-login', ['projects' => Project::ordered()->get()]);
    }

    public function contact() { return view('pages.contact'); }
}
