<?php

namespace App\Http\Controllers;

use App\Mail\NewInboxNotificationMail;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use App\Services\AnalyticsTracker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request, AnalyticsTracker $tracker): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        $message = ContactMessage::create($validated + ['status' => 'new']);
        $tracker->track($request, 'contact_submission', ['event_data' => ['contact_id' => $message->id]]);

        try {
            $email = SiteSetting::current()->admin_notification_email;
            if ($email) {
                Mail::to($email)->send(new NewInboxNotificationMail('New contact message', [
                    "Name: {$message->name}",
                    "Subject: {$message->subject}",
                    "Email: {$message->email}",
                ]));
            }
        } catch (\Throwable $e) {
            Log::warning('Contact mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('success', app()->getLocale()==='ar' ? 'شكراً لتواصلك معنا. سنرد عليك قريباً.' : 'Thanks for contacting us. We will reply soon.');
    }
}
