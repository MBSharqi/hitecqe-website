<div class="admin-form-grid">
    <div class="admin-field admin-field--full">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required>
        @error('title')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="excerpt">Excerpt</label>
        <textarea id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="body">Body</label>
        <textarea id="body" name="body" rows="12" required>{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field admin-field--full">
        <label for="cover_image">Cover image</label>
        @if ($post?->cover_url)
            <div class="admin-cover-preview">
                <img src="{{ $post->cover_url }}" alt="Current cover" width="480" height="270">
            </div>
        @endif
        <input id="cover_image" type="file" name="cover_image" accept="image/jpeg,image/png,image/webp">
        <p class="admin-help">JPG, PNG, or WebP. Max 4MB.</p>
        @error('cover_image')
            <p class="admin-error">{{ $message }}</p>
        @enderror
        @if ($post?->cover_image)
            <label class="admin-check">
                <input type="checkbox" name="remove_cover" value="1" @checked(old('remove_cover'))>
                <span>Remove current cover image</span>
            </label>
        @endif
    </div>

    <div class="admin-field">
        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? 'draft') === 'published')>Published</option>
        </select>
        @error('status')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="published_at">Publish date <span>(optional)</span></label>
        <p class="admin-help">Leave empty to publish immediately. Future dates publish right away as well.</p>
        <input
            id="published_at"
            type="datetime-local"
            name="published_at"
            value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
        >
        @error('published_at')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>
</div>
