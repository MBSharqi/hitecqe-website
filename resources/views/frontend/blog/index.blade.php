@extends('layouts.frontend')

@section('title', 'Blog | ' . config('app.name'))
@section('meta_description', 'Insights from Hitecqe on product design, Laravel engineering, and shipping software with clarity.')

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>Blog</p>
            <h1 class="page-hero__title" data-reveal>Notes on product, craft, and shipping.</h1>
            <p class="page-hero__lead" data-reveal>
                Practical ideas from Hitecqe on building software that stays clear, useful, and ready to grow.
            </p>
        </div>
    </section>

    <section class="section section--blog">
        <div class="container-xl">
            @if ($posts->isEmpty())
                <p class="blog-empty" data-reveal>No published posts yet. Check back soon.</p>
            @else
                <div class="blog-list">
                    @foreach ($posts as $post)
                        <article class="blog-item" data-reveal>
                            <a href="{{ route('blog.show', $post) }}" class="blog-item__media">
                                <img
                                    src="{{ $post->cover_url }}"
                                    alt="{{ $post->title }}"
                                    class="{{ $post->hasCoverImage() ? '' : 'is-placeholder' }}"
                                    width="1600"
                                    height="1066"
                                    loading="lazy"
                                >
                            </a>
                            <div class="blog-item__content">
                                <time datetime="{{ $post->published_at?->toDateString() }}">
                                    {{ $post->published_at?->format('M j, Y') }}
                                </time>
                                <h2>
                                    <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                                </h2>
                                <p>{{ $post->excerpt }}</p>
                                <a href="{{ route('blog.show', $post) }}" class="text-link">
                                    Read article <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="blog-pagination">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
