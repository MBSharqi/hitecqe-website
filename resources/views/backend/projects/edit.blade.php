@extends('layouts.backend')

@section('title', 'Edit Project')
@section('eyebrow', 'Portfolio')
@section('heading', 'Edit project')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.projects.index') }}" class="admin-link-back">← Back to projects</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="admin-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.projects._form')
            <div class="form-actions">
                <button type="submit" class="admin-btn">Save changes</button>
            </div>
        </form>
    </section>
@endsection
