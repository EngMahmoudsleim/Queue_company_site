<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->json('ai_provider_keys')->nullable()->after('social_links');
            $table->string('ai_default_provider')->nullable()->after('ai_provider_keys');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['ai_provider_keys', 'ai_default_provider']);
        });
    }
};
