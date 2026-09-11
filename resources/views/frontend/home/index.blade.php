@extends('layouts.frontend')

@section('title', config('app.name') . ' — ' . config('brand.tagline'))
@section('meta_description', config('app.name') . ' — ' . config('brand.tagline') . '. We design and build Laravel web applications, product interfaces, and company websites for startups and growing businesses.')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@push('scripts')
    @vite('resources/js/home.js')
@endpush

@section('content')
    @php
        $homeHero = $content['hero'] ?? [];
        $homeStats = $content['stats'] ?? [];
        $homeAdvantages = $content['advantages'] ?? [];
    @endphp
    <div class="home-page">
        <section class="hero hero--corporate" aria-label="Introduction" data-hero-slider>
            <div class="hero__backdrop" aria-hidden="true">
                <span class="hero__orb hero__orb--one"></span>
                <span class="hero__orb hero__orb--two"></span>
                <span class="hero__grid-lines"></span>
            </div>
            <div class="container-xl hero__grid">
                <div class="hero_copy">
                    <p class="hero__eyebrow" data-hero-item>
                        <span class="hero__eyebrow-dot"></span>
                        {{ config('app.name') }}
                    </p>
                    <p class="hero__tagline" data-hero-item>{{ config('brand.tagline') }}</p>
                    <div class="hero__slides" data-hero-slides>
                        @foreach (($homeHero['slides'] ?? []) as $index => $slide)
                            <div class="hero__slide {{ $index === 0 ? 'is-active' : '' }}" data-hero-slide>
                                <h1 class="hero__title">
                                    {{ $slide['title'] ?? '' }}
                                    @if (! empty($slide['accent']))
                                        <span class="hero__accent">{{ $slide['accent'] }}</span>
                                    @endif
                                </h1>
                                <p class="hero__lead">{{ $slide['lead'] ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="hero__actions" data-hero-item>
                        <a href="{{ route('contact') }}" class="btn-signal btn-signal--shine">Start a project</a>
                        <a href="{{ route('portfolio') }}" class="btn-quiet">View our work</a>
                    </div>
                    <div class="hero__slider-nav" data-hero-item>
                        <div class="hero__dots" role="tablist" aria-label="Hero slides">
                            @foreach (($homeHero['slides'] ?? []) as $index => $slide)
                                <button type="button" class="hero__dot {{ $index === 0 ? 'is-active' : '' }}" data-hero-dot aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <ul class="hero__trust">
                            @foreach (($homeHero['trust'] ?? []) as $bullet)
                                <li>{{ $bullet }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="hero__visual-wrap" data-hero-item>
                    <div class="hero__visual-glow" aria-hidden="true"></div>
                    <div class="hero__visual" data-hero-parallax>
                        <div class="hero__visual-chrome" aria-hidden="true">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="hero__visual-slides" data-hero-images>
                            <img
                                src="{{ site_image_url('home.hero') }}"
                                alt="Modern workspace where Hitecqe Solutions designs and builds software products"
                                class="is-active {{ site_image_has('home.hero') ? '' : 'is-placeholder' }}"
                                width="2400"
                                height="1600"
                                fetchpriority="high"
                                data-hero-image
                            >
                            <img
                                src="{{ site_image_url('home.craft') }}"
                                alt="Software engineering work in progress at Hitecqe Solutions"
                                class="{{ site_image_has('home.craft') ? '' : 'is-placeholder' }}"
                                width="1800"
                                height="1200"
                                loading="lazy"
                                data-hero-image
                            >
                            <img
                                src="{{ site_image_url('home.selected') }}"
                                alt="Product interface crafted by Hitecqe Solutions"
                                class="{{ site_image_has('home.selected') ? '' : 'is-placeholder' }}"
                                width="1600"
                                height="1066"
                                loading="lazy"
                                data-hero-image
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="marquee" aria-label="Brand highlights">
            <div class="marquee__track" aria-hidden="true">
                @for ($i = 0; $i < 2; $i++)
                    <div class="marquee__group">
                        <span>{{ config('app.name') }}</span>
                        <span class="marquee__sep">·</span>
                        <span>{{ config('brand.tagline') }}</span>
                        <span class="marquee__sep">·</span>
                        <span>Laravel Engineering</span>
                        <span class="marquee__sep">·</span>
                        <span>Product Design</span>
                        <span class="marquee__sep">·</span>
                        <span>Clear Delivery</span>
                        <span class="marquee__sep">·</span>
                        <span>{{ setting('address') }}</span>
                        <span class="marquee__sep">·</span>
                    </div>
                @endfor
            </div>
        </section>

        <section class="stats-bar" aria-label="Company metrics" data-counters>
            <div class="container-xl">
                <div class="stats-bar__grid" data-stagger="100">
                    @foreach ($homeStats as $stat)
                        <article class="stat-card" data-stagger-item>
                            <p class="stat-card__value">
                                <span data-count="{{ (int) ($stat['value'] ?? 0) }}" data-suffix="{{ $stat['suffix'] ?? '' }}">0</span>
                            </p>
                            <p class="stat-card__label">{{ $stat['label'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="trust-bar" aria-label="Company highlights">
            <div class="container-xl">
                <div class="trust-bar__grid" data-stagger="120">
                    <article class="trust-stat" data-stagger-item>
                        <span class="trust-stat__icon" aria-hidden="true"></span>
                        <strong>Full-stack delivery</strong>
                        <span>Strategy, design, engineering, and launch support in one team.</span>
                    </article>
                    <article class="trust-stat" data-stagger-item>
                        <span class="trust-stat__icon" aria-hidden="true"></span>
                        <strong>Production-grade systems</strong>
                        <span>Secure, maintainable Laravel applications built for real users.</span>
                    </article>
                    <article class="trust-stat" data-stagger-item>
                        <span class="trust-stat__icon" aria-hidden="true"></span>
                        <strong>Clear communication</strong>
                        <span>Structured updates, practical timelines, and transparent scope.</span>
                    </article>
                    <article class="trust-stat" data-stagger-item>
                        <span class="trust-stat__icon" aria-hidden="true"></span>
                        <strong>Long-term partnership</strong>
                        <span>Support, iteration, and growth after your product goes live.</span>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section--purpose" id="purpose">
            <div class="container-xl">
                <div class="purpose-head" data-reveal>
                    <p class="eyebrow">What we do</p>
                    <h2>Build the product. Shape the experience. Own the outcome.</h2>
                    <p class="section__text">
                        {{ config('app.name') }} partners with startups and growing companies to turn ambitious ideas into reliable software — from first sketch to production release.
                    </p>
                </div>
                <div class="purpose-rail" data-stagger="140">
                    <article class="purpose-item" data-stagger-item>
                        <span class="purpose-item__index">01</span>
                        <h3>Product engineering</h3>
                        <p>Custom web platforms and applications on modern Laravel architecture, built to stay maintainable as you grow.</p>
                    </article>
                    <article class="purpose-item" data-stagger-item>
                        <span class="purpose-item__index">02</span>
                        <h3>Interface design</h3>
                        <p>Distinctive, usable interfaces that make your brand feel intentional — not templated, not forgettable.</p>
                    </article>
                    <article class="purpose-item" data-stagger-item>
                        <span class="purpose-item__index">03</span>
                        <h3>Growth systems</h3>
                        <p>Scalable foundations so features, users, and teams can expand without rewriting the core later.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section--services">
            <div class="container-xl">
                <div class="section__intro section__intro--split" data-reveal>
                    <div>
                        <p class="eyebrow">Services</p>
                        <h2>Capabilities tuned for real shipping.</h2>
                    </div>
                    <p class="section__text">
                        Focused offerings for companies that need software delivered with clarity, craft, and commercial impact.
                    </p>
                </div>
                <div class="service-list" data-stagger="90">
                    <a href="{{ route('services') }}" class="service-row" data-stagger-item>
                        <span class="service-row__num">01</span>
                        <span class="service-row__title">Web application development</span>
                        <span class="service-row__meta">Laravel · MySQL · APIs</span>
                        <span class="service-row__arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('services') }}" class="service-row" data-stagger-item>
                        <span class="service-row__num">02</span>
                        <span class="service-row__title">Product &amp; UI design</span>
                        <span class="service-row__meta">Brand systems · UX flows</span>
                        <span class="service-row__arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('services') }}" class="service-row" data-stagger-item>
                        <span class="service-row__num">03</span>
                        <span class="service-row__title">Dynamic company websites</span>
                        <span class="service-row__meta">Performance · Conversion</span>
                        <span class="service-row__arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('services') }}" class="service-row" data-stagger-item>
                        <span class="service-row__num">04</span>
                        <span class="service-row__title">Maintenance &amp; iteration</span>
                        <span class="service-row__meta">Support · Feature velocity</span>
                        <span class="service-row__arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </section>

        <section class="section section--advantage" id="why-hitecqe">
            <div class="container-xl">
                <div class="section__intro section__intro--split" data-reveal>
                    <div>
                        <p class="eyebrow">{{ $homeAdvantages['eyebrow'] ?? 'Why Hitecqe' }}</p>
                        <h2>{{ $homeAdvantages['title'] ?? '' }}</h2>
                    </div>
                    <p class="section__text">{{ $homeAdvantages['lead'] ?? '' }}</p>
                </div>
                <div class="advantage-grid" data-stagger="80">
                    @foreach (($homeAdvantages['cards'] ?? []) as $index => $card)
                        <article class="advantage-card" data-stagger-item>
                            <span class="advantage-card__num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $card['title'] ?? '' }}</h3>
                            <p>{{ $card['body'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section--craft">
            <div class="container-xl">
                <div class="craft">
                    <div class="craft__media" data-reveal>
                        <img
                            src="{{ site_image_url('home.craft') }}"
                            alt="Close-up of software engineering work in progress"
                            class="{{ site_image_has('home.craft') ? '' : 'is-placeholder' }}"
                            width="1800"
                            height="1200"
                            loading="lazy"
                        >
                    </div>
                    <div class="craft__content" data-reveal>
                        <p class="eyebrow">Approach</p>
                        <h2>Less noise. More signal.</h2>
                        <p>
                            Every engagement starts with clarity — what the product must do, who it serves, and how success is measured. Then we build in focused cycles so you see progress early and ship with confidence.
                        </p>
                        <ol class="craft__steps craft__steps--home" data-stagger="160">
                            <li data-stagger-item>
                                <strong>Discover</strong>
                                <span>Goals, users, and constraints mapped into a sharp plan.</span>
                            </li>
                            <li data-stagger-item>
                                <strong>Design</strong>
                                <span>Flows and interfaces refined before heavy engineering begins.</span>
                            </li>
                            <li data-stagger-item>
                                <strong>Deliver</strong>
                                <span>Production-ready software, tested, documented, and ready to grow.</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--selected">
            <div class="container-xl">
                <div class="selected" data-reveal>
                    <div class="selected__copy">
                        <p class="eyebrow">Selected work</p>
                        <h2>Systems built to perform under real use.</h2>
                        <p>
                            From dashboards to customer-facing platforms, we craft software that feels calm, fast, and intentional.
                        </p>
                        <a href="{{ route('portfolio') }}" class="text-link">Explore portfolio <span aria-hidden="true">→</span></a>
                    </div>
                    <div class="selected__frame selected__frame--home">
                        <div class="selected__frame-bar" aria-hidden="true">
                            <span></span><span></span><span></span>
                        </div>
                        <img
                            src="{{ site_image_url('home.selected') }}"
                            alt="Product analytics dashboard interface"
                            class="{{ site_image_has('home.selected') ? '' : 'is-placeholder' }}"
                            width="1600"
                            height="1066"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--testimonials">
            <div class="container-xl">
                <div class="section__intro" data-reveal>
                    <p class="eyebrow">Testimonials</p>
                    <h2>What partners value in working with us.</h2>
                    <p class="section__text">
                        Real feedback from teams we’ve helped design, build, and ship software with clarity.
                    </p>
                </div>

                @if ($testimonials->isEmpty())
                    <p class="blog-empty" data-reveal>Client stories will appear here as projects go live.</p>
                @else
                    <div class="testimonials-grid" data-stagger="120" data-testimonial-slider>
                        @foreach ($testimonials as $index => $testimonial)
                            <blockquote class="testimonial-card {{ $index === 0 ? 'is-active' : '' }}" data-stagger-item data-testimonial>
                                <p>“{{ $testimonial->quote }}”</p>
                                <footer>
                                    <strong>{{ $testimonial->author_name }}</strong>
                                    @if ($testimonial->author_role)
                                        <span>{{ $testimonial->author_role }}</span>
                                    @endif
                                </footer>
                            </blockquote>
                        @endforeach
                    </div>
                    @if ($testimonials->count() > 1)
                        <div class="testimonials-nav" data-reveal>
                            <button type="button" class="testimonials-nav__btn" data-testimonial-prev aria-label="Previous testimonial">←</button>
                            <button type="button" class="testimonials-nav__btn" data-testimonial-next aria-label="Next testimonial">→</button>
                        </div>
                    @endif
                @endif
            </div>
        </section>

        <section class="section section--cta">
            <div class="container-xl">
                <div class="cta-band cta-band--home" data-reveal>
                    <div class="cta-band__glow" aria-hidden="true"></div>
                    <div class="cta-band__copy">
                        <p class="eyebrow">Next step</p>
                        <h2>Ready to build something that lasts?</h2>
                        <p>{{ config('brand.tagline') }}. Tell us about your product idea or upcoming launch — we’ll map a clear path forward.</p>
                    </div>
                    <div class="cta-band__actions">
                        <a href="{{ route('contact') }}" class="btn-signal btn-signal--shine">Talk to Hitecqe</a>
                        <a href="{{ route('about') }}" class="btn-quiet">About the studio</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
