<?php

use App\Models\Project;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Build useful software.');
});

Artisan::command('projects:normalize-images', function () {
    $updated = 0;

    Project::query()->chunkById(100, function ($projects) use (&$updated) {
        foreach ($projects as $project) {
            $featuredImage = Project::normalizeImageValueForStorage($project->featured_image);
            $featuredImagePath = Project::normalizeImageValueForStorage($project->featured_image_path);
            $galleryImages = array_values(array_filter(array_map(
                fn ($value) => Project::normalizeImageValueForStorage($value),
                $project->gallery_images ?? []
            )));

            $dirty = false;
            if ($project->featured_image !== $featuredImage) {
                $project->featured_image = $featuredImage;
                $dirty = true;
            }
            if ($project->featured_image_path !== $featuredImagePath) {
                $project->featured_image_path = $featuredImagePath;
                $dirty = true;
            }
            if (($project->gallery_images ?? []) !== $galleryImages) {
                $project->gallery_images = $galleryImages;
                $dirty = true;
            }

            if ($dirty) {
                $project->save();
                $updated++;
            }
        }
    });

    $this->info("Normalized {$updated} projects.");
})->purpose('Normalize legacy project image paths to canonical relative values.');
