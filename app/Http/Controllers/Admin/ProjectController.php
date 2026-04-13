<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::ordered()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.projects.create', ['project' => new Project()]);
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        Project::create($this->preparedData($request));

        return redirect()->route('admin.projects.index')->with('success', __('messages.created_successfully'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($this->preparedData($request, $project));

        return redirect()->route('admin.projects.index')->with('success', __('messages.saved_successfully'));
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->featured_image_path) {
            Storage::disk('public')->delete($project->featured_image_path);
        }
        if (is_array($project->gallery_images) && count($project->gallery_images)) {
            Storage::disk('public')->delete($project->gallery_images);
        }

        $project->delete();

        return back()->with('success', __('messages.deleted_successfully'));
    }

    private function preparedData(ProjectRequest $request, ?Project $project = null): array
    {
        $data = $request->validated();
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['featured_image'] = null;

        if ($request->hasFile('featured_image_file')) {
            if ($project?->featured_image_path) {
                Storage::disk('public')->delete($project->featured_image_path);
            }
            $data['featured_image_path'] = $request->file('featured_image_file')->store('projects', 'public');
        }
        if ($request->hasFile('gallery_images_files')) {
            if (is_array($project?->gallery_images) && count($project->gallery_images)) {
                Storage::disk('public')->delete($project->gallery_images);
            }

            $data['gallery_images'] = collect($request->file('gallery_images_files'))
                ->map(fn ($file) => $file->store('projects/gallery', 'public'))
                ->values()
                ->all();
        }

        foreach (['features', 'tech_stack', 'supported_platforms'] as $field) {
            $data[$field] = isset($data[$field]) && trim((string) $data[$field]) !== ''
                ? array_values(array_filter(array_map('trim', explode(PHP_EOL, $data[$field]))))
                : [];
        }

        unset($data['featured_image_file'], $data['gallery_images_files']);

        return $data;
    }
}
