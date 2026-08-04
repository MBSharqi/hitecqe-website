@extends('layouts.frontend')

@section('title', $post->title . ' | ' . config('app.name'))

@section('content')
    <article class="post-page">
        <header class="page-hero page-hero--post">
            <div class="container-xl page-hero__inner">
                <p class="eyebrow" data-reveal>Article</p>
                <h1 class="page-hero__title" data-reveal>{{ $post->title }}</h1>
                <p class="page-hero__lead" data-reveal>{{ $post->excerpt }}</p>
                <p class="post-page__meta" data-reveal>
                    <time datetime="{{ $post->published_at?->toDateString() }}">
                        {{ $post->published_at?->format('F j, Y') }}
                    </time>
                </p>
            </div>
        </header>

        @if ($post->cover_url)
            <div class="container-xl">
                <div class="post-page__cover" data-reveal>
                    <img
                        src="{{ $post->cover_url }}"
                        alt="{{ $post->title }}"
                        width="1600"
                        height="1066"
                        loading="eager"
                    >
                </div>
            </div>
        @endif

        <section class="section section--post-body">
            <div class="container-xl">
                <div class="post-page__body" data-reveal>
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="post-page__footer" data-reveal>
                    <a href="{{ route('blog') }}" class="text-link">← Back to blog</a>
                    <a href="{{ route('contact') }}" class="btn-signal">Start a project</a>
                </div>
            </div>
        </section>
    </article>
@endsection
