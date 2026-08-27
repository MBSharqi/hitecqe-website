@extends('layouts.frontend')

@section('title', 'Portfolio | ' . config('app.name'))
@section('meta_description', 'See selected Hitecqe Solutions work — product platforms, dashboards, and company websites built for real use.')

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>Portfolio</p>
            <h1 class="page-hero__title" data-reveal>Selected work built for real use.</h1>
            <p class="page-hero__lead" data-reveal>
                A look at the kinds of products and platforms {{ config('app.name') }} designs and engineers — calm interfaces, solid systems, and outcomes that hold up in production.
            </p>
        </div>
    </section>

    @if ($featured)
        <section class="section section--featured">
            <div class="container-xl">
                <article class="featured" data-reveal>
                    <div class="featured__media">
                        <img
                            src="{{ $featured->cover_url }}"
                            alt="{{ $featured->title }}"
                            class="{{ $featured->hasCoverImage() ? '' : 'is-placeholder' }}"
                            width="1600"
                            height="1066"
                            loading="eager"
                        >
                    </div>
                    <div class="featured__content">
                        <p class="eyebrow">Featured project</p>
                        <h2>{{ $featured->title }}</h2>
                        <p>{{ $featured->description }}</p>
                        @if ($featured->focus || $featured->outcome)
                            <dl class="featured__meta">
                                @if ($featured->focus)
                                    <div>
                                        <dt>Focus</dt>
                                        <dd>{{ $featured->focus }}</dd>
                                    </div>
                                @endif
                                @if ($featured->outcome)
                                    <div>
                                        <dt>Outcome</dt>
                                        <dd>{{ $featured->outcome }}</dd>
                                    </div>
                                @endif
                            </dl>
                        @elseif ($featured->tags)
                            <p class="work__tags">{{ $featured->tags }}</p>
                        @endif
                    </div>
                </article>
            </div>
        </section>
    @endif

    <section class="section section--works">
        <div class="container-xl">
            <div class="works-head" data-reveal>
                <p class="eyebrow">{{ $featured ? 'More work' : 'Selected work' }}</p>
                <h2>Systems shaped for clarity and growth.</h2>
            </div>

            @if ($projects->isEmpty() && ! $featured)
                <p class="blog-empty" data-reveal>No published projects yet. Check back soon.</p>
            @elseif ($projects->isNotEmpty())
                <div class="works-list">
                    @foreach ($projects as $index => $project)
                        <article class="work" data-reveal>
                            <div class="work__media">
                                <img
                                    src="{{ $project->cover_url }}"
                                    alt="{{ $project->title }}"
                                    class="{{ $project->hasCoverImage() ? '' : 'is-placeholder' }}"
                                    width="1600"
                                    height="1066"
                                    loading="lazy"
                                >
                            </div>
                            <div class="work__content">
                                <span class="work__index">{{ str_pad((string) ($index + ($featured ? 2 : 1)), 2, '0', STR_PAD_LEFT) }}</span>
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                @if ($project->tags)
                                    <p class="work__tags">{{ $project->tags }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
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
