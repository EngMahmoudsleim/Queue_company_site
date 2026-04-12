<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', ['settings' => SiteSetting::current()]);
    }

    public function update(SiteSettingRequest $request): RedirectResponse
    {
        $settings = SiteSetting::current();
        $data = $request->validated();

        foreach (['primary_logo_file' => 'primary_logo', 'footer_logo_file' => 'footer_logo', 'favicon_file' => 'favicon'] as $file => $field) {
            if ($request->hasFile($file)) {
                if ($settings->{$field}) {
                    Storage::disk('public')->delete($settings->{$field});
                }
                $data[$field] = $request->file($file)->store('settings', 'public');
            }
            unset($data[$file]);
        }

        $data['social_links'] = array_filter([
            'facebook' => $request->input('social_facebook'),
            'linkedin' => $request->input('social_linkedin'),
            'x' => $request->input('social_x'),
        ]);
        unset($data['social_facebook'], $data['social_linkedin'], $data['social_x']);

        $settings->update($data);

        return back()->with('success', __('messages.saved_successfully'));
    }
}
