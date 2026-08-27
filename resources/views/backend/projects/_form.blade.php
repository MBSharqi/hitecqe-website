@php
    $project = $project ?? null;
@endphp

<div class="admin-form-grid">
    <div class="admin-field admin-field--full">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required>
        @error('title')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" required>{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="tags">Tags <span>(optional)</span></label>
        <input id="tags" type="text" name="tags" value="{{ old('tags', $project->tags ?? '') }}" placeholder="Laravel · Dashboard · UI design">
        <p class="admin-help">Use dots or commas to separate tags.</p>
        @error('tags')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="focus">Focus <span>(optional)</span></label>
        <input id="focus" type="text" name="focus" value="{{ old('focus', $project->focus ?? '') }}" placeholder="Product design · Laravel app">
        @error('focus')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="outcome">Outcome <span>(optional)</span></label>
        <input id="outcome" type="text" name="outcome" value="{{ old('outcome', $project->outcome ?? '') }}" placeholder="Faster insight workflows">
        @error('outcome')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="cover_image">Cover image</label>
        @if ($project?->cover_url)
            <div class="admin-cover-preview">
                <img src="{{ $project->cover_url }}" alt="Current cover" width="480" height="270" class="{{ $project->hasCoverImage() ? '' : 'is-placeholder' }}">
            </div>
        @endif
        <input id="cover_image" type="file" name="cover_image" accept="image/jpeg,image/png,image/webp">
        <p class="admin-help">JPG, PNG, or WebP. Max 4MB. Without an image, the no-image placeholder is shown.</p>
        @error('cover_image')
            <p class="admin-error">{{ $message }}</p>
        @enderror
        @if ($project?->cover_image)
            <label class="admin-check">
                <input type="checkbox" name="remove_cover" value="1" @checked(old('remove_cover'))>
                <span>Remove current cover image</span>
            </label>
        @endif
    </div>

    <div class="admin-field">
        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="draft" @selected(old('status', $project->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $project->status ?? 'draft') === 'published')>Published</option>
        </select>
        @error('status')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="sort_order">Sort order</label>
        <input id="sort_order" type="number" name="sort_order" min="0" max="9999" value="{{ old('sort_order', $project->sort_order ?? 0) }}">
        <p class="admin-help">Lower numbers appear first.</p>
        @error('sort_order')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label class="admin-check">
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))>
            <span>Featured project (shown first on the portfolio page)</span>
        </label>
        @error('is_featured')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>
</div>
