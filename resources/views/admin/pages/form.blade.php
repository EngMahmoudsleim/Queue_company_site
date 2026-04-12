<div class="card-body">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="card-title mb-1">{{ __('messages.admin.form.basic_info') }}</h3>
        </div>
        <div class="col-md-6">
            <label class="form-label required">{{ __('messages.admin.form.title_en') }}</label>
            <input class="form-control" name="title_en" value="{{ old('title_en', $page->title_en) }}" placeholder="About Queue Company">
        </div>
        <div class="col-md-6">
            <label class="form-label">{{ __('messages.admin.form.title_ar') }}</label>
            <input class="form-control" name="title_ar" value="{{ old('title_ar', $page->title_ar) }}" placeholder="عن كيو كومباني">
        </div>
        <div class="col-md-4">
            <label class="form-label required">{{ __('messages.admin.form.slug') }}</label>
            <input class="form-control" name="slug" value="{{ old('slug', $page->slug) }}" placeholder="about">
            <small class="form-hint">{{ __('messages.admin.form.slug_help') }}</small>
        </div>
        <div class="col-md-4">
            <label class="form-label required">{{ __('messages.admin.form.status') }}</label>
            <select class="form-select" name="status">
                @foreach(['published', 'draft'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $page->status ?: 'published') === $status)>
                        {{ __('messages.admin.status.' . $status) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">{{ __('messages.admin.form.sort_order') }}</label>
            <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $page->sort_order ?? 0) }}" min="0">
            <small class="form-hint">{{ __('messages.admin.form.sort_order_help') }}</small>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <div class="col-12"><h3 class="card-title mb-1">{{ __('messages.admin.form.seo') }}</h3></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.meta_title_en') }}</label><input class="form-control" name="meta_title_en" value="{{ old('meta_title_en', $page->meta_title_en) }}"></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.meta_title_ar') }}</label><input class="form-control" name="meta_title_ar" value="{{ old('meta_title_ar', $page->meta_title_ar) }}"></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.meta_description_en') }}</label><textarea class="form-control" rows="3" name="meta_description_en">{{ old('meta_description_en', $page->meta_description_en) }}</textarea></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.meta_description_ar') }}</label><textarea class="form-control" rows="3" name="meta_description_ar">{{ old('meta_description_ar', $page->meta_description_ar) }}</textarea></div>

        <div class="col-12"><hr class="my-2"></div>
        <div class="col-12"><h3 class="card-title mb-1">{{ __('messages.admin.form.hero') }}</h3></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.hero_title_en') }}</label><input class="form-control" name="hero_title_en" value="{{ old('hero_title_en', $page->hero_title_en) }}"></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.hero_title_ar') }}</label><input class="form-control" name="hero_title_ar" value="{{ old('hero_title_ar', $page->hero_title_ar) }}"></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.hero_subtitle_en') }}</label><textarea class="form-control" rows="3" name="hero_subtitle_en">{{ old('hero_subtitle_en', $page->hero_subtitle_en) }}</textarea></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.hero_subtitle_ar') }}</label><textarea class="form-control" rows="3" name="hero_subtitle_ar">{{ old('hero_subtitle_ar', $page->hero_subtitle_ar) }}</textarea></div>

        <div class="col-12"><hr class="my-2"></div>
        <div class="col-12"><h3 class="card-title mb-1">{{ __('messages.admin.form.cta') }}</h3></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.cta_text_en') }}</label><input class="form-control" name="cta_text_en" value="{{ old('cta_text_en', $page->cta_text_en) }}"></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.cta_text_ar') }}</label><input class="form-control" name="cta_text_ar" value="{{ old('cta_text_ar', $page->cta_text_ar) }}"></div>
        <div class="col-12"><label class="form-label">{{ __('messages.admin.form.cta_link') }}</label><input class="form-control" name="cta_link" value="{{ old('cta_link', $page->cta_link) }}" placeholder="/contact"><small class="form-hint">{{ __('messages.admin.form.cta_link_help') }}</small></div>

        <div class="col-12"><hr class="my-2"></div>
        <div class="col-12"><h3 class="card-title mb-1">{{ __('messages.admin.form.body') }}</h3></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.body_en') }}</label><textarea class="form-control" rows="6" name="body_en">{{ old('body_en', $page->body_en) }}</textarea></div>
        <div class="col-md-6"><label class="form-label">{{ __('messages.admin.form.body_ar') }}</label><textarea class="form-control" rows="6" name="body_ar">{{ old('body_ar', $page->body_ar) }}</textarea></div>

        <div class="col-12"><hr class="my-2"></div>
        <div class="col-12"><h3 class="card-title mb-1">{{ __('messages.admin.form.sections') }}</h3></div>
        <div class="col-12">
            <label class="form-label">{{ __('messages.admin.form.sections_json') }}</label>
            <textarea class="form-control font-monospace" rows="10" name="sections" placeholder="{{ __('messages.admin.form.sections_placeholder') }}">{{ old('sections', json_encode($page->sections ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) }}</textarea>
            <small class="form-hint">{{ __('messages.admin.form.sections_help') }}</small>
        </div>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">{{ __('messages.buttons.cancel') }}</a>
    <button class="btn btn-primary">{{ __('messages.buttons.save') }}</button>
</div>
