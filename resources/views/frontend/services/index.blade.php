@extends('layouts.frontend')

@section('title', 'Services | ' . config('app.name'))

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>Services</p>
            <h1 class="page-hero__title" data-reveal>Capabilities tuned for real shipping.</h1>
            <p class="page-hero__lead" data-reveal>
                From product design to Laravel engineering, Hitecqe helps you plan clearly, build cleanly, and launch with confidence.
            </p>
        </div>
    </section>

    <section class="section section--service-detail" id="engineering">
        <div class="container-xl">
            <div class="service-detail">
                <div class="service-detail__content" data-reveal>
                    <span class="service-detail__index">01</span>
                    <p class="eyebrow">Engineering</p>
                    <h2>Web application development</h2>
                    <p>
                        Custom platforms and business applications built on modern Laravel architecture — secure, maintainable, and ready to grow with your company.
                    </p>
                    <ul class="service-detail__list">
                        <li>Custom web apps and internal tools</li>
                        <li>APIs, authentication, and role systems</li>
                        <li>MySQL data modeling and performance</li>
                        <li>Integrations with third-party services</li>
                    </ul>
                </div>
                <div class="service-detail__media" data-reveal>
                    <img
                        src="{{ asset('images/services/engineering.jpg') }}"
                        alt="Software engineering workspace for web application development"
                        width="1800"
                        height="1200"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="section section--service-detail section--service-detail-alt" id="design">
        <div class="container-xl">
            <div class="service-detail service-detail--reverse">
                <div class="service-detail__content" data-reveal>
                    <span class="service-detail__index">02</span>
                    <p class="eyebrow">Design</p>
                    <h2>Product &amp; UI design</h2>
                    <p>
                        Distinctive interfaces and product flows that feel intentional — so your brand looks sharp and your users always know what to do next.
                    </p>
                    <ul class="service-detail__list">
                        <li>UX flows and information architecture</li>
                        <li>Visual systems and interface design</li>
                        <li>Responsive layouts for every screen</li>
                        <li>Design-to-development handoff</li>
                    </ul>
                </div>
                <div class="service-detail__media" data-reveal>
                    <img
                        src="{{ asset('images/services/design.jpg') }}"
                        alt="Interface design process for digital products"
                        width="1600"
                        height="1066"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="section section--offerings">
        <div class="container-xl">
            <div class="offerings-head" data-reveal>
                <p class="eyebrow">Also available</p>
                <h2>More ways we help teams ship.</h2>
            </div>
            <div class="offerings-rail">
                <article class="offering" data-reveal>
                    <span class="offering__index">03</span>
                    <h3>Dynamic company websites</h3>
                    <p>High-performance marketing sites with clean structure, strong branding, and room to grow into dynamic content later.</p>
                </article>
                <article class="offering" data-reveal>
                    <span class="offering__index">04</span>
                    <h3>Maintenance &amp; iteration</h3>
                    <p>Ongoing support, feature updates, and improvements so your product keeps moving after launch.</p>
                </article>
                <article class="offering" data-reveal>
                    <span class="offering__index">05</span>
                    <h3>Technical consulting</h3>
                    <p>Architecture reviews, stack decisions, and practical guidance when you need a clear technical direction.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--process">
        <div class="container-xl">
            <div class="process" data-reveal>
                <div class="process__intro">
                    <p class="eyebrow">Engagement</p>
                    <h2>A simple path from idea to release.</h2>
                    <p>We keep the process light and visible, so progress feels steady and decisions stay easy.</p>
                </div>
                <ol class="process__steps">
                    <li>
                        <strong>Scope</strong>
                        <span>We align on goals, users, timeline, and what success looks like.</span>
                    </li>
                    <li>
                        <strong>Design</strong>
                        <span>Flows and interfaces are shaped before heavy engineering begins.</span>
                    </li>
                    <li>
                        <strong>Build</strong>
                        <span>We develop in focused cycles with clear demos and feedback points.</span>
                    </li>
                    <li>
                        <strong>Launch</strong>
                        <span>We ship cleanly, then support iteration as your product grows.</span>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section section--cta">
        <div class="container-xl">
            <div class="cta-band" data-reveal>
                <div class="cta-band__copy">
                    <p class="eyebrow">Start a project</p>
                    <h2>Tell us what you want to build.</h2>
                    <p>Share your product idea, rebuild need, or upcoming launch — we’ll recommend the smartest next step.</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Talk to Hitecqe</a>
                    <a href="{{ route('portfolio') }}" class="btn-quiet">View portfolio</a>
                </div>
            </div>
        </div>
    </section>
@endsection
