<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'projectsCount' => Project::count(),
            'featuredCount' => Project::where('is_featured', true)->count(),
            'messagesCount' => ContactMessage::count(),
            'recentProjects' => Project::ordered()->take(5)->get(),
        ]);
    }
}
