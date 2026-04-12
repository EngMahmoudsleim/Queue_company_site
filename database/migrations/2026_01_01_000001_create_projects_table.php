<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 280);
            $table->longText('full_description');
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('category');
            $table->string('industry')->nullable();
            $table->json('tech_stack')->nullable();
            $table->json('features')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('demo_username')->nullable();
            $table->string('demo_password')->nullable();
            $table->enum('status', ['active', 'coming_soon', 'private_demo'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
