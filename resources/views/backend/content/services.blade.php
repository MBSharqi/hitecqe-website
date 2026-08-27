@extends('layouts.backend')

@section('title', 'Services Content')
@section('eyebrow', 'Pages')
@section('heading', 'Services content')

@section('content')
    @php
        $hero = old('sections.hero', $content['hero'] ?? []);
        $engineering = old('sections.engineering', $content['engineering'] ?? []);
        $design = old('sections.design', $content['design'] ?? []);
        $offerings = old('sections.offerings', $content['offerings'] ?? []);
        $process = old('sections.process', $content['process'] ?? []);
        $cta = old('sections.cta', $content['cta'] ?? []);
        $engPoints = $engineering['points'] ?? [];
        $designPoints = $design['points'] ?? [];
        $offeringItems = $offerings['items'] ?? [];
        $steps = $process['steps'] ?? [];
        while (count($engPoints) < 4) { $engPoints[] = ''; }
        while (count($designPoints) < 4) { $designPoints[] = ''; }
        while (count($offeringItems) < 3) { $offeringItems[] = ['title' => '', 'body' => '']; }
        while (count($steps) < 4) { $steps[] = ['title' => '', 'body' => '']; }
    @endphp

    <div class="admin-actions">
        <p class="admin-help">Edit Services page text. Images stay under Page images.</p>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.content.update', 'services') }}" class="admin-form">
            @csrf
            @method('PUT')

            <h2 class="admin-section-title">Hero</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[hero][eyebrow]" value="{{ $hero['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[hero][title]" value="{{ $hero['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[hero][lead]" rows="3">{{ $hero['lead'] ?? '' }}</textarea></div>
            </div>

            <h2 class="admin-section-title">Engineering</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[engineering][eyebrow]" value="{{ $engineering['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[engineering][title]" value="{{ $engineering['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[engineering][lead]" rows="3">{{ $engineering['lead'] ?? '' }}</textarea></div>
                @foreach ($engPoints as $index => $point)
                    <div class="admin-field admin-field--full">
                        <label>Point {{ $index + 1 }}</label>
                        <input type="text" name="sections[engineering][points][{{ $index }}]" value="{{ $point }}">
                    </div>
                @endforeach
            </div>

            <h2 class="admin-section-title">Design</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[design][eyebrow]" value="{{ $design['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[design][title]" value="{{ $design['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[design][lead]" rows="3">{{ $design['lead'] ?? '' }}</textarea></div>
                @foreach ($designPoints as $index => $point)
                    <div class="admin-field admin-field--full">
                        <label>Point {{ $index + 1 }}</label>
                        <input type="text" name="sections[design][points][{{ $index }}]" value="{{ $point }}">
                    </div>
                @endforeach
            </div>

            <h2 class="admin-section-title">Offerings</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[offerings][eyebrow]" value="{{ $offerings['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[offerings][title]" value="{{ $offerings['title'] ?? '' }}"></div>
            </div>
            @foreach ($offeringItems as $index => $item)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field"><label>Offering {{ $index + 1 }} title</label><input type="text" name="sections[offerings][items][{{ $index }}][title]" value="{{ $item['title'] ?? '' }}"></div>
                    <div class="admin-field admin-field--full"><label>Body</label><textarea name="sections[offerings][items][{{ $index }}][body]" rows="2">{{ $item['body'] ?? '' }}</textarea></div>
                </div>
            @endforeach

            <h2 class="admin-section-title">Process</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[process][eyebrow]" value="{{ $process['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[process][title]" value="{{ $process['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[process][lead]" rows="2">{{ $process['lead'] ?? '' }}</textarea></div>
            </div>
            @foreach ($steps as $index => $step)
                <div class="admin-form-grid admin-form-block">
                    <div class="admin-field"><label>Step {{ $index + 1 }} title</label><input type="text" name="sections[process][steps][{{ $index }}][title]" value="{{ $step['title'] ?? '' }}"></div>
                    <div class="admin-field admin-field--full"><label>Body</label><textarea name="sections[process][steps][{{ $index }}][body]" rows="2">{{ $step['body'] ?? '' }}</textarea></div>
                </div>
            @endforeach

            <h2 class="admin-section-title">CTA</h2>
            <div class="admin-form-grid">
                <div class="admin-field"><label>Eyebrow</label><input type="text" name="sections[cta][eyebrow]" value="{{ $cta['eyebrow'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Title</label><input type="text" name="sections[cta][title]" value="{{ $cta['title'] ?? '' }}"></div>
                <div class="admin-field admin-field--full"><label>Lead</label><textarea name="sections[cta][lead]" rows="2">{{ $cta['lead'] ?? '' }}</textarea></div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-btn">Save services content</button>
            </div>
        </form>
    </section>
@endsection
