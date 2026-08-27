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
        abort_unless(in_array($page, ['home', 'about', 'services'], true), 404);

        return view('backend.content.'.$page, [
            'page' => $page,
            'content' => PageContent::page($page),
        ]);
    }

    public function update(UpdatePageContentRequest $request, string $page): RedirectResponse
    {
        abort_unless(in_array($page, ['home', 'about', 'services'], true), 404);

        $sections = $request->validated()['sections'] ?? [];

        foreach ($sections as $section => $data) {
            PageContent::putSection($page, $section, $this->normalizeSection($page, $section, $data));
        }

        return back()->with('success', ucfirst($page).' content saved successfully.');
    }

    private function normalizeSection(string $page, string $section, array $data): array
    {
        if ($page === 'home' && $section === 'hero') {
            $slides = [];
            foreach ($data['slides'] ?? [] as $slide) {
                if (trim((string) ($slide['title'] ?? '')) === '' && trim((string) ($slide['accent'] ?? '')) === '') {
                    continue;
                }
                $slides[] = [
                    'title' => trim((string) ($slide['title'] ?? '')),
                    'accent' => trim((string) ($slide['accent'] ?? '')),
                    'lead' => trim((string) ($slide['lead'] ?? '')),
                ];
            }

            $trust = array_values(array_filter(array_map(
                fn ($item) => trim((string) $item),
                $data['trust'] ?? []
            )));

            return [
                'slides' => $slides ?: (config('content.home.hero.slides') ?? []),
                'trust' => $trust ?: (config('content.home.hero.trust') ?? []),
            ];
        }

        if ($page === 'home' && $section === 'stats') {
            $stats = [];
            foreach ($data['items'] ?? [] as $item) {
                if (trim((string) ($item['label'] ?? '')) === '') {
                    continue;
                }
                $stats[] = [
                    'value' => (int) ($item['value'] ?? 0),
                    'suffix' => trim((string) ($item['suffix'] ?? '')),
                    'label' => trim((string) ($item['label'] ?? '')),
                ];
            }

            return $stats ?: (config('content.home.stats') ?? []);
        }

        if ($page === 'home' && $section === 'advantages') {
            $cards = [];
            foreach ($data['cards'] ?? [] as $card) {
                if (trim((string) ($card['title'] ?? '')) === '') {
                    continue;
                }
                $cards[] = [
                    'title' => trim((string) ($card['title'] ?? '')),
                    'body' => trim((string) ($card['body'] ?? '')),
                ];
            }

            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'cards' => $cards ?: (config('content.home.advantages.cards') ?? []),
            ];
        }

        if (in_array($section, ['beliefs', 'offerings'], true)) {
            $items = [];
            foreach ($data['items'] ?? [] as $item) {
                if (trim((string) ($item['title'] ?? '')) === '') {
                    continue;
                }
                $items[] = [
                    'title' => trim((string) ($item['title'] ?? '')),
                    'body' => trim((string) ($item['body'] ?? '')),
                ];
            }

            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'items' => $items,
            ];
        }

        if (in_array($section, ['engineering', 'design', 'focus'], true)) {
            $points = array_values(array_filter(array_map(
                fn ($item) => trim((string) $item),
                $data['points'] ?? []
            )));

            $normalized = [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'points' => $points,
            ];

            if ($section === 'focus' || array_key_exists('paragraphs', $data)) {
                // keep structure
            }

            return $normalized;
        }

        if ($section === 'story') {
            $paragraphs = array_values(array_filter(array_map(
                fn ($item) => trim((string) $item),
                $data['paragraphs'] ?? []
            )));

            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'paragraphs' => $paragraphs,
            ];
        }

        if ($section === 'process') {
            $steps = [];
            foreach ($data['steps'] ?? [] as $step) {
                if (trim((string) ($step['title'] ?? '')) === '') {
                    continue;
                }
                $steps[] = [
                    'title' => trim((string) ($step['title'] ?? '')),
                    'body' => trim((string) ($step['body'] ?? '')),
                ];
            }

            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'steps' => $steps,
            ];
        }

        return [
            'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
            'title' => trim((string) ($data['title'] ?? '')),
            'lead' => trim((string) ($data['lead'] ?? '')),
        ];
    }
}
