<div class="admin-form-grid">
    <div class="admin-field admin-field--full">
        <label for="quote">Quote</label>
        <textarea id="quote" name="quote" rows="5" required>{{ old('quote', $testimonial->quote ?? '') }}</textarea>
        @error('quote')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="author_name">Author name</label>
        <input id="author_name" type="text" name="author_name" value="{{ old('author_name', $testimonial->author_name ?? '') }}" required>
        @error('author_name')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="author_role">Author role <span>(optional)</span></label>
        <input id="author_role" type="text" name="author_role" value="{{ old('author_role', $testimonial->author_role ?? '') }}" placeholder="Founder, Northline Analytics">
        @error('author_role')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="draft" @selected(old('status', $testimonial->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $testimonial->status ?? 'draft') === 'published')>Published</option>
        </select>
        @error('status')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="admin-field">
        <label for="sort_order">Sort order</label>
        <input id="sort_order" type="number" name="sort_order" min="0" max="9999" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
        <p class="admin-help">Lower numbers appear first.</p>
        @error('sort_order')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>
</div>
