@extends('admin.layouts.app', ['title' => 'AI Providers'])

@section('content')
<div class="page-header d-print-none mb-3">
    <h2 class="page-title">AI Providers Settings</h2>
    <p class="text-secondary mb-0">Configure Grok and free-tier alternatives in one place.</p>
</div>

<form method="POST" action="{{ route('admin.settings.ai.update') }}" class="card mb-3">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Default Provider</label>
                <select name="ai_default_provider" class="form-select">
                    @php($selected = old('ai_default_provider', $settings->ai_default_provider ?? 'grok'))
                    <option value="grok" @selected($selected === 'grok')>Grok (xAI)</option>
                    <option value="gemini" @selected($selected === 'gemini')>Gemini (Google)</option>
                    <option value="openrouter" @selected($selected === 'openrouter')>OpenRouter</option>
                    <option value="huggingface" @selected($selected === 'huggingface')>Hugging Face Inference</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Grok API Key</label>
                <input class="form-control" name="ai_grok_key" value="{{ old('ai_grok_key', data_get($settings->ai_provider_keys, 'grok')) }}" placeholder="xai-...">
            </div>
            <div class="col-md-6">
                <label class="form-label">Gemini API Key</label>
                <input class="form-control" name="ai_gemini_key" value="{{ old('ai_gemini_key', data_get($settings->ai_provider_keys, 'gemini')) }}" placeholder="AIza...">
            </div>
            <div class="col-md-6">
                <label class="form-label">OpenRouter API Key</label>
                <input class="form-control" name="ai_openrouter_key" value="{{ old('ai_openrouter_key', data_get($settings->ai_provider_keys, 'openrouter')) }}" placeholder="sk-or-v1-...">
            </div>
            <div class="col-md-6">
                <label class="form-label">Hugging Face API Key</label>
                <input class="form-control" name="ai_huggingface_key" value="{{ old('ai_huggingface_key', data_get($settings->ai_provider_keys, 'huggingface')) }}" placeholder="hf_...">
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary">{{ __('messages.buttons.save') }}</button>
    </div>
</form>

<div class="card">
    <div class="card-body">
        <h3 class="h5">Free / low-cost options</h3>
        <ul class="mb-0 text-secondary">
            <li><strong>Grok API:</strong> good for general chat, usually has trial/free credit windows.</li>
            <li><strong>Google Gemini:</strong> generous free tier through Google AI Studio for light usage.</li>
            <li><strong>OpenRouter:</strong> aggregates multiple providers and includes some free models.</li>
            <li><strong>Hugging Face Inference:</strong> community-hosted and serverless options with free quotas.</li>
        </ul>
    </div>
</div>
@endsection
