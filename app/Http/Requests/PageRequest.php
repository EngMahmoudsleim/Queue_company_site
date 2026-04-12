<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pageId = $this->route('page')?->id;

        return [
            'title_en' => ['required', 'string', 'max:180'],
            'title_ar' => ['nullable', 'string', 'max:180'],
            'slug' => ['required', 'string', 'max:180', Rule::unique('pages', 'slug')->ignore($pageId)],
            'meta_title_en' => ['nullable', 'string', 'max:180'],
            'meta_title_ar' => ['nullable', 'string', 'max:180'],
            'meta_description_en' => ['nullable', 'string', 'max:255'],
            'meta_description_ar' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['published', 'draft'])],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'hero_title_en' => ['nullable', 'string', 'max:255'],
            'hero_title_ar' => ['nullable', 'string', 'max:255'],
            'hero_subtitle_en' => ['nullable', 'string'],
            'hero_subtitle_ar' => ['nullable', 'string'],
            'cta_text_en' => ['nullable', 'string', 'max:120'],
            'cta_text_ar' => ['nullable', 'string', 'max:120'],
            'cta_link' => ['nullable', 'string', 'max:255'],
            'body_en' => ['nullable', 'string'],
            'body_ar' => ['nullable', 'string'],
            'sections' => ['nullable', 'string'],
        ];
    }
}
