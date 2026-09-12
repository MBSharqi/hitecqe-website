<?php

use App\Models\SiteImage;
use App\Models\SiteSetting;

function site_image_has(string $slot): bool
{
    return SiteImage::hasUpload($slot);
}

function site_image_url(string $slot): string
{
    return SiteImage::urlFor($slot);
}

function placeholder_image_url(): string
{
    return asset(config('site_images.placeholder'));
}

function brand_logo_url(): string
{
    return site_image_url('brand.logo');
}

function brand_favicon_url(): string
{
    return site_image_url('brand.favicon');
}

function site_settings(): array
{
    return once(fn () => SiteSetting::current()->resolved());
}

function setting(string $key, ?string $default = null): ?string
{
    return site_settings()[$key] ?? $default;
}
