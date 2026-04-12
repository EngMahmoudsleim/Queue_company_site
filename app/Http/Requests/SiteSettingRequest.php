<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name_en' => ['required', 'string', 'max:120'],
            'company_name_ar' => ['nullable', 'string', 'max:120'],
            'company_tagline_en' => ['nullable', 'string', 'max:180'],
            'company_tagline_ar' => ['nullable', 'string', 'max:180'],
            'company_description_en' => ['nullable', 'string'],
            'company_description_ar' => ['nullable', 'string'],
            'primary_logo_file' => ['nullable', 'image', 'max:2048'],
            'footer_logo_file' => ['nullable', 'image', 'max:2048'],
            'favicon_file' => ['nullable', 'image', 'max:1024'],
            'support_email' => ['nullable', 'email', 'max:120'],
            'contact_email' => ['nullable', 'email', 'max:120'],
            'phone_number' => ['nullable', 'string', 'max:60'],
            'whatsapp_number' => ['nullable', 'string', 'max:60'],
            'telegram_link' => ['nullable', 'string', 'max:180'],
            'office_address_en' => ['nullable', 'string'],
            'office_address_ar' => ['nullable', 'string'],
            'social_facebook' => ['nullable', 'url', 'max:255'],
            'social_linkedin' => ['nullable', 'url', 'max:255'],
            'social_x' => ['nullable', 'url', 'max:255'],
            'footer_text_en' => ['nullable', 'string', 'max:255'],
            'footer_text_ar' => ['nullable', 'string', 'max:255'],
            'homepage_primary_cta_label_en' => ['nullable', 'string', 'max:90'],
            'homepage_primary_cta_label_ar' => ['nullable', 'string', 'max:90'],
            'homepage_primary_cta_link' => ['nullable', 'string', 'max:255'],
            'homepage_secondary_cta_label_en' => ['nullable', 'string', 'max:90'],
            'homepage_secondary_cta_label_ar' => ['nullable', 'string', 'max:90'],
            'homepage_secondary_cta_link' => ['nullable', 'string', 'max:255'],
            'default_seo_title_en' => ['nullable', 'string', 'max:180'],
            'default_seo_title_ar' => ['nullable', 'string', 'max:180'],
            'default_seo_description_en' => ['nullable', 'string', 'max:255'],
            'default_seo_description_ar' => ['nullable', 'string', 'max:255'],
            'admin_notification_email' => ['nullable', 'email', 'max:120'],
        ];
    }
}
