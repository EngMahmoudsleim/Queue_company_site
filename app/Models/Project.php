<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','short_description','full_description','featured_image','gallery_images','category','industry','tech_stack','features','demo_url','demo_username','demo_password','status','is_featured','sort_order','meta_title','meta_description',
    ];

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
}
