@extends('layouts.frontend')

@section('title', config('app.name') . ' — Software that moves business forward')
@section('meta_description', 'Hitecqe designs and builds custom Laravel web applications, dynamic company websites, and product experiences for startups and growing businesses.')

@section('content')
    <section class="hero" aria-label="Introduction">
        <div class="hero__media" data-hero-media>
            <img
                src="{{ site_image_url('home.hero') }}"
                alt="Modern workspace where Hitecqe designs and builds software products"
                class="{{ site_image_has('home.hero') ? '' : 'is-placeholder' }}"
                width="2400"
                height="1600"
                fetchpriority="high"
            >
        </div>
        <div class="hero__veil"></div>
        <div class="container-xl hero__content">
            <p class="hero__brand" data-reveal>Hitecqe</p>
            <h1 class="hero__headline" data-reveal>Solutions</h1>
            <h1 class="hero__headline" data-reveal>Software that moves business forward.</h1>
            <p class="hero__lead" data-reveal>
                We design and engineer digital products with precision — clear systems, sharp interfaces, and lasting performance.
            </p>
            <div class="hero__actions" data-reveal>
                <a href="{{ route('contact') }}" class="btn-signal">Start a project</a>
                <a href="{{ route('portfolio') }}" class="btn-ghost">View our work</a>
            </div>
        </div>
        <a href="#purpose" class="hero__scroll" aria-label="Scroll to next section">
            <span></span>
        </a>
    </section>

    <section class="section section--purpose" id="purpose">
        <div class="container-xl">
            <div class="purpose-head" data-reveal>
                <p class="eyebrow">What we do</p>
                <h2>Build the product. Shape the experience. Own the outcome.</h2>
                <p class="section__text">
                    Hitecqe partners with startups and growing companies to turn ambitious ideas into reliable software — from first sketch to production release.
                </p>
            </div>
            <div class="purpose-rail">
                <article class="purpose-item" data-reveal>
                    <span class="purpose-item__index">01</span>
                    <h3>Product engineering</h3>
                    <p>Custom web platforms and applications on modern Laravel architecture, built to stay maintainable as you grow.</p>
                </article>
                <article class="purpose-item" data-reveal>
                    <span class="purpose-item__index">02</span>
                    <h3>Interface design</h3>
                    <p>Distinctive, usable interfaces that make your brand feel intentional — not templated, not forgettable.</p>
                </article>
                <article class="purpose-item" data-reveal>
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
            <div class="service-list">
                <a href="{{ route('services') }}" class="service-row" data-reveal>
                    <span class="service-row__num">01</span>
                    <span class="service-row__title">Web application development</span>
                    <span class="service-row__meta">Laravel · MySQL · APIs</span>
                    <span class="service-row__arrow" aria-hidden="true">→</span>
                </a>
                <a href="{{ route('services') }}" class="service-row" data-reveal>
                    <span class="service-row__num">02</span>
                    <span class="service-row__title">Product &amp; UI design</span>
                    <span class="service-row__meta">Brand systems · UX flows</span>
                    <span class="service-row__arrow" aria-hidden="true">→</span>
                </a>
                <a href="{{ route('services') }}" class="service-row" data-reveal>
                    <span class="service-row__num">03</span>
                    <span class="service-row__title">Dynamic company websites</span>
                    <span class="service-row__meta">Performance · Conversion</span>
                    <span class="service-row__arrow" aria-hidden="true">→</span>
                </a>
                <a href="{{ route('services') }}" class="service-row" data-reveal>
                    <span class="service-row__num">04</span>
                    <span class="service-row__title">Maintenance &amp; iteration</span>
                    <span class="service-row__meta">Support · Feature velocity</span>
                    <span class="service-row__arrow" aria-hidden="true">→</span>
                </a>
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
                    <ol class="craft__steps">
                        <li>
                            <strong>Discover</strong>
                            <span>Goals, users, and constraints mapped into a sharp plan.</span>
                        </li>
                        <li>
                            <strong>Design</strong>
                            <span>Flows and interfaces refined before heavy engineering begins.</span>
                        </li>
                        <li>
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
                <div class="selected__frame">
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

    <section class="section section--cta">
        <div class="container-xl">
            <div class="cta-band" data-reveal>
                <div class="cta-band__copy">
                    <p class="eyebrow">Next step</p>
                    <h2>Ready to build something that lasts?</h2>
                    <p>Tell us about your product idea or upcoming launch. We’ll map the smartest path forward.</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Talk to Hitecqe</a>
                    <a href="{{ route('about') }}" class="btn-quiet">About the studio</a>
                </div>
            </div>
        </div>
    </section>
@endsection
