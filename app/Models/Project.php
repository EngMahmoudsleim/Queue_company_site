<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    private const IMAGE_PLACEHOLDER_URL = 'https://placehold.co/1200x500?text=No+Image';

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

    public static function normalizeImageValueForStorage(?string $value): ?string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        if (self::isExternalUrl($value)) {
            return $value;
        }

        $value = ltrim($value, '/');

        if (str_starts_with($value, 'storage/')) {
            return ltrim(substr($value, strlen('storage/')), '/');
        }

        return $value;
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        $candidate = $this->featured_image_path ?: $this->featured_image;

        return $this->resolveImageUrl($candidate);
    }

    public function getGalleryImageUrlsAttribute(): array
    {
        return collect($this->gallery_images ?? [])
            ->map(fn ($item) => $this->resolveImageUrl($item))
            ->all();
    }

    private static function isExternalUrl(string $value): bool
    {
        return str_starts_with($value, 'http://') || str_starts_with($value, 'https://');
    }

    private function resolveImageUrl(?string $value): string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return self::IMAGE_PLACEHOLDER_URL;
        }

        if (self::isExternalUrl($value)) {
            return $value;
        }

        $normalized = ltrim($value, '/');

        if (str_starts_with($normalized, 'storage/')) {
            $relativePath = ltrim(substr($normalized, strlen('storage/')), '/');

            return $this->resolveStoragePath($relativePath);
        }

        if (str_starts_with($normalized, 'images/')) {
            return asset($normalized);
        }

        return $this->resolveStoragePath($normalized);
    }

    private function resolveStoragePath(string $relativePath): string
    {
        $relativePath = ltrim($relativePath, '/');

        if ($relativePath === '') {
            return self::IMAGE_PLACEHOLDER_URL;
        }

        if (!Storage::disk('public')->exists($relativePath)) {
            $this->logMissingImage($relativePath, $relativePath, "storage");
        }

        return Storage::disk('public')->url($relativePath);
    }
    private function logMissingImage(string $originalValue, string $resolvedPath, string $source): void
    {
        Log::warning('Project image could not be resolved', [
            'project_id' => $this->id,
            'project_slug' => $this->slug,
            'source' => $source,
            'original_value' => $originalValue,
            'resolved_path' => $resolvedPath,
            'public_disk_root' => storage_path('app/public'),
            'public_storage_link' => public_path('storage'),
        ]);
    }

}
