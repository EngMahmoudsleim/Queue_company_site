<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('active_theme')->default('enterprise')->after('admin_notification_email');
            $table->string('theme_primary_color')->nullable()->after('active_theme');
            $table->string('theme_secondary_color')->nullable()->after('theme_primary_color');
            $table->string('theme_button_radius')->default('rounded')->after('theme_secondary_color');
            $table->string('theme_hero_variant')->default('classic')->after('theme_button_radius');
            $table->string('theme_spacing')->default('comfortable')->after('theme_hero_variant');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'active_theme',
                'theme_primary_color',
                'theme_secondary_color',
                'theme_button_radius',
                'theme_hero_variant',
                'theme_spacing',
            ]);
        });
    }
};
