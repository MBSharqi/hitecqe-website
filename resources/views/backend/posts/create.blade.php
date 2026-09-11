@extends('layouts.backend')

@section('title', 'New Post')
@section('eyebrow', 'Blog')
@section('heading', 'Create post')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.posts.index') }}" class="admin-link-back">← Back to posts</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.posts.store') }}" class="admin-form" enctype="multipart/form-data">
            @csrf
            @include('backend.posts._form')
            <div class="form-actions">
                <button type="submit" class="admin-btn">Create post</button>
            </div>
        </form>
    </section>
@endsection
