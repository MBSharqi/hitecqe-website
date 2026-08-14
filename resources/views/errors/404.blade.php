@extends('layouts.frontend')

@section('title', 'Page not found | ' . config('app.name'))
@section('meta_description', 'The page you requested could not be found on Hitecqe.')
@section('meta_robots', 'noindex, follow')

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>404</p>
            <h1 class="page-hero__title" data-reveal>This page does not exist.</h1>
            <p class="page-hero__lead" data-reveal>
                The link may be outdated or the page may have moved. Head back home or contact us if you need help.
            </p>
            <div class="error-actions" data-reveal>
                <a href="{{ route('home') }}" class="btn-signal">Back to home</a>
                <a href="{{ route('contact') }}" class="btn-quiet">Contact Hitecqe</a>
            </div>
        </div>
    </section>
@endsection
