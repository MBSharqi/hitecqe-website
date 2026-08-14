@extends('layouts.frontend')

@section('title', 'Contact | ' . config('app.name'))
@section('meta_description', 'Contact Hitecqe to discuss your product idea, Laravel app, website rebuild, or upcoming launch.')

@section('content')
    <section class="page-hero">
        <div class="container-xl page-hero__inner">
            <p class="eyebrow" data-reveal>Contact</p>
            <h1 class="page-hero__title" data-reveal>Let’s talk about what you want to build.</h1>
            <p class="page-hero__lead" data-reveal>
                Share a short note about your product, timeline, or challenge. We’ll review it and get back with a clear next step.
            </p>
        </div>
    </section>

    <section class="section section--contact">
        <div class="container-xl">
            <div class="contact-layout">
                <aside class="contact-aside" data-reveal>
                    <p class="eyebrow">Reach us</p>
                    <h2>Direct, practical, and ready when you are.</h2>
                    <p>
                        Whether you’re starting a new product, rebuilding an existing one, or preparing a launch — tell us where you are and where you want to go.
                    </p>

                    <ul class="contact-points">
                        <li>
                            <strong>Email</strong>
                            <span><a href="mailto:hello@hitecqe.com">hello@hitecqe.com</a></span>
                        </li>
                        <li>
                            <strong>Phone</strong>
                            <span><a href="tel:+94772067857">+94 772 067 857</a></span>
                        </li>
                        <li>
                            <strong>Studio</strong>
                            <span>Colombo, Sri Lanka</span>
                        </li>
                        <li>
                            <strong>Hours</strong>
                            <span>Mon–Fri, 10:00–18:00 SLST</span>
                        </li>
                        <li>
                            <strong>Response</strong>
                            <span>Usually within 1–2 business days</span>
                        </li>
                    </ul>

                    <div class="contact-note">
                        <p class="contact-note__title">Helpful to include</p>
                        <ul class="contact-note__list">
                            <li>What you want to build or improve</li>
                            <li>Your target launch or deadline</li>
                            <li>Any existing product, design, or tech stack</li>
                        </ul>
                    </div>
                </aside>

                <div class="contact-panel" data-reveal>
                    @if (session('success'))
                        <div class="form-alert form-alert--success" role="status">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="contact-form" novalidate>
                        @csrf

                        <div class="form-grid">
                            <div class="form-field">
                                <label for="name">Name</label>
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    required
                                >
                                @error('name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-field">
                                <label for="email">Email</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    required
                                >
                                @error('email')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-field">
                                <label for="company">Company <span>(optional)</span></label>
                                <input
                                    id="company"
                                    type="text"
                                    name="company"
                                    value="{{ old('company') }}"
                                    autocomplete="organization"
                                >
                                @error('company')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-field">
                                <label for="phone">Phone <span>(optional)</span></label>
                                <input
                                    id="phone"
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                >
                                @error('phone')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-field form-field--full">
                                <label for="subject">Subject</label>
                                <input
                                    id="subject"
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    required
                                >
                                @error('subject')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-field form-field--full">
                                <label for="message">Project details</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="6"
                                    required
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-signal">Send message</button>
                            <p class="form-note">No spam. Just a clear reply from Hitecqe.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
