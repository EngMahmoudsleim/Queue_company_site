<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_id', 64)->index();
            $table->string('event_type', 50)->index();
            $table->string('route_name')->nullable()->index();
            $table->string('url', 500)->nullable();
            $table->string('page_slug')->nullable()->index();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->json('event_data')->nullable();
            $table->timestamps();
            $table->index(['event_type', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
