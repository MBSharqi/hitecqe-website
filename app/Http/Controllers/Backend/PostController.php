<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StorePostRequest;
use App\Http\Requests\Backend\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->latest()
            ->simplePaginate(12);

        return view('backend.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('backend.posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image']);
        $data['slug'] = Post::makeSlug($data['title']);
        $data['published_at'] = $this->resolvePublishedAt($data['status'], $data['published_at'] ?? null);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeCover($request->file('cover_image'));
        }

        Post::create($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        return view('backend.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image', 'remove_cover']);
        $data['slug'] = Post::makeSlug($data['title'], $post->id);
        $data['published_at'] = $this->resolvePublishedAt(
            $data['status'],
            $data['published_at'] ?? null,
            $post->published_at
        );

        if ($request->boolean('remove_cover')) {
            $this->deleteStoredCover($post);
            $data['cover_image'] = null;
        }

        if ($request->hasFile('cover_image')) {
            $this->deleteStoredCover($post);
            $data['cover_image'] = $this->storeCover($request->file('cover_image'));
        }

        $post->update($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->deleteStoredCover($post);
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    private function storeCover(UploadedFile $file): string
    {
        return $file->store('posts/covers', 'public');
    }

    private function deleteStoredCover(Post $post): void
    {
        if ($post->isStoredCover()) {
            Storage::disk('public')->delete($post->cover_image);
        }
    }

    private function resolvePublishedAt(string $status, ?string $publishedAt, mixed $existing = null): mixed
    {
        if ($status !== 'published') {
            return null;
        }

        if ($publishedAt) {
            return $publishedAt;
        }

        return $existing ?: now();
    }
}
