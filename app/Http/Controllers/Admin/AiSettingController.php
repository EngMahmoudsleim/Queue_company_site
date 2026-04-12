<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AiSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;

class AiSettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.ai', ['settings' => SiteSetting::current()]);
    }

    public function update(AiSettingRequest $request): RedirectResponse
    {
        $settings = SiteSetting::current();

        $settings->update([
            'ai_default_provider' => $request->string('ai_default_provider')->toString(),
            'ai_provider_keys' => [
                'grok' => $request->string('ai_grok_key')->toString() ?: null,
                'gemini' => $request->string('ai_gemini_key')->toString() ?: null,
                'openrouter' => $request->string('ai_openrouter_key')->toString() ?: null,
                'huggingface' => $request->string('ai_huggingface_key')->toString() ?: null,
            ],
        ]);

        return back()->with('success', __('messages.saved_successfully'));
    }
}
