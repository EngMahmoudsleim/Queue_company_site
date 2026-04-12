<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_type', 20)->default('web')->after('category');
            $table->string('deployment_mode', 120)->nullable()->after('project_type');
            $table->json('supported_platforms')->nullable()->after('deployment_mode');
            $table->string('demo_note', 255)->nullable()->after('demo_password');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['project_type', 'deployment_mode', 'supported_platforms', 'demo_note']);
        });
    }
};
