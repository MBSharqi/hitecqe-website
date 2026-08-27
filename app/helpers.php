<?php

use App\Models\PageContent;
use App\Models\SiteImage;
use App\Models\SiteSetting;
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

    return placeholder_image_url();
}

function placeholder_image_url(): string
{
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

function site_settings(): array
{
    return once(fn () => SiteSetting::current()->resolved());
}

function setting(string $key, ?string $default = null): ?string
{
    $value = site_settings()[$key] ?? $default;

    return is_string($value) ? $value : $default;
}

function page_content(string $page, ?string $section = null): array
{
    if ($section === null) {
        return PageContent::page($page);
    }

    return PageContent::getSection($page, $section);
}
