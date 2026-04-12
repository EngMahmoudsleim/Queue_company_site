<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'whatsapp' => ['nullable', 'string', 'max:40'],
            'type' => ['required', Rule::in(['suggestion', 'bug_report', 'comment', 'inquiry'])],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10'],
            'current_url' => ['nullable', 'url', 'max:500'],
            'priority' => ['nullable', Rule::in(['low', 'normal', 'high'])],
            'screenshot' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
