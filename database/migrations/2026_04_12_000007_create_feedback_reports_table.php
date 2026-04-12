<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('feedback_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp')->nullable();
            $table->string('type', 30)->default('comment')->index();
            $table->string('subject');
            $table->text('message');
            $table->string('current_url', 500)->nullable();
            $table->string('priority', 20)->default('normal')->index();
            $table->string('screenshot_path')->nullable();
            $table->string('status', 20)->default('new')->index();
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_reports');
    }
};
