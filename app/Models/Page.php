<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'meta_title_en',
        'meta_title_ar',
        'meta_description_en',
        'meta_description_ar',
        'status',
        'sort_order',
        'hero_title_en',
        'hero_title_ar',
        'hero_subtitle_en',
        'hero_subtitle_ar',
        'cta_text_en',
        'cta_text_ar',
        'cta_link',
        'body_en',
        'body_ar',
        'sections',
    ];

    protected function casts(): array
    {
        return [
            'sections' => 'array',
            'sort_order' => 'integer',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function t(string $field): ?string
    {
        $locale = app()->getLocale();
        return $this->{$field.'_'.$locale} ?: $this->{$field.'_en'};
    }
}
