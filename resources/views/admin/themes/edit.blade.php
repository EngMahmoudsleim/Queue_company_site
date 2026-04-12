@extends('admin.layouts.app', ['title' => __('messages.admin.theme_manager')])

@section('content')
<div class="page-header d-print-none mb-3">
    <h2 class="page-title">{{ __('messages.admin.theme_manager') }}</h2>
</div>

<form method="POST" action="{{ route('admin.themes.update') }}" class="card">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row g-4">
            @foreach($themes as $key => $theme)
                <div class="col-md-4">
                    <label class="theme-card form-selectgroup-item h-100 d-flex flex-column border rounded overflow-hidden">
                        <input type="radio" name="active_theme" value="{{ $key }}" class="form-selectgroup-input" @checked(old('active_theme', $settings->active_theme) === $key)>
                        <span class="form-selectgroup-label h-100 p-0">
                            <img src="{{ $theme['thumbnail'] }}" class="w-100" style="height: 160px; object-fit: cover;" alt="{{ $theme['name'] }}">
                            <span class="d-block p-3">
                                <strong>{{ $theme['name'] }}</strong>
                                <small class="d-block text-secondary mt-1">{{ $theme['description'] }}</small>
                                @if($settings->active_theme === $key)
                                    <span class="badge bg-green mt-2">{{ __('messages.admin.active_theme') }}</span>
                                @endif
                            </span>
                        </span>
                    </label>
                </div>
            @endforeach
        </div>

        <hr class="my-4">

        <div class="row g-3">
            <div class="col-md-6 col-lg-4">
                <label class="form-label">{{ __('messages.admin.theme_primary_color') }}</label>
                <input type="color" name="theme_primary_color" class="form-control form-control-color" value="{{ old('theme_primary_color', $settings->theme_primary_color ?? '#206bc4') }}">
            </div>
            <div class="col-md-6 col-lg-4">
                <label class="form-label">{{ __('messages.admin.theme_secondary_color') }}</label>
                <input type="color" name="theme_secondary_color" class="form-control form-control-color" value="{{ old('theme_secondary_color', $settings->theme_secondary_color ?? '#1d4ed8') }}">
            </div>
            <div class="col-md-6 col-lg-4">
                <label class="form-label">{{ __('messages.admin.button_style') }}</label>
                <select name="theme_button_radius" class="form-select">
                    @foreach(['rounded' => __('messages.admin.button_rounded'),'soft' => __('messages.admin.button_soft'),'pill' => __('messages.admin.button_pill')] as $value => $label)
                        <option value="{{ $value }}" @selected(old('theme_button_radius', $settings->theme_button_radius) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.admin.hero_variant') }}</label>
                <select name="theme_hero_variant" class="form-select">
                    @foreach(['classic' => __('messages.admin.hero_classic'),'angled' => __('messages.admin.hero_angled'),'split' => __('messages.admin.hero_split')] as $value => $label)
                        <option value="{{ $value }}" @selected(old('theme_hero_variant', $settings->theme_hero_variant) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.admin.section_spacing') }}</label>
                <select name="theme_spacing" class="form-select">
                    @foreach(['compact' => __('messages.admin.spacing_compact'),'comfortable' => __('messages.admin.spacing_comfortable'),'spacious' => __('messages.admin.spacing_spacious')] as $value => $label)
                        <option value="{{ $value }}" @selected(old('theme_spacing', $settings->theme_spacing) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary">{{ __('messages.buttons.save') }}</button>
    </div>
</form>
@endsection
