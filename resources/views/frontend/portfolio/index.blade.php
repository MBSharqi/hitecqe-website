@extends('layouts.frontend')

@section('title', 'Portfolio | ' . config('app.name'))

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>Portfolio</p>
            <h1 class="page-hero__title" data-reveal>Selected work built for real use.</h1>
            <p class="page-hero__lead" data-reveal>
                A look at the kinds of products and platforms Hitecqe designs and engineers — calm interfaces, solid systems, and outcomes that hold up in production.
            </p>
        </div>
    </section>

    <section class="section section--featured">
        <div class="container-xl">
            <article class="featured" data-reveal>
                <div class="featured__media">
                    <img
                        src="{{ asset('images/portfolio/dashboard.jpg') }}"
                        alt="Analytics dashboard interface for a growth platform"
                        width="1600"
                        height="1066"
                        loading="eager"
                    >
                </div>
                <div class="featured__content">
                    <p class="eyebrow">Featured project</p>
                    <h2>Northline Analytics</h2>
                    <p>
                        A performance dashboard for a growing SaaS team — clearer reporting, faster decisions, and an interface that stays calm under daily use.
                    </p>
                    <dl class="featured__meta">
                        <div>
                            <dt>Focus</dt>
                            <dd>Product design · Laravel app</dd>
                        </div>
                        <div>
                            <dt>Outcome</dt>
                            <dd>Faster insight workflows for operators</dd>
                        </div>
                    </dl>
                </div>
            </article>
        </div>
    </section>

    <section class="section section--works">
        <div class="container-xl">
            <div class="works-head" data-reveal>
                <p class="eyebrow">More work</p>
                <h2>Systems shaped for clarity and growth.</h2>
            </div>

            <div class="works-list">
                <article class="work" data-reveal>
                    <div class="work__media">
                        <img
                            src="{{ asset('images/portfolio/mobile.jpg') }}"
                            alt="Mobile product experience for a customer platform"
                            width="1600"
                            height="1066"
                            loading="lazy"
                        >
                    </div>
                    <div class="work__content">
                        <span class="work__index">02</span>
                        <h3>Orbit Customer Hub</h3>
                        <p>A responsive customer portal with clean account flows, support touchpoints, and a visual system built for trust.</p>
                        <p class="work__tags">UI design · Web app · Responsive</p>
                    </div>
                </article>

                <article class="work" data-reveal>
                    <div class="work__media">
                        <img
                            src="{{ asset('images/portfolio/platform.jpg') }}"
                            alt="Engineering workspace representing a custom platform build"
                            width="1600"
                            height="1066"
                            loading="lazy"
                        >
                    </div>
                    <div class="work__content">
                        <span class="work__index">03</span>
                        <h3>Forge Operations Suite</h3>
                        <p>Internal tooling for operations teams — structured workflows, role-based access, and a foundation ready for future modules.</p>
                        <p class="work__tags">Laravel · MySQL · Admin systems</p>
                    </div>
                </article>

                <article class="work" data-reveal>
                    <div class="work__media">
                        <img
                            src="{{ asset('images/portfolio/workspace.jpg') }}"
                            alt="Workspace representing a company website and brand platform"
                            width="1600"
                            height="1066"
                            loading="lazy"
                        >
                    </div>
                    <div class="work__content">
                        <span class="work__index">04</span>
                        <h3>Meridian Company Site</h3>
                        <p>A high-clarity marketing website for a software brand — strong first impression, fast pages, and a structure ready for content growth.</p>
                        <p class="work__tags">Brand site · Performance · Frontend</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--impact">
        <div class="container-xl">
            <div class="impact" data-reveal>
                <p class="eyebrow">Approach in practice</p>
                <h2>Every project starts with signal, not noise.</h2>
                <p>
                    We focus on the product job, the people who use it, and the system underneath. That means fewer wasted features, cleaner interfaces, and software that stays usable after launch.
                </p>
            </div>
        </div>
    </section>

    <section class="section section--cta">
        <div class="container-xl">
            <div class="cta-band" data-reveal>
                <div class="cta-band__copy">
                    <p class="eyebrow">Have a project?</p>
                    <h2>Let’s build the next one together.</h2>
                    <p>Share your product idea, rebuild, or launch goal — and we’ll map a clear path from concept to release.</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Start a project</a>
                    <a href="{{ route('services') }}" class="btn-quiet">Explore services</a>
                </div>
            </div>
        </div>
    </section>
@endsection
