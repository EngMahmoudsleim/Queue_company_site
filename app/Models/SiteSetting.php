<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name_en',
        'company_name_ar',
        'company_tagline_en',
        'company_tagline_ar',
        'company_description_en',
        'company_description_ar',
        'primary_logo',
        'footer_logo',
        'favicon',
        'support_email',
        'contact_email',
        'phone_number',
        'whatsapp_number',
        'telegram_link',
        'office_address_en',
        'office_address_ar',
        'social_links',
        'ai_provider_keys',
        'ai_default_provider',
        'footer_text_en',
        'footer_text_ar',
        'homepage_primary_cta_label_en',
        'homepage_primary_cta_label_ar',
        'homepage_primary_cta_link',
        'homepage_secondary_cta_label_en',
        'homepage_secondary_cta_label_ar',
        'homepage_secondary_cta_link',
        'default_seo_title_en',
        'default_seo_title_ar',
        'default_seo_description_en',
        'default_seo_description_ar',
        'admin_notification_email',
        'active_theme',
        'theme_primary_color',
        'theme_secondary_color',
        'theme_button_radius',
        'theme_hero_variant',
        'theme_spacing',
    ];

    protected function casts(): array
    {
        return [
            'social_links' => 'array',
            'ai_provider_keys' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'company_name_en' => 'Queue Company',
            'company_name_ar' => 'كيو كومباني',
            'company_tagline_en' => 'Trusted Product Engineering Partner',
            'company_tagline_ar' => 'شريك موثوق في هندسة المنتجات',
            'company_description_en' => 'We build custom software, ERP, POS, and SaaS products with enterprise-grade quality and practical delivery timelines.',
            'company_description_ar' => 'نطوّر حلول برمجية مخصصة وأنظمة ERP وPOS ومنصات SaaS بجودة عالية وجدول تسليم عملي.',
            'support_email' => 'support@queue-company.test',
            'contact_email' => 'contact@queue-company.test',
            'phone_number' => '+1 (555) 320-4400',
            'office_address_en' => '250 Innovation Ave, Austin, TX',
            'office_address_ar' => '250 شارع الابتكار، أوستن، تكساس',
            'footer_text_en' => 'All rights reserved.',
            'footer_text_ar' => 'جميع الحقوق محفوظة.',
            'homepage_primary_cta_label_en' => 'Explore Projects',
            'homepage_primary_cta_label_ar' => 'استكشف المشاريع',
            'homepage_primary_cta_link' => '/projects',
            'homepage_secondary_cta_label_en' => 'Book Consultation',
            'homepage_secondary_cta_label_ar' => 'احجز استشارة',
            'homepage_secondary_cta_link' => '/contact',
            'default_seo_title_en' => 'Queue Company | Software Solutions',
            'default_seo_title_ar' => 'كيو كومباني | حلول برمجية',
            'default_seo_description_en' => 'Queue Company builds ERP, POS, SaaS, and custom software products.',
            'default_seo_description_ar' => 'كيو كومباني تطوّر حلول ERP وPOS ومنصات SaaS وبرمجيات مخصصة.',
            'admin_notification_email' => 'admin@queue-company.test',
            'ai_provider_keys' => [
                'grok' => null,
                'gemini' => null,
                'openrouter' => null,
                'huggingface' => null,
            ],
            'ai_default_provider' => 'grok',
            'active_theme' => 'enterprise',
            'theme_primary_color' => '#206bc4',
            'theme_secondary_color' => '#1d4ed8',
            'theme_button_radius' => 'rounded',
            'theme_hero_variant' => 'classic',
            'theme_spacing' => 'comfortable',
        ]);
    }

    public function t(string $field): ?string
    {
        $locale = app()->getLocale();
        $localized = $field.'_'.$locale;

        return $this->{$localized} ?: $this->{$field.'_en'};
    }
}
