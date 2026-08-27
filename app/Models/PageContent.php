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

    public static function getSection(string $page, string $section): array
    {
        $defaults = config("content.{$page}.{$section}", []);
        $record = static::query()
            ->where('page', $page)
            ->where('section', $section)
            ->first();

        if (! $record) {
            return is_array($defaults) ? $defaults : [];
        }

        return static::mergeDefaults(
            is_array($defaults) ? $defaults : [],
            is_array($record->data) ? $record->data : []
        );
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
        $sections = [];

        foreach (array_keys($defaults) as $section) {
            $sections[$section] = static::getSection($page, $section);
        }

        return $sections;
    }

    private static function mergeDefaults(array $defaults, array $stored): array
    {
        if ($defaults === []) {
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
