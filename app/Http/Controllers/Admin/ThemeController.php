<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Services\ThemeManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function edit()
    {
        return view('admin.themes.edit', [
            'settings' => SiteSetting::current(),
            'themes' => ThemeManager::themes(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'active_theme' => ['required', 'string'],
            'theme_primary_color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'theme_secondary_color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'theme_button_radius' => ['required', 'in:rounded,soft,pill'],
            'theme_hero_variant' => ['required', 'in:classic,angled,split'],
            'theme_spacing' => ['required', 'in:comfortable,compact,spacious'],
        ]);

        if (! ThemeManager::isValidTheme($validated['active_theme'])) {
            return back()->withErrors(['active_theme' => __('messages.admin.invalid_theme')]);
        }

        SiteSetting::current()->update($validated);

        return back()->with('success', __('messages.admin.theme_updated'));
    }
}
