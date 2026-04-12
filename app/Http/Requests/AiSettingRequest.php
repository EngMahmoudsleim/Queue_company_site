<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AiSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ai_default_provider' => ['required', Rule::in(['grok', 'gemini', 'openrouter', 'huggingface'])],
            'ai_grok_key' => ['nullable', 'string', 'max:255'],
            'ai_gemini_key' => ['nullable', 'string', 'max:255'],
            'ai_openrouter_key' => ['nullable', 'string', 'max:255'],
            'ai_huggingface_key' => ['nullable', 'string', 'max:255'],
        ];
    }
}
