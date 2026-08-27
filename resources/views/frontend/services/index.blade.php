@extends('layouts.frontend')

@section('title', 'Services | ' . config('app.name'))
@section('meta_description', 'Explore Hitecqe services: Laravel web apps, UI design, dynamic websites, maintenance, and technical consulting.')

@section('content')
    @php
        $hero = page_content('services', 'hero');
        $engineering = page_content('services', 'engineering');
        $design = page_content('services', 'design');
        $offerings = page_content('services', 'offerings');
        $process = page_content('services', 'process');
        $cta = page_content('services', 'cta');
    @endphp

    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>{{ $hero['eyebrow'] ?? 'Services' }}</p>
            <h1 class="page-hero__title" data-reveal>{{ $hero['title'] ?? '' }}</h1>
            <p class="page-hero__lead" data-reveal>{{ $hero['lead'] ?? '' }}</p>
        </div>
    </section>

    <section class="section section--service-detail" id="engineering">
        <div class="container-xl">
            <div class="service-detail">
                <div class="service-detail__content" data-reveal>
                    <span class="service-detail__index">01</span>
                    <p class="eyebrow">{{ $engineering['eyebrow'] ?? 'Engineering' }}</p>
                    <h2>{{ $engineering['title'] ?? '' }}</h2>
                    <p>{{ $engineering['lead'] ?? '' }}</p>
                    <ul class="service-detail__list">
                        @foreach (($engineering['points'] ?? []) as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="service-detail__media" data-reveal>
                    <img
                        src="{{ site_image_url('services.engineering') }}"
                        alt="Software engineering workspace for web application development"
                        class="{{ site_image_has('services.engineering') ? '' : 'is-placeholder' }}"
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
                    <p class="eyebrow">{{ $design['eyebrow'] ?? 'Design' }}</p>
                    <h2>{{ $design['title'] ?? '' }}</h2>
                    <p>{{ $design['lead'] ?? '' }}</p>
                    <ul class="service-detail__list">
                        @foreach (($design['points'] ?? []) as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="service-detail__media" data-reveal>
                    <img
                        src="{{ site_image_url('services.design') }}"
                        alt="Interface design process for digital products"
                        class="{{ site_image_has('services.design') ? '' : 'is-placeholder' }}"
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
                <p class="eyebrow">{{ $offerings['eyebrow'] ?? 'Also available' }}</p>
                <h2>{{ $offerings['title'] ?? '' }}</h2>
            </div>
            <div class="offerings-rail">
                @foreach (($offerings['items'] ?? []) as $index => $item)
                    <article class="offering" data-reveal>
                        <span class="offering__index">{{ str_pad((string) ($index + 3), 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['body'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--process">
        <div class="container-xl">
            <div class="process" data-reveal>
                <div class="process__intro">
                    <p class="eyebrow">{{ $process['eyebrow'] ?? 'Engagement' }}</p>
                    <h2>{{ $process['title'] ?? '' }}</h2>
                    <p>{{ $process['lead'] ?? '' }}</p>
                </div>
                <ol class="process__steps">
                    @foreach (($process['steps'] ?? []) as $step)
                        <li>
                            <strong>{{ $step['title'] ?? '' }}</strong>
                            <span>{{ $step['body'] ?? '' }}</span>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    <section class="section section--cta">
        <div class="container-xl">
            <div class="cta-band" data-reveal>
                <div class="cta-band__copy">
                    <p class="eyebrow">{{ $cta['eyebrow'] ?? 'Start a project' }}</p>
                    <h2>{{ $cta['title'] ?? '' }}</h2>
                    <p>{{ $cta['lead'] ?? '' }}</p>
                </div>
                <div class="cta-band__actions">
                    <a href="{{ route('contact') }}" class="btn-signal">Talk to Hitecqe</a>
                    <a href="{{ route('portfolio') }}" class="btn-quiet">View portfolio</a>
                </div>
            </div>
        </div>
    </section>
@endsection
