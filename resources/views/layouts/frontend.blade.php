<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/frontend.css', 'resources/js/frontend.js'])
</head>
<body class="@yield('body_class') {{ request()->routeIs('home') ? 'is-home' : 'is-inner' }}">
    <div class="site-wrapper">
        <header class="site-header" data-site-header>
            <div class="container-xl site-header__inner">
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ asset('images/logo/hitecqe-mark.svg') }}" alt="" class="brand__mark" width="36" height="36">
                    <span class="brand__name">{{ config('app.name') }}</span>
                </a>
                <button class="nav-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#siteMenu" aria-controls="siteMenu" aria-label="Open menu">
                    <span></span>
                    <span></span>
                </button>
                <nav class="site-nav d-none d-lg-flex" aria-label="Primary">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'is-active' : '' }}">Services</a>
                    <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'is-active' : '' }}">Portfolio</a>
                    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'is-active' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="site-nav__cta {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
                </nav>
            </div>
        </header>

        <div class="offcanvas offcanvas-end site-menu" tabindex="-1" id="siteMenu" aria-labelledby="siteMenuLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="siteMenuLabel">{{ config('app.name') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="site-menu__nav" aria-label="Mobile">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('portfolio') }}">Portfolio</a>
                    <a href="{{ route('blog') }}">Blog</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </nav>
            </div>
        </div>

        <main class="site-main">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container-xl">
                <div class="site-footer__grid">
                    <div class="site-footer__brand">
                        <img src="{{ asset('images/logo/hitecqe-mark.svg') }}" alt="" width="40" height="40">
                        <div>
                            <strong>{{ config('app.name') }}</strong>
                            <p>Software crafted for clarity, speed, and growth.</p>
                        </div>
                    </div>
                    <div class="site-footer__links">
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('portfolio') }}">Portfolio</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>
                <p class="site-footer__copy">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
