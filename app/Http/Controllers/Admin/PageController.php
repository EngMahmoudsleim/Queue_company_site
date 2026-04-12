<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::orderBy('sort_order')->orderBy('id')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.pages.create', ['page' => new Page()]);
    }

    public function store(PageRequest $request): RedirectResponse
    {
        $data = $this->prepareData($request->validated());
        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', __('messages.admin.page_created'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $page->update($this->prepareData($request->validated()));

        return back()->with('success', __('messages.admin.page_saved'));
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', __('messages.admin.page_deleted'));
    }

    private function prepareData(array $data): array
    {
        $data['sections'] = $this->parseJson($data['sections'] ?? null);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        return $data;
    }

    private function parseJson(?string $json): array
    {
        if (! $json) {
            return [];
        }

        $decoded = json_decode($json, true);

        return is_array($decoded) ? $decoded : [];
    }
}
