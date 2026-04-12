<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\NewInboxNotificationMail;
use App\Models\FeedbackReport;
use App\Models\Page;
use App\Models\SiteSetting;
use App\Services\AnalyticsTracker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('pages.feedback', [
            'settings' => SiteSetting::current(),
            'page' => Page::where('slug', 'feedback')->first(),
        ]);
    }

    public function store(FeedbackRequest $request, AnalyticsTracker $tracker): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('screenshot')) {
            $data['screenshot_path'] = $request->file('screenshot')->store('feedback', 'public');
        }
        unset($data['screenshot']);

        $feedback = FeedbackReport::create($data + ['status' => 'new', 'priority' => $data['priority'] ?? 'normal']);

        $tracker->track($request, 'feedback_submission', ['event_data' => ['feedback_id' => $feedback->id]]);
        $this->sendNotification('New feedback report', [
            "Type: {$feedback->type}",
            "Subject: {$feedback->subject}",
            "Email: {$feedback->email}",
        ]);

        return back()->with('success', app()->getLocale() === 'ar' ? 'تم استلام ملاحظتك بنجاح.' : 'Your feedback has been received.');
    }

    private function sendNotification(string $title, array $lines): void
    {
        try {
            $email = SiteSetting::current()->admin_notification_email;
            if ($email) {
                Mail::to($email)->send(new NewInboxNotificationMail($title, $lines));
            }
        } catch (\Throwable $e) {
            Log::warning('Feedback mail failed', ['error' => $e->getMessage()]);
        }
    }
}
