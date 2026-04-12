@extends('admin.layouts.app', ['title' => 'Edit Page'])
@section('content')
<div class="page-header d-print-none mb-3"><h2 class="page-title">Edit Page: {{ $page->slug }}</h2></div>
<form method="POST" action="{{ route('admin.pages.update', $page) }}" class="card">
@csrf @method('PUT')
<div class="card-body">
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Title (EN)</label><input class="form-control" name="title_en" value="{{ old('title_en', $page->title_en) }}"></div>
<div class="col-md-6"><label class="form-label">العنوان (AR)</label><input class="form-control" name="title_ar" value="{{ old('title_ar', $page->title_ar) }}"></div>
<div class="col-md-3"><label class="form-label">Slug</label><input class="form-control" name="slug" value="{{ old('slug', $page->slug) }}"></div>
<div class="col-md-3"><label class="form-label">Status</label><select class="form-select" name="status"><option value="published" @selected(old('status', $page->status)==='published')>Published</option><option value="draft" @selected(old('status', $page->status)==='draft')>Draft</option></select></div>
<div class="col-md-2"><label class="form-label">Sort</label><input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $page->sort_order) }}"></div>
<div class="col-md-4"><label class="form-label">CTA link</label><input class="form-control" name="cta_link" value="{{ old('cta_link', $page->cta_link) }}"></div>
<div class="col-md-6"><label class="form-label">Hero title (EN)</label><input class="form-control" name="hero_title_en" value="{{ old('hero_title_en', $page->hero_title_en) }}"></div>
<div class="col-md-6"><label class="form-label">عنوان البطل (AR)</label><input class="form-control" name="hero_title_ar" value="{{ old('hero_title_ar', $page->hero_title_ar) }}"></div>
<div class="col-md-6"><label class="form-label">Hero subtitle (EN)</label><textarea class="form-control" rows="3" name="hero_subtitle_en">{{ old('hero_subtitle_en', $page->hero_subtitle_en) }}</textarea></div>
<div class="col-md-6"><label class="form-label">العنوان الفرعي (AR)</label><textarea class="form-control" rows="3" name="hero_subtitle_ar">{{ old('hero_subtitle_ar', $page->hero_subtitle_ar) }}</textarea></div>
<div class="col-md-6"><label class="form-label">CTA text (EN)</label><input class="form-control" name="cta_text_en" value="{{ old('cta_text_en', $page->cta_text_en) }}"></div>
<div class="col-md-6"><label class="form-label">نص الزر (AR)</label><input class="form-control" name="cta_text_ar" value="{{ old('cta_text_ar', $page->cta_text_ar) }}"></div>
<div class="col-md-6"><label class="form-label">Body (EN)</label><textarea class="form-control" rows="6" name="body_en">{{ old('body_en', $page->body_en) }}</textarea></div>
<div class="col-md-6"><label class="form-label">المحتوى (AR)</label><textarea class="form-control" rows="6" name="body_ar">{{ old('body_ar', $page->body_ar) }}</textarea></div>
<div class="col-12"><label class="form-label">Sections JSON (for services cards, toggles, extras)</label><textarea class="form-control font-monospace" rows="10" name="sections">{{ old('sections', json_encode($page->sections, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)) }}</textarea></div>
</div>
</div>
<div class="card-footer text-end"><button class="btn btn-primary">Save Page</button></div>
</form>
@endsection
