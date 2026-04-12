<?php

namespace App\Services;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnalyticsTracker
{
    public function visitorId(Request $request): string
    {
        return $request->cookie('visitor_id') ?: Str::uuid()->toString();
    }

    public function track(Request $request, string $eventType, array $data = []): void
    {
        AnalyticsEvent::create([
            'visitor_id' => $this->visitorId($request),
            'event_type' => $eventType,
            'route_name' => optional($request->route())->getName(),
            'url' => $request->fullUrl(),
            'page_slug' => $data['page_slug'] ?? null,
            'project_id' => $data['project_id'] ?? null,
            'event_data' => $data['event_data'] ?? null,
        ]);
    }
}
