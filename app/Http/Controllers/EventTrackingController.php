<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsTracker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventTrackingController extends Controller
{
    public function store(Request $request, AnalyticsTracker $tracker): JsonResponse
    {
        $validated = $request->validate([
            'event_type' => ['required', 'string', 'max:50'],
            'project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'page_slug' => ['nullable', 'string', 'max:120'],
            'label' => ['nullable', 'string', 'max:120'],
        ]);

        $tracker->track($request, $validated['event_type'], [
            'project_id' => $validated['project_id'] ?? null,
            'page_slug' => $validated['page_slug'] ?? null,
            'event_data' => ['label' => $validated['label'] ?? null],
        ]);

        return response()->json(['ok' => true]);
    }
}
