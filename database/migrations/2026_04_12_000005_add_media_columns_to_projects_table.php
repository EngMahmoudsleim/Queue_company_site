<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('featured_image_path')->nullable()->after('featured_image');
            $table->string('gallery_images_source')->nullable()->after('gallery_images');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['featured_image_path', 'gallery_images_source']);
        });
    }
};
