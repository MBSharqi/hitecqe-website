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
    <div class="home-page">
        <section class="hero hero--corporate" aria-label="Introduction" data-hero-slider>
            <div class="hero__backdrop" aria-hidden="true">
                <span class="hero__orb hero__orb--one"></span>
                <span class="hero__orb hero__orb--two"></span>
                <span class="hero__grid-lines"></span>
            </div>
            <div class="container-xl hero__grid">
                <div class="hero__copy">
                    <p class="hero__eyebrow" data-hero-item>
                        <span class="hero__eyebrow-dot"></span>
                        {{ config('app.name') }}
                    </p>
                    <p class="hero__tagline" data-hero-item>{{ config('brand.tagline') }}</p>
                    <div class="hero__slides" data-hero-slides>
                        <div class="hero__slide is-active" data-hero-slide>
                            <h1 class="hero__title">
                                Software that moves <span class="hero__accent">business forward.</span>
                            </h1>
                            <p class="hero__lead">
                                We design and engineer digital products with precision — clear systems, sharp interfaces, and lasting performance for startups and growing companies.
                            </p>
                        </div>
                        <div class="hero__slide" data-hero-slide>
                            <h1 class="hero__title">
                                From first sketch to <span class="hero__accent">production release.</span>
                            </h1>
                            <p class="hero__lead">
                                Strategy, UI design, and Laravel engineering in one focused team — so your product ships with clarity and stays ready to grow.
                            </p>
                        </div>
                        <div class="hero__slide" data-hero-slide>
                            <h1 class="hero__title">
                                Built clear. <span class="hero__accent">Delivered right.</span>
                            </h1>
                            <p class="hero__lead">
                                Calm interfaces, maintainable architecture, and transparent delivery — software your team can trust after launch.
                            </p>
                        </div>
                    </div>
                    <div class="hero__actions" data-hero-item>
                        <a href="{{ route('contact') }}" class="btn-signal btn-signal--shine">Start a project</a>
                        <a href="{{ route('portfolio') }}" class="btn-quiet">View our work</a>
                    </div>
                    <div class="hero__slider-nav" data-hero-item>
                        <div class="hero__dots" role="tablist" aria-label="Hero slides">
                            <button type="button" class="hero__dot is-active" data-hero-dot aria-label="Slide 1"></button>
                            <button type="button" class="hero__dot" data-hero-dot aria-label="Slide 2"></button>
                            <button type="button" class="hero__dot" data-hero-dot aria-label="Slide 3"></button>
                        </div>
                        <ul class="hero__trust">
                            <li>Laravel &amp; modern web platforms</li>
                            <li>Colombo, Sri Lanka · SLST</li>
                            <li>Design through production delivery</li>
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
                        <span>Colombo, Sri Lanka</span>
                        <span class="marquee__sep">·</span>
                    </div>
                @endfor
            </div>
        </section>

        <section class="stats-bar" aria-label="Company metrics" data-counters>
            <div class="container-xl">
                <div class="stats-bar__grid" data-stagger="100">
                    <article class="stat-card" data-stagger-item>
                        <p class="stat-card__value"><span data-count="40" data-suffix="+">0</span></p>
                        <p class="stat-card__label">Focused delivery cycles completed</p>
                    </article>
                    <article class="stat-card" data-stagger-item>
                        <p class="stat-card__value"><span data-count="100" data-suffix="%">0</span></p>
                        <p class="stat-card__label">Transparent scope and progress updates</p>
                    </article>
                    <article class="stat-card" data-stagger-item>
                        <p class="stat-card__value"><span data-count="3" data-suffix="">0</span></p>
                        <p class="stat-card__label">Core stages — Discover, Design, Deliver</p>
                    </article>
                    <article class="stat-card" data-stagger-item>
                        <p class="stat-card__value"><span data-count="24" data-suffix="/7">0</span></p>
                        <p class="stat-card__label">Systems built for real-world use</p>
                    </article>
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
                        <p class="eyebrow">Why Hitecqe</p>
                        <h2>Client-focused delivery for lasting software.</h2>
                    </div>
                    <p class="section__text">
                        We combine clear planning, careful craft, and dependable engineering — so every engagement feels structured, transparent, and built for real outcomes.
                    </p>
                </div>
                <div class="advantage-grid" data-stagger="80">
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">01</span>
                        <h3>Understand your goals</h3>
                        <p>We start with your product job, users, and constraints — then align scope to what matters most.</p>
                    </article>
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">02</span>
                        <h3>Design before heavy build</h3>
                        <p>Flows and interfaces are refined early, so engineering time goes into the right decisions.</p>
                    </article>
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">03</span>
                        <h3>Ship in focused cycles</h3>
                        <p>You see progress early, with practical milestones and production-ready releases.</p>
                    </article>
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">04</span>
                        <h3>Transparent communication</h3>
                        <p>Clear updates, honest timelines, and no hidden scope — partnership built on trust.</p>
                    </article>
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">05</span>
                        <h3>Maintainable architecture</h3>
                        <p>Laravel systems structured to stay readable, secure, and ready for future features.</p>
                    </article>
                    <article class="advantage-card" data-stagger-item>
                        <span class="advantage-card__num">06</span>
                        <h3>Support after launch</h3>
                        <p>Iteration, maintenance, and growth planning after your product is live.</p>
                    </article>
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
                        Sample voices that reflect how we aim to work — replace these with your real client feedback as projects go live.
                    </p>
                </div>
                <div class="testimonials-grid" data-stagger="120" data-testimonial-slider>
                    <blockquote class="testimonial-card is-active" data-stagger-item data-testimonial>
                        <p>“Hitecqe Solutions brought clarity to a messy brief and delivered a Laravel platform our team could actually maintain. Communication stayed clear from kickoff to launch.”</p>
                        <footer>
                            <strong>Amina Fernando</strong>
                            <span>Founder, Northline Analytics</span>
                        </footer>
                    </blockquote>
                    <blockquote class="testimonial-card" data-stagger-item data-testimonial>
                        <p>“They treated design and engineering as one process. The result felt polished, fast, and ready for real users — without the usual handoff gaps.”</p>
                        <footer>
                            <strong>Ravi Perera</strong>
                            <span>Product Lead, Orbit Hub</span>
                        </footer>
                    </blockquote>
                    <blockquote class="testimonial-card" data-stagger-item data-testimonial>
                        <p>“Transparent timelines, careful craft, and a partner mindset. We knew what was shipping each week — and why.”</p>
                        <footer>
                            <strong>Sasha Wijesinghe</strong>
                            <span>Operations Director, Forge Suite</span>
                        </footer>
                    </blockquote>
                </div>
                <div class="testimonials-nav" data-reveal>
                    <button type="button" class="testimonials-nav__btn" data-testimonial-prev aria-label="Previous testimonial">←</button>
                    <button type="button" class="testimonials-nav__btn" data-testimonial-next aria-label="Next testimonial">→</button>
                </div>
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
