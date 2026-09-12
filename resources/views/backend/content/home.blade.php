@extends('layouts.backend')

@section('title', 'Home Content')
@section('eyebrow', 'Pages')
@section('heading', 'Home content')

@section('content')
    @php
        $hero = old('sections.hero', $content['hero'] ?? []);
        $stats = old('sections.stats.items', $content['stats'] ?? []);
        $advantages = old('sections.advantages', $content['advantages'] ?? []);
        $slides = \App\Models\PageContent::ensureCount($hero['slides'] ?? [], 3, ['title' => '', 'accent' => '', 'lead' => '']);
        $trust = \App\Models\PageContent::ensureCount($hero['trust'] ?? [], 3, '');
        $stats = \App\Models\PageContent::ensureCount($stats, 4, ['value' => 0, 'suffix' => '', 'label' => '']);
        $cards = \App\Models\PageContent::ensureCount($advantages['cards'] ?? [], 6, ['title' => '', 'body' => '']);
    @endphp

    <div class="admin-actions">
        <p class="admin-help">Edit hero slides, stats counters, and Why Hitecqe cards.</p>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.content.update', 'home') }}" class="admin-form">
            @csrf
            @method('PUT')

            <h2 class="admin-section-title">Hero slides</h2>
            @foreach ($slides as $index => $slide)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field">
                        <label>Slide {{ $index + 1 }} title</label>
                        <input type="text" name="sections[hero][slides][{{ $index }}][title]" value="{{ $slide['title'] ?? '' }}">
                    </div>
                    <div class="admin-field">
                        <label>Accent text</label>
                        <input type="text" name="sections[hero][slides][{{ $index }}][accent]" value="{{ $slide['accent'] ?? '' }}">
                    </div>
                    <div class="admin-field admin-field--full">
                        <label>Lead</label>
                        <textarea name="sections[hero][slides][{{ $index }}][lead]" rows="3">{{ $slide['lead'] ?? '' }}</textarea>
                    </div>
                </div>
            @endforeach

            <h2 class="admin-section-title">Hero trust bullets</h2>
            <div class="admin-form-grid">
                @foreach ($trust as $index => $item)
                    <div class="admin-field admin-field--full">
                        <label>Bullet {{ $index + 1 }}</label>
                        <input type="text" name="sections[hero][trust][{{ $index }}]" value="{{ $item }}">
                    </div>
                @endforeach
            </div>

            <h2 class="admin-section-title">Stats</h2>
            @foreach ($stats as $index => $stat)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field">
                        <label>Value</label>
                        <input type="number" name="sections[stats][items][{{ $index }}][value]" value="{{ $stat['value'] ?? 0 }}">
                    </div>
                    <div class="admin-field">
                        <label>Suffix</label>
                        <input type="text" name="sections[stats][items][{{ $index }}][suffix]" value="{{ $stat['suffix'] ?? '' }}" placeholder="+ % /7">
                    </div>
                    <div class="admin-field admin-field--full">
                        <label>Label</label>
                        <input type="text" name="sections[stats][items][{{ $index }}][label]" value="{{ $stat['label'] ?? '' }}">
                    </div>
                </div>
            @endforeach

            <h2 class="admin-section-title">Why Hitecqe</h2>
            <div class="admin-form-grid">
                <div class="admin-field">
                    <label>Eyebrow</label>
                    <input type="text" name="sections[advantages][eyebrow]" value="{{ $advantages['eyebrow'] ?? '' }}">
                </div>
                <div class="admin-field admin-field--full">
                    <label>Title</label>
                    <input type="text" name="sections[advantages][title]" value="{{ $advantages['title'] ?? '' }}">
                </div>
                <div class="admin-field admin-field--full">
                    <label>Lead</label>
                    <textarea name="sections[advantages][lead]" rows="3">{{ $advantages['lead'] ?? '' }}</textarea>
                </div>
            </div>

            @foreach ($cards as $index => $card)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field">
                        <label>Card {{ $index + 1 }} title</label>
                        <input type="text" name="sections[advantages][cards][{{ $index }}][title]" value="{{ $card['title'] ?? '' }}">
                    </div>
                    <div class="admin-field admin-field--full">
                        <label>Card {{ $index + 1 }} body</label>
                        <textarea name="sections[advantages][cards][{{ $index }}][body]" rows="2">{{ $card['body'] ?? '' }}</textarea>
                    </div>
                </div>
            @endforeach

            <div class="form-actions">
                <button type="submit" class="admin-btn">Save home content</button>
            </div>
        </form>
    </section>
@endsection
