<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', config('app.name') . ' — ' . config('brand.tagline') . '. Custom Laravel software, dynamic websites, and product experiences for startups and growing companies.')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ brand_favicon_url() }}" sizes="any">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="@yield('title', config('app.name'))">
    <meta property="og:description" content="@yield('meta_description', config('app.name') . ' — ' . config('brand.tagline') . '. Custom Laravel software, dynamic websites, and product experiences for startups and growing companies.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('meta_image', brand_logo_url())">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', config('app.name'))">
    <meta name="twitter:description" content="@yield('meta_description', config('app.name') . ' — ' . config('brand.tagline') . '. Custom Laravel software, dynamic websites, and product experiences for startups and growing companies.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/frontend.css', 'resources/js/frontend.js'])
    @stack('styles')
</head>
<body class="{{ request()->routeIs('home') ? 'is-home' : 'is-inner' }}">
    <div class="site-wrapper">
        <header class="site-header" data-site-header>
            <div class="container-xl site-header__inner">
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ brand_logo_url() }}" alt="" class="brand__mark" width="36" height="36">
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
                    <a href="{{ route('contact') }}" class="site-nav__cta {{ request()->routeIs('contact') ? 'is-active' : '' }}">Get in touch</a>
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
                        <img src="{{ brand_logo_url() }}" alt="" width="40" height="40">
                        <div>
                            <strong>{{ config('app.name') }}</strong>
                            <p class="site-footer__tagline">{{ config('brand.tagline') }}</p>
                            <p>Custom software, product design, and digital platforms for companies that need clarity, quality, and dependable delivery.</p>
                        </div>
                    </div>
                    <div class="site-footer__col">
                        <p class="site-footer__label">Company</p>
                        <nav class="site-footer__links" aria-label="Footer company">
                            <a href="{{ route('about') }}">About</a>
                            <a href="{{ route('services') }}">Services</a>
                            <a href="{{ route('portfolio') }}">Portfolio</a>
                            <a href="{{ route('blog') }}">Blog</a>
                        </nav>
                    </div>
                    <div class="site-footer__col">
                        <p class="site-footer__label">Contact</p>
                        <ul class="site-footer__contact">
                            <li><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
                            <li><a href="tel:{{ setting('phone_link') }}">{{ setting('phone') }}</a></li>
                            <li>{{ setting('address') }}</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="site-footer__cta">Start a project</a>
                    </div>
                </div>
                <div class="site-footer__bottom">
                    <p class="site-footer__copy">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <p class="site-footer__note">{{ config('brand.tagline') }} · {{ setting('hours') }}</p>
                </div>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
