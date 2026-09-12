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
            <a href="{{ route('home') }}" class="brand">
                <img src="{{ brand_logo_url() }}" alt="" class="brand__mark" width="48" height="48">
                <span class="brand__name">{{ config('app.name') }}</span>
            </a>
            <nav class="site-nav" aria-label="Primary">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'is-active' : '' }}">Services</a>
                <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'is-active' : '' }}">Portfolio</a>
                <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'is-active' : '' }}">Blog</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
            </nav>
            <a href="{{ route('contact') }}" class="site-nav__cta">Get Started</a>
            <button class="nav-toggle" type="button" data-nav-open aria-controls="siteMenu" aria-expanded="false" aria-label="Open menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 12h16"></path>
                    <path d="M4 18h16"></path>
                    <path d="M4 6h16"></path>
                </svg>
            </button>
        </header>

        <div class="site-menu" id="siteMenu" data-site-menu hidden>
            <button type="button" class="site-menu__close" data-nav-close aria-label="Close menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
            <nav class="site-menu__nav" aria-label="Mobile">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <a href="{{ route('contact') }}" class="site-menu__cta">Get Started</a>
        </div>

        <main class="site-main">
            @yield('content')
        </main>

        @php
            $footerPhone = setting('phone');
            $footerPhoneLink = preg_replace('/[^\d]/', '', (string) setting('phone_link'));
            $footerEmail = setting('email');
            $footerFacebook = (string) (config('content.settings.facebook') ?? '');
            $footerSocials = array_filter([
                'facebook' => $footerFacebook,
                'whatsapp' => $footerPhoneLink ? 'https://wa.me/'.$footerPhoneLink : null,
                'twitter' => config('content.settings.twitter') ?: null,
                'github' => config('content.settings.github') ?: null,
                'linkedin' => config('content.settings.linkedin') ?: null,
                'instagram' => config('content.settings.instagram') ?: null,
            ]);
        @endphp
        <div
            class="site-footer-shell{{ site_image_has('theme.dark_net') ? ' has-theme-bg' : '' }}"
            @if (site_image_has('theme.dark_net'))
                style="--footer-theme-bg: url('{{ site_image_url('theme.dark_net') }}')"
            @endif
        >
            <footer class="site-footer">
                <div class="site-footer__grid">
                    <div class="site-footer__brand">
                        <a href="{{ route('home') }}" class="site-footer__logo">
                            <img src="{{ brand_logo_url() }}" alt="{{ config('app.name') }}" width="96" height="96">
                        </a>
                        <p class="site-footer__about">
                            {{ config('app.name') }} empowers businesses through focused Laravel engineering, product design, and reliable digital platforms.
                        </p>
                        <div class="site-footer__meta">
                            @if ($footerPhone)
                                <p>
                                    <span>WhatsApp / Call:</span>
                                    <a class="is-phone" href="{{ $footerPhoneLink ? 'https://wa.me/'.$footerPhoneLink : 'tel:'.setting('phone_link') }}">{{ $footerPhone }}</a>
                                </p>
                            @endif
                            @if ($footerEmail)
                                <p>
                                    <span>Email:</span>
                                    <a class="is-email" href="mailto:{{ $footerEmail }}">{{ $footerEmail }}</a>
                                </p>
                            @endif
                            @if ($footerFacebook)
                                <p>
                                    <span>Facebook:</span>
                                    <a class="is-facebook" href="{{ $footerFacebook }}" target="_blank" rel="noreferrer">{{ config('app.name') }} Facebook</a>
                                </p>
                            @endif
                        </div>
                        @if ($footerSocials)
                            <div class="site-footer__socials" aria-label="Social links">
                                @if (! empty($footerSocials['facebook']))
                                    <a href="{{ $footerSocials['facebook'] }}" target="_blank" rel="noreferrer" title="Facebook" class="site-footer__social site-footer__social--facebook">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                @endif
                                @if (! empty($footerSocials['whatsapp']))
                                    <a href="{{ $footerSocials['whatsapp'] }}" target="_blank" rel="noreferrer" title="WhatsApp" class="site-footer__social site-footer__social--whatsapp">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.99c-.002 5.45-4.437 9.887-9.885 9.887m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    </a>
                                @endif
                                @if (! empty($footerSocials['twitter']))
                                    <a href="{{ $footerSocials['twitter'] }}" target="_blank" rel="noreferrer" title="Twitter / X" class="site-footer__social">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                                    </a>
                                @endif
                                @if (! empty($footerSocials['github']))
                                    <a href="{{ $footerSocials['github'] }}" target="_blank" rel="noreferrer" title="GitHub" class="site-footer__social">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                                    </a>
                                @endif
                                @if (! empty($footerSocials['linkedin']))
                                    <a href="{{ $footerSocials['linkedin'] }}" target="_blank" rel="noreferrer" title="LinkedIn" class="site-footer__social">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                    </a>
                                @endif
                                @if (! empty($footerSocials['instagram']))
                                    <a href="{{ $footerSocials['instagram'] }}" target="_blank" rel="noreferrer" title="Instagram" class="site-footer__social">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="site-footer__columns">
                        <div class="site-footer__col">
                            <h3 class="site-footer__label">Solutions</h3>
                            <nav class="site-footer__links" aria-label="Footer solutions">
                                <a href="{{ route('services') }}">Web Applications</a>
                                <a href="{{ route('services') }}">Product &amp; UI Design</a>
                                <a href="{{ route('services') }}">Company Websites</a>
                                <a href="{{ route('services') }}">Maintenance</a>
                            </nav>
                        </div>
                        <div class="site-footer__col">
                            <h3 class="site-footer__label">Explore</h3>
                            <nav class="site-footer__links" aria-label="Footer explore">
                                <a href="{{ route('home') }}">Home</a>
                                <a href="{{ route('about') }}">About Us</a>
                                <a href="{{ route('portfolio') }}">Work Portfolio</a>
                                <a href="{{ route('blog') }}">Tech Blog</a>
                            </nav>
                        </div>
                        <div class="site-footer__col">
                            <h3 class="site-footer__label">Company</h3>
                            <nav class="site-footer__links" aria-label="Footer company">
                                <a href="{{ route('contact') }}" class="site-footer__accent">Contact Us →</a>
                                <a href="{{ route('about') }}">About</a>
                                <span class="site-footer__muted">{{ setting('address') }}</span>
                                <span class="site-footer__muted">{{ setting('hours') }}</span>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="site-footer__bottom">
                    <p class="site-footer__copy">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <div class="site-footer__legal">
                        <a href="{{ route('contact') }}">Privacy Policy</a>
                        <a href="{{ route('contact') }}">Terms of Service</a>
                        <a href="{{ route('contact') }}">Security</a>
                    </div>
                </div>

                <div class="site-footer__signature" aria-hidden="true">
                    <div class="site-footer__signature-line">
                        <span></span>
                        <i></i>
                        <span></span>
                    </div>
                    <p class="site-footer__signature-text">Fixing Problems. Creating Possibilities</p>
                </div>
            </footer>
        </div>
    </div>

    @php
        $whatsappDigits = preg_replace('/[^\d]/', '', (string) setting('phone_link'));
        $whatsappUrl = $whatsappDigits
            ? 'https://wa.me/'.$whatsappDigits.'?text='.rawurlencode('Hi Hitecqe — I would like to discuss a project.')
            : null;
    @endphp
    @if ($whatsappUrl)
        <div class="wa-float" data-wa-float>
            <div class="wa-float__prompt" data-wa-prompt hidden>
                <button type="button" class="wa-float__prompt-close" data-wa-prompt-close aria-label="Dismiss">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
                <p class="wa-float__prompt-eyebrow">Hitecqe desk</p>
                <p class="wa-float__prompt-text">Need a quick answer? Message us on WhatsApp.</p>
                <a href="{{ $whatsappUrl }}" class="wa-float__prompt-link" target="_blank" rel="noopener noreferrer">
                    Start chat
                    <span aria-hidden="true">→</span>
                </a>
            </div>
            <a
                href="{{ $whatsappUrl }}"
                class="wa-float__btn"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Chat on WhatsApp"
            >
                <span class="wa-float__pulse" aria-hidden="true"></span>
                <span class="wa-float__icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.99c-.002 5.45-4.437 9.887-9.885 9.887m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </span>
                <span class="wa-float__label">
                    <strong>WhatsApp</strong>
                    <small>Reply in minutes</small>
                </span>
            </a>
        </div>
    @endif

    @stack('scripts')
</body>
</html>
