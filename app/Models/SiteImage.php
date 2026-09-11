<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class SiteImage extends Model
{
    protected $fillable = [
        'slot',
        'path',
    ];

    public static function slots(): array
    {
        $slots = [];

        foreach (config('site_images.pages', []) as $page) {
            foreach ($page['slots'] as $key => $meta) {
                $slots[$key] = $meta;
            }
        }

        return $slots;
    }

    public static function keyed(): Collection
    {
        return once(fn () => static::query()->get()->keyBy('slot'));
    }

    public static function hasUpload(string $slot): bool
    {
        return filled(static::keyed()->get($slot)?->path);
    }

    public static function urlFor(string $slot): string
    {
        $image = static::keyed()->get($slot);

        if (filled($image?->path)) {
            return $image->url();
        }

        $default = config('site_images.defaults')[$slot] ?? null;

        if (filled($default)) {
            return asset($default);
        }

        return placeholder_image_url();
    }

    public function url(): ?string
    {
        if (! $this->path) {
            return null;
        }

        return asset('storage/'.$this->path);
    }

    public function deleteStoredFile(): void
    {
        if ($this->path && Storage::disk('public')->exists($this->path)) {
            Storage::disk('public')->delete($this->path);
        }
    }
}
