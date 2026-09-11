@extends('layouts.frontend')

@section('title', 'About | ' . config('app.name'))
@section('meta_description', 'Learn about Hitecqe Solutions — a software studio focused on clarity, craft, and reliable Laravel product engineering. ' . config('brand.tagline') . '.')

@section('content')
    @php
        $hero = $content['hero'] ?? [];
        $story = $content['story'] ?? [];
        $beliefs = $content['beliefs'] ?? [];
        $focus = $content['focus'] ?? [];
        $cta = $content['cta'] ?? [];
    @endphp

    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>{{ $hero['eyebrow'] ?? 'About' }}</p>
            <h1 class="page-hero__title" data-reveal>{{ $hero['title'] ?? '' }}</h1>
            <p class="page-hero__lead" data-reveal>{{ $hero['lead'] ?? '' }}</p>
        </div>
    </section>

    <section class="section section--story">
        <div class="container-xl">
            <div class="story">
                <div class="story__media" data-reveal>
                    <img
                        src="{{ site_image_url('about.studio') }}"
                        alt="Hitecqe team collaborating on product work"
                        class="{{ site_image_has('about.studio') ? '' : 'is-placeholder' }}"
                        width="1800"
                        height="1200"
                        loading="lazy"
                    >
                </div>
                <div class="story__content" data-reveal>
                    <p class="eyebrow">{{ $story['eyebrow'] ?? 'Our story' }}</p>
                    <h2>{{ $story['title'] ?? '' }}</h2>
                    @foreach (($story['paragraphs'] ?? []) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section section--beliefs">
        <div class="container-xl">
            <div class="beliefs-head" data-reveal>
                <p class="eyebrow">{{ $beliefs['eyebrow'] ?? 'What we believe' }}</p>
                <h2>{{ $beliefs['title'] ?? '' }}</h2>
            </div>
            <div class="beliefs-rail">
                @foreach (($beliefs['items'] ?? []) as $index => $item)
                    <article class="belief" data-reveal>
                        <span class="belief__index">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['body'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--focus">
        <div class="container-xl">
            <div class="focus">
                <div class="focus__content" data-reveal>
                    <p class="eyebrow">{{ $focus['eyebrow'] ?? 'How we work' }}</p>
                    <h2>{{ $focus['title'] ?? '' }}</h2>
                    <p>{{ $focus['lead'] ?? '' }}</p>
                    <ul class="focus__list">
                        @foreach (($focus['points'] ?? []) as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="focus__media" data-reveal>
                    <img
                        src="{{ site_image_url('about.focus') }}"
                        alt="Focused workspace used for product design and development"
                        class="{{ site_image_has('about.focus') ? '' : 'is-placeholder' }}"
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
                    <p class="eyebrow">{{ $cta['eyebrow'] ?? 'Work with us' }}</p>
                    <h2>{{ $cta['title'] ?? '' }}</h2>
                    <p>{{ $cta['lead'] ?? '' }}</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Start a conversation</a>
                    <a href="{{ route('services') }}" class="btn-quiet">See our services</a>
                </div>
            </div>
        </div>
    </section>
@endsection
