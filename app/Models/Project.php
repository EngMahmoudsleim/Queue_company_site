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
        'industry',
        'tech_stack',
        'features',
        'demo_url',
        'demo_username',
        'demo_password',
        'status',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $appends = ['featured_image_url'];

    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
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

        if ($this->featured_image) {
            if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://') || str_starts_with($this->featured_image, '/')) {
                return $this->featured_image;
            }

            return Storage::url($this->featured_image);
        }

        return 'https://placehold.co/1200x500';
    }
}
