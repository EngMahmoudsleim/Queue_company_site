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

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $data = $request->validated();
        $data['sections'] = $this->parseJson($data['sections'] ?? null);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $page->update($data);

        return back()->with('success', __('messages.saved_successfully'));
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
