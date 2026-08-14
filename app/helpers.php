<?php

use App\Models\SiteImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

function site_images(): Collection
{
    return once(fn () => SiteImage::query()->get()->keyBy('slot'));
}

function site_image_has(string $slot): bool
{
    $image = site_images()->get($slot);

    return is_string($image?->path) && Storage::disk('public')->exists($image->path);
}

function site_image_url(string $slot): string
{
    if (site_image_has($slot)) {
        return asset('storage/'.site_images()->get($slot)->path);
    }

    return asset((string) config('site_images.placeholder'));
}

function site_image_slots(): array
{
    $slots = [];

    foreach (config('site_images.pages', []) as $page) {
        foreach ($page['slots'] as $key => $meta) {
            $slots[$key] = $meta;
        }
    }

    return $slots;
}
