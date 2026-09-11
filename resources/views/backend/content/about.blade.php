@extends('layouts.backend')

@section('title', 'About Content')
@section('eyebrow', 'Pages')
@section('heading', 'About content')

@section('content')
    @php
        $hero = old('sections.hero', $content['hero'] ?? []);
        $story = old('sections.story', $content['story'] ?? []);
        $beliefs = old('sections.beliefs', $content['beliefs'] ?? []);
        $focus = old('sections.focus', $content['focus'] ?? []);
        $cta = old('sections.cta', $content['cta'] ?? []);
        $paragraphs = \App\Models\PageContent::ensureCount($story['paragraphs'] ?? [], 2, '');
        $beliefItems = \App\Models\PageContent::ensureCount($beliefs['items'] ?? [], 3, ['title' => '', 'body' => '']);
        $points = \App\Models\PageContent::ensureCount($focus['points'] ?? [], 3, '');
    @endphp

    <div class="admin-actions">
        <p class="admin-help">Edit About page text. Images stay under Site images.</p>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.content.update', 'about') }}" class="admin-form">
            @csrf
            @method('PUT')

            <h2 class="admin-section-title">Hero</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[hero][eyebrow]" value="{{ $hero['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[hero][title]" value="{{ $hero['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[hero][lead]" rows="3">{{ $hero['lead'] ?? '' }}</textarea></div>
            </div>

            <h2 class="admin-section-title">Our story</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[story][eyebrow]" value="{{ $story['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[story][title]" value="{{ $story['title'] ?? '' }}"></div>
                @foreach ($paragraphs as $index => $paragraph)
                    <div class="admin-field admin-field--full">
                        <label>Paragraph {{ $index + 1 }}</label>
                        <textarea name="sections[story][paragraphs][{{ $index }}]" rows="3">{{ $paragraph }}</textarea>
                    </div>
                @endforeach
            </div>

            <h2 class="admin-section-title">Beliefs</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[beliefs][eyebrow]" value="{{ $beliefs['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[beliefs][title]" value="{{ $beliefs['title'] ?? '' }}"></div>
            </div>
            @foreach ($beliefItems as $index => $item)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field"><label>Belief {{ $index + 1 }} title</label><input type="text" name="sections[beliefs][items][{{ $index }}][title]" value="{{ $item['title'] ?? '' }}"></div>
                    <div class="admin-field admin-field--full"><label>Body</label><textarea name="sections[beliefs][items][{{ $index }}][body]" rows="2">{{ $item['body'] ?? '' }}</textarea></div>
                </div>
            @endforeach

            <h2 class="admin-section-title">How we work</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[focus][eyebrow]" value="{{ $focus['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[focus][title]" value="{{ $focus['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[focus][lead]" rows="3">{{ $focus['lead'] ?? '' }}</textarea></div>
                @foreach ($points as $index => $point)
                    <div class="admin-field admin-field--full">
                        <label>Point {{ $index + 1 }}</label>
                        <input type="text" name="sections[focus][points][{{ $index }}]" value="{{ $point }}">
                    </div>
                @endforeach
            </div>

            <h2 class="admin-section-title">CTA</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[cta][eyebrow]" value="{{ $cta['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[cta][title]" value="{{ $cta['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[cta][lead]" rows="2">{{ $cta['lead'] ?? '' }}</textarea></div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-btn">Save about content</button>
            </div>
        </form>
    </section>
@endsection
