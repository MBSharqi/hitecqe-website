@extends('layouts.backend')

@section('title', 'New Project')
@section('eyebrow', 'Portfolio')
@section('heading', 'Create project')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.projects.index') }}" class="admin-link-back">← Back to projects</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.projects.store') }}" class="admin-form" enctype="multipart/form-data">
            @csrf
            @include('backend.projects._form')
            <div class="form-actions">
                <button type="submit" class="admin-btn">Create project</button>
            </div>
        </form>
    </section>
@endsection
