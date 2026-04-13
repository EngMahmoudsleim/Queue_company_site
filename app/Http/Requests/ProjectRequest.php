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
            'featured_image_file' => ['nullable', 'image', 'max:4096'],
            'gallery_images_files' => ['nullable', 'array'],
            'gallery_images_files.*' => ['image', 'max:4096'],
            'category' => ['required', 'string', 'max:80'],
            'project_type' => ['required', Rule::in(['web', 'saas', 'desktop', 'mobile', 'offline'])],
            'deployment_mode' => ['nullable', 'string', 'max:120'],
            'supported_platforms' => ['nullable', 'string'],
            'industry' => ['nullable', 'string', 'max:80'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'demo_username' => ['nullable', 'string', 'max:120'],
            'demo_password' => ['nullable', 'string', 'max:120'],
            'demo_note' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'coming_soon', 'private_demo'])],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:180'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'features' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
        ];
    }
}
