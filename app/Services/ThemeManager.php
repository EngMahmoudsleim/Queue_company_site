<?php

namespace App\Services;

class ThemeManager
{
    public const DEFAULT_THEME = 'enterprise';

    public static function themes(): array
    {
        return [
            'enterprise' => [
                'name' => __('messages.themes.enterprise_name'),
                'description' => __('messages.themes.enterprise_description'),
                'thumbnail' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80',
            ],
            'creative' => [
                'name' => __('messages.themes.creative_name'),
                'description' => __('messages.themes.creative_description'),
                'thumbnail' => 'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=900&q=80',
            ],
            'minimal' => [
                'name' => __('messages.themes.minimal_name'),
                'description' => __('messages.themes.minimal_description'),
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
            ],
        ];
    }

    public static function isValidTheme(?string $theme): bool
    {
        return isset(self::themes()[$theme ?? '']);
    }

    public static function resolvedTheme(?string $theme): string
    {
        return self::isValidTheme($theme) ? $theme : self::DEFAULT_THEME;
    }

    public static function cssFile(string $theme): string
    {
        return 'css/themes/'.self::resolvedTheme($theme).'.css';
    }
}
