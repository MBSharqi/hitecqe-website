@extends('layouts.backend')

@section('title', 'Edit Post')
@section('eyebrow', 'Blog')
@section('heading', 'Edit post')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.posts.index') }}" class="admin-link-back">← Back to posts</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" class="admin-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.posts._form', ['post' => $post])
            <div class="form-actions">
                <button type="submit" class="admin-btn">Save changes</button>
            </div>
        </form>
    </section>
@endsection
