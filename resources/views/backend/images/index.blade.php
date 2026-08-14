@extends('layouts.backend')

@section('title', 'Page images')
@section('eyebrow', 'Media')
@section('heading', 'Page images')

@section('content')
    <p class="admin-help admin-help--block">Upload or replace photos for each page. If a slot is empty, the public site shows a “No image” placeholder. Blog covers are managed under Posts.</p>

    @foreach ($pages as $page)
        <section class="admin-panel image-page">
            <div class="admin-panel__head">
                <h2>{{ $page['label'] }}</h2>
            </div>

            <div class="image-slots">
                @foreach ($page['slots'] as $slot => $meta)
                    @php
                        $record = $images->get($slot);
                        $hasImage = $record && $record->path;
                    @endphp
                    <article class="image-slot">
                        <div class="image-slot__preview">
                            <img
                                src="{{ $hasImage ? $record->url() : asset(config('site_images.placeholder')) }}"
                                alt="{{ $meta['label'] }}"
                                class="{{ $hasImage ? '' : 'is-placeholder' }}"
                            >
                        </div>
                        <div class="image-slot__body">
                            <h3>{{ $meta['label'] }}</h3>
                            <p>{{ $meta['hint'] }}</p>
                            <form method="POST" action="{{ route('admin.images.update', $slot) }}" enctype="multipart/form-data" class="image-slot__form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="_slot" value="{{ $slot }}">
                                <input type="file" name="image" accept="image/jpeg,image/png,image/webp" required>
                                @error('image')
                                    @if (old('_slot') === $slot)
                                        <p class="admin-error">{{ $message }}</p>
                                    @endif
                                @enderror
                                <button type="submit" class="admin-btn">{{ $hasImage ? 'Replace' : 'Upload' }}</button>
                            </form>
                            @if ($hasImage)
                                <form method="POST" action="{{ route('admin.images.destroy', $slot) }}" onsubmit="return confirm('Remove this image? The placeholder will show on the site.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn--danger">Delete</button>
                                </form>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endforeach
@endsection
