<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $projectId = $this->route('project')?->id;

        return [
            'title' => ['required', 'string', 'max:160'],
            'slug' => ['required', 'string', 'max:180', Rule::unique('projects', 'slug')->ignore($projectId)],
            'short_description' => ['required', 'string', 'max:280'],
            'full_description' => ['required', 'string', 'min:40'],
            'featured_image' => ['nullable', 'url', 'max:255'],
            'category' => ['required', 'string', 'max:80'],
            'industry' => ['nullable', 'string', 'max:80'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'demo_username' => ['nullable', 'string', 'max:120'],
            'demo_password' => ['nullable', 'string', 'max:120'],
            'status' => ['required', Rule::in(['active', 'coming_soon', 'private_demo'])],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:180'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'features' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
            'gallery_images' => ['nullable', 'string'],
        ];
    }
}
