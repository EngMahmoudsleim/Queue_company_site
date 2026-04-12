<?php

namespace App\Http\Middleware;

use App\Services\AnalyticsTracker;
use Closure;
use Illuminate\Http\Request;

class TrackPageView
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->isMethod('GET') && !$request->is('admin*') && $response->isSuccessful()) {
            app(AnalyticsTracker::class)->track($request, 'page_view', [
                'page_slug' => trim($request->path(), '/') ?: 'home',
            ]);

            if (!$request->cookie('visitor_id')) {
                $response->cookie('visitor_id', app(AnalyticsTracker::class)->visitorId($request), 60 * 24 * 365);
            }
        }

        return $response;
    }
}
