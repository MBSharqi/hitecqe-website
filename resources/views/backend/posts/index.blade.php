@extends('layouts.backend')

@section('title', 'Posts')
@section('eyebrow', 'Blog')
@section('heading', 'Posts')

@section('content')
    <div class="admin-actions admin-actions--split">
        <p class="admin-help">Create and publish articles for the public blog.</p>
        <a href="{{ route('admin.posts.create') }}" class="admin-btn">New post</a>
    </div>

    <section class="admin-panel">
        @if ($posts->isEmpty())
            <p class="admin-empty">No posts yet. Create your first article.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <span class="admin-badge {{ $post->status === 'published' ? 'admin-badge--new' : '' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a>
                                </td>
                                <td>{{ $post->published_at?->format('M j, Y') ?: '—' }}</td>
                                <td class="admin-table__actions">
                                    @if ($post->status === 'published')
                                        <a href="{{ route('blog.show', $post) }}" target="_blank" rel="noopener">View</a>
                                    @endif
                                    <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="admin-pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </section>
@endsection
