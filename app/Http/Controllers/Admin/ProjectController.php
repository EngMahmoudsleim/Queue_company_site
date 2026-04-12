<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

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
        Project::create($this->preparedData($request->validated()));

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($this->preparedData($request->validated()));

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }

    private function preparedData(array $data): array
    {
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        foreach (['features', 'tech_stack', 'gallery_images'] as $field) {
            $data[$field] = isset($data[$field]) && trim((string) $data[$field]) !== ''
                ? array_values(array_filter(array_map('trim', explode(PHP_EOL, $data[$field]))))
                : [];
        }

        return $data;
    }
}
