@extends('layouts.frontend')

@section('title', 'About | ' . config('app.name'))
@section('meta_description', 'Learn about Hitecqe — a software studio focused on clarity, craft, and reliable Laravel product engineering.')

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>About Hitecqe</p>
            <h1 class="page-hero__title" data-reveal>A software studio built for clarity and craft.</h1>
            <p class="page-hero__lead" data-reveal>
                We help startups and growing companies turn ambitious ideas into reliable digital products — designed with intention, engineered with care.
            </p>
        </div>
    </section>

    <section class="section section--story">
        <div class="container-xl">
            <div class="story">
                <div class="story__media" data-reveal>
                    <img
                        src="{{ asset('images/about/studio.jpg') }}"
                        alt="Hitecqe team collaborating on product work"
                        width="1800"
                        height="1200"
                        loading="lazy"
                    >
                </div>
                <div class="story__content" data-reveal>
                    <p class="eyebrow">Our story</p>
                    <h2>Built to make software feel simple again.</h2>
                    <p>
                        Hitecqe started with a simple belief: great software should feel calm, clear, and useful — not noisy or overcomplicated. We work closely with founders and teams to shape products that solve real problems and stay strong as the business grows.
                    </p>
                    <p>
                        From first concept to production release, we stay hands-on. Design and engineering move together, so what you imagine is what users actually get.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--beliefs">
        <div class="container-xl">
            <div class="beliefs-head" data-reveal>
                <p class="eyebrow">What we believe</p>
                <h2>Principles that guide every project.</h2>
            </div>
            <div class="beliefs-rail">
                <article class="belief" data-reveal>
                    <span class="belief__index">01</span>
                    <h3>Clarity first</h3>
                    <p>We define the goal, the user, and the measure of success before writing serious code.</p>
                </article>
                <article class="belief" data-reveal>
                    <span class="belief__index">02</span>
                    <h3>Craft in the details</h3>
                    <p>Typography, flow, performance, and structure matter — because users feel the difference.</p>
                </article>
                <article class="belief" data-reveal>
                    <span class="belief__index">03</span>
                    <h3>Build for tomorrow</h3>
                    <p>We leave clean foundations so features, teams, and scale can grow without chaos.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--focus">
        <div class="container-xl">
            <div class="focus">
                <div class="focus__content" data-reveal>
                    <p class="eyebrow">How we work</p>
                    <h2>Close partnership. Focused delivery.</h2>
                    <p>
                        You get direct collaboration, honest communication, and steady progress — not layers of process that slow everything down. We ship in clear cycles so you always know what is done, what is next, and why it matters.
                    </p>
                    <ul class="focus__list">
                        <li>Direct access to the people building your product</li>
                        <li>Design and development working as one team</li>
                        <li>Transparent timelines and practical recommendations</li>
                    </ul>
                </div>
                <div class="focus__media" data-reveal>
                    <img
                        src="{{ asset('images/about/focus.jpg') }}"
                        alt="Focused workspace used for product design and development"
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
                    <p class="eyebrow">Work with us</p>
                    <h2>Let’s build your next product together.</h2>
                    <p>Share your idea, challenge, or launch goal — and we’ll help shape the smartest path forward.</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Start a conversation</a>
                    <a href="{{ route('services') }}" class="btn-quiet">See our services</a>
                </div>
            </div>
        </div>
    </section>
@endsection
