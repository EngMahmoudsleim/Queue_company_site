<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\DemoRequest;
use App\Models\FeedbackReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        $box = $request->string('box', 'contacts')->toString();

        return view('admin.inbox.index', [
            'box' => $box,
            'contacts' => ContactMessage::latest()->paginate(15, ['*'], 'contacts_page'),
            'feedbacks' => FeedbackReport::latest()->paginate(15, ['*'], 'feedback_page'),
            'demoRequests' => DemoRequest::with('project')->latest()->paginate(15, ['*'], 'demo_page'),
            'counts' => [
                'contacts' => ContactMessage::count(),
                'feedback' => FeedbackReport::count(),
                'demo' => DemoRequest::count(),
            ],
        ]);
    }

    public function updateContact(Request $request, ContactMessage $contact): RedirectResponse
    {
        $contact->update($request->validate(['status' => ['required', 'in:new,in_progress,resolved,ignored'], 'admin_note' => ['nullable', 'string']]));

        return back()->with('success', 'Contact message updated.');
    }

    public function updateFeedback(Request $request, FeedbackReport $feedback): RedirectResponse
    {
        $feedback->update($request->validate(['status' => ['required', 'in:new,in_progress,resolved,ignored'], 'admin_note' => ['nullable', 'string']]));

        return back()->with('success', 'Feedback report updated.');
    }

    public function updateDemo(Request $request, DemoRequest $demoRequest): RedirectResponse
    {
        $demoRequest->update($request->validate(['status' => ['required', 'in:new,in_progress,resolved,ignored'], 'admin_note' => ['nullable', 'string']]));

        return back()->with('success', 'Demo request updated.');
    }
}
