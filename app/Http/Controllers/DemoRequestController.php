<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemoRequestStoreRequest;
use App\Mail\NewInboxNotificationMail;
use App\Models\DemoRequest;
use App\Models\SiteSetting;
use App\Services\AnalyticsTracker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DemoRequestController extends Controller
{
    public function store(DemoRequestStoreRequest $request, AnalyticsTracker $tracker): RedirectResponse
    {
        $demoRequest = DemoRequest::create($request->validated() + ['status' => 'new']);

        $tracker->track($request, 'demo_request_submission', ['project_id' => $demoRequest->project_id]);

        try {
            $email = SiteSetting::current()->admin_notification_email;
            if ($email) {
                Mail::to($email)->send(new NewInboxNotificationMail('New demo request', [
                    "Name: {$demoRequest->name}",
                    "Project ID: {$demoRequest->project_id}",
                    "Preferred: {$demoRequest->preferred_channel}",
                ]));
            }
        } catch (\Throwable $e) {
            Log::warning('Demo request mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('success', app()->getLocale() === 'ar' ? 'تم إرسال طلب العرض التجريبي.' : 'Demo request submitted successfully.');
    }
}
