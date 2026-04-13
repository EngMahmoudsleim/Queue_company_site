<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'featured_image',
        'featured_image_path',
        'gallery_images',
        'gallery_images_source',
        'category',
        'project_type',
        'deployment_mode',
        'supported_platforms',
        'industry',
        'tech_stack',
        'features',
        'demo_url',
        'demo_username',
        'demo_password',
        'demo_note',
        'status',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $appends = ['featured_image_url', 'gallery_image_urls'];

    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'supported_platforms' => 'array',
            'tech_stack' => 'array',
            'features' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('is_featured')->orderByDesc('created_at');
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if ($this->featured_image_path) {
            return Storage::url($this->featured_image_path);
        }

        if ($this->featured_image && ! str_starts_with($this->featured_image, 'http://') && ! str_starts_with($this->featured_image, 'https://')) {
            return str_starts_with($this->featured_image, '/')
                ? $this->featured_image
                : Storage::url($this->featured_image);
        }

        return asset('images/project-placeholder.svg');
    }

    public function getGalleryImageUrlsAttribute(): array
    {
        return collect($this->gallery_images ?? [])->map(function ($item) {
            if (! is_string($item) || trim($item) === '') {
                return null;
            }

            if (str_starts_with($item, 'http://') || str_starts_with($item, 'https://')) {
                return null;
            }

            return str_starts_with($item, '/')
                ? $item
                : Storage::url($item);
        })->filter()->values()->all();
    }
}
