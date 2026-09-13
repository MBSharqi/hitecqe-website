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

function current_page_bg_key(): ?string
{
    return match (true) {
        request()->routeIs('home') => 'home',
        request()->routeIs('about') => 'about',
        request()->routeIs('services') => 'services',
        request()->routeIs('portfolio') => 'portfolio',
        request()->routeIs('blog', 'blog.show') => 'blog',
        request()->routeIs('contact') => 'contact',
        default => null,
    };
}

function page_bg_has(?string $page = null): bool
{
    $page ??= current_page_bg_key();

    if (! $page) {
        return false;
    }

    return site_image_has("{$page}.bg") || site_image_has('theme.page_bg');
}

function page_bg_url(?string $page = null): ?string
{
    $page ??= current_page_bg_key();

    if (! $page) {
        return null;
    }

    if (site_image_has("{$page}.bg")) {
        return site_image_url("{$page}.bg");
    }

    if (site_image_has('theme.page_bg')) {
        return site_image_url('theme.page_bg');
    }

    return null;
}
