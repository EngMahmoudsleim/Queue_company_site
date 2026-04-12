<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name_en')->nullable();
            $table->string('company_name_ar')->nullable();
            $table->string('company_tagline_en')->nullable();
            $table->string('company_tagline_ar')->nullable();
            $table->text('company_description_en')->nullable();
            $table->text('company_description_ar')->nullable();
            $table->string('primary_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('support_email')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('telegram_link')->nullable();
            $table->text('office_address_en')->nullable();
            $table->text('office_address_ar')->nullable();
            $table->json('social_links')->nullable();
            $table->text('footer_text_en')->nullable();
            $table->text('footer_text_ar')->nullable();
            $table->string('homepage_primary_cta_label_en')->nullable();
            $table->string('homepage_primary_cta_label_ar')->nullable();
            $table->string('homepage_primary_cta_link')->nullable();
            $table->string('homepage_secondary_cta_label_en')->nullable();
            $table->string('homepage_secondary_cta_label_ar')->nullable();
            $table->string('homepage_secondary_cta_link')->nullable();
            $table->string('default_seo_title_en')->nullable();
            $table->string('default_seo_title_ar')->nullable();
            $table->text('default_seo_description_en')->nullable();
            $table->text('default_seo_description_ar')->nullable();
            $table->string('admin_notification_email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
