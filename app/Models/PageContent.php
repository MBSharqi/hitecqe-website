<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class PageContent extends Model
{
    protected $fillable = [
        'page',
        'section',
        'data',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public static function pages(): array
    {
        return array_values(array_filter(
            array_keys(config('content', [])),
            fn (string $key) => $key !== 'settings'
        ));
    }

    public static function putSection(string $page, string $section, array $data): self
    {
        return static::query()->updateOrCreate(
            ['page' => $page, 'section' => $section],
            ['data' => $data]
        );
    }

    public static function page(string $page): array
    {
        $defaults = config("content.{$page}", []);

        if (! is_array($defaults)) {
            return [];
        }

        $records = static::query()
            ->where('page', $page)
            ->get()
            ->keyBy('section');

        $sections = [];

        foreach ($defaults as $section => $sectionDefaults) {
            $record = $records->get($section);
            $sections[$section] = $record
                ? static::mergeDefaults(
                    is_array($sectionDefaults) ? $sectionDefaults : [],
                    $record->data ?? []
                )
                : (is_array($sectionDefaults) ? $sectionDefaults : []);
        }

        return $sections;
    }

    public static function normalizeSection(string $page, string $section, array $data): array
    {
        if ($page === 'home' && $section === 'hero') {
            return [
                'slides' => static::normalizeRows($data['slides'] ?? [], ['title', 'accent'], [
                    'title' => '',
                    'accent' => '',
                    'lead' => '',
                ]),
                'trust' => static::normalizeStrings($data['trust'] ?? []),
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

            return $stats;
        }

        if ($page === 'home' && $section === 'advantages') {
            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'cards' => static::normalizeRows($data['cards'] ?? [], ['title'], [
                    'title' => '',
                    'body' => '',
                ]),
            ];
        }

        if (in_array($section, ['beliefs', 'offerings'], true)) {
            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'items' => static::normalizeRows($data['items'] ?? [], ['title'], [
                    'title' => '',
                    'body' => '',
                ]),
            ];
        }

        if (in_array($section, ['engineering', 'design', 'focus'], true)) {
            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'points' => static::normalizeStrings($data['points'] ?? []),
            ];
        }

        if ($section === 'story') {
            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'paragraphs' => static::normalizeStrings($data['paragraphs'] ?? []),
            ];
        }

        if ($section === 'process') {
            return [
                'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
                'title' => trim((string) ($data['title'] ?? '')),
                'lead' => trim((string) ($data['lead'] ?? '')),
                'steps' => static::normalizeRows($data['steps'] ?? [], ['title'], [
                    'title' => '',
                    'body' => '',
                ]),
            ];
        }

        return [
            'eyebrow' => trim((string) ($data['eyebrow'] ?? '')),
            'title' => trim((string) ($data['title'] ?? '')),
            'lead' => trim((string) ($data['lead'] ?? '')),
        ];
    }

    public static function ensureCount(array $items, int $min, array|string $blank): array
    {
        $items = array_values($items);

        while (count($items) < $min) {
            $items[] = $blank;
        }

        return $items;
    }

    private static function normalizeStrings(array $items): array
    {
        return array_values(array_filter(array_map(
            fn ($item) => trim((string) $item),
            $items
        )));
    }

    private static function normalizeRows(array $rows, array $required, array $fields): array
    {
        $normalized = [];

        foreach ($rows as $row) {
            $item = [];

            foreach ($fields as $key => $default) {
                $item[$key] = trim((string) ($row[$key] ?? $default));
            }

            $empty = true;

            foreach ($required as $key) {
                if ($item[$key] !== '') {
                    $empty = false;
                    break;
                }
            }

            if ($empty) {
                continue;
            }

            $normalized[] = $item;
        }

        return $normalized;
    }

    private static function mergeDefaults(array $defaults, array $stored): array
    {
        if ($defaults === [] || Arr::isList($defaults)) {
            return $stored;
        }

        foreach ($defaults as $key => $value) {
            if (! array_key_exists($key, $stored)) {
                $stored[$key] = $value;
                continue;
            }

            if (is_array($value) && Arr::isAssoc($value) && is_array($stored[$key])) {
                $stored[$key] = static::mergeDefaults($value, $stored[$key]);
            }
        }

        return $stored;
    }
}
