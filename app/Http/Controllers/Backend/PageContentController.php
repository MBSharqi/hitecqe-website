<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdatePageContentRequest;
use App\Models\PageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageContentController extends Controller
{
    public function edit(string $page): View
    {
        abort_unless(in_array($page, PageContent::pages(), true), 404);

        return view('backend.content.'.$page, [
            'page' => $page,
            'content' => PageContent::page($page),
        ]);
    }

    public function update(UpdatePageContentRequest $request, string $page): RedirectResponse
    {
        abort_unless(in_array($page, PageContent::pages(), true), 404);

        foreach ($request->validated('sections', []) as $section => $data) {
            PageContent::putSection(
                $page,
                $section,
                PageContent::normalizeSection($page, $section, $data)
            );
        }

        return back()->with('success', ucfirst($page).' content saved successfully.');
    }
}
