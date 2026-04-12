@extends('admin.layouts.app', ['title' => __('messages.admin.settings')])

@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">{{ __('messages.admin.settings') }}</h2></div>
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="card">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label">Company name (EN)</label><input class="form-control" name="company_name_en" value="{{ old('company_name_en', $settings->company_name_en) }}"></div>
            <div class="col-md-6"><label class="form-label">اسم الشركة (AR)</label><input class="form-control" name="company_name_ar" value="{{ old('company_name_ar', $settings->company_name_ar) }}"></div>
            <div class="col-md-6"><label class="form-label">Tagline (EN)</label><input class="form-control" name="company_tagline_en" value="{{ old('company_tagline_en', $settings->company_tagline_en) }}"></div>
            <div class="col-md-6"><label class="form-label">الشعار (AR)</label><input class="form-control" name="company_tagline_ar" value="{{ old('company_tagline_ar', $settings->company_tagline_ar) }}"></div>
            <div class="col-md-4"><label class="form-label">Primary logo</label><input type="file" class="form-control" name="primary_logo_file"></div>
            <div class="col-md-4"><label class="form-label">Footer logo</label><input type="file" class="form-control" name="footer_logo_file"></div>
            <div class="col-md-4"><label class="form-label">Favicon</label><input type="file" class="form-control" name="favicon_file"></div>
            <div class="col-md-4"><label class="form-label">Support email</label><input class="form-control" name="support_email" value="{{ old('support_email', $settings->support_email) }}"></div>
            <div class="col-md-4"><label class="form-label">Contact email</label><input class="form-control" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}"></div>
            <div class="col-md-4"><label class="form-label">Notification email</label><input class="form-control" name="admin_notification_email" value="{{ old('admin_notification_email', $settings->admin_notification_email) }}"></div>
            <div class="col-md-4"><label class="form-label">Phone</label><input class="form-control" name="phone_number" value="{{ old('phone_number', $settings->phone_number) }}"></div>
            <div class="col-md-4"><label class="form-label">WhatsApp</label><input class="form-control" name="whatsapp_number" value="{{ old('whatsapp_number', $settings->whatsapp_number) }}"></div>
            <div class="col-md-4"><label class="form-label">Telegram</label><input class="form-control" name="telegram_link" value="{{ old('telegram_link', $settings->telegram_link) }}"></div>
            <div class="col-md-4"><label class="form-label">Facebook</label><input class="form-control" name="social_facebook" value="{{ old('social_facebook', data_get($settings->social_links, 'facebook')) }}"></div>
            <div class="col-md-4"><label class="form-label">LinkedIn</label><input class="form-control" name="social_linkedin" value="{{ old('social_linkedin', data_get($settings->social_links, 'linkedin')) }}"></div>
            <div class="col-md-4"><label class="form-label">X / Twitter</label><input class="form-control" name="social_x" value="{{ old('social_x', data_get($settings->social_links, 'x')) }}"></div>
            <div class="col-md-6"><label class="form-label">Office address (EN)</label><textarea class="form-control" rows="2" name="office_address_en">{{ old('office_address_en', $settings->office_address_en) }}</textarea></div>
            <div class="col-md-6"><label class="form-label">العنوان (AR)</label><textarea class="form-control" rows="2" name="office_address_ar">{{ old('office_address_ar', $settings->office_address_ar) }}</textarea></div>
            <div class="col-md-6"><label class="form-label">Footer text (EN)</label><input class="form-control" name="footer_text_en" value="{{ old('footer_text_en', $settings->footer_text_en) }}"></div>
            <div class="col-md-6"><label class="form-label">نص التذييل (AR)</label><input class="form-control" name="footer_text_ar" value="{{ old('footer_text_ar', $settings->footer_text_ar) }}"></div>
            <div class="col-md-6"><label class="form-label">Homepage CTA 1 (EN)</label><input class="form-control" name="homepage_primary_cta_label_en" value="{{ old('homepage_primary_cta_label_en', $settings->homepage_primary_cta_label_en) }}"></div>
            <div class="col-md-6"><label class="form-label">الرئيسي (AR)</label><input class="form-control" name="homepage_primary_cta_label_ar" value="{{ old('homepage_primary_cta_label_ar', $settings->homepage_primary_cta_label_ar) }}"></div>
            <div class="col-md-6"><label class="form-label">Homepage CTA 2 (EN)</label><input class="form-control" name="homepage_secondary_cta_label_en" value="{{ old('homepage_secondary_cta_label_en', $settings->homepage_secondary_cta_label_en) }}"></div>
            <div class="col-md-6"><label class="form-label">الثانوي (AR)</label><input class="form-control" name="homepage_secondary_cta_label_ar" value="{{ old('homepage_secondary_cta_label_ar', $settings->homepage_secondary_cta_label_ar) }}"></div>
            <div class="col-md-6"><label class="form-label">CTA 1 link</label><input class="form-control" name="homepage_primary_cta_link" value="{{ old('homepage_primary_cta_link', $settings->homepage_primary_cta_link) }}"></div>
            <div class="col-md-6"><label class="form-label">CTA 2 link</label><input class="form-control" name="homepage_secondary_cta_link" value="{{ old('homepage_secondary_cta_link', $settings->homepage_secondary_cta_link) }}"></div>
        </div>
    </div>
    <div class="card-footer text-end"><button class="btn btn-primary">{{ __('messages.buttons.save') }}</button></div>
</form>
@endsection
