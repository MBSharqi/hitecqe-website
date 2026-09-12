@extends('layouts.backend')

@section('title', 'New Testimonial')
@section('eyebrow', 'Home')
@section('heading', 'Create testimonial')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.testimonials.index') }}" class="admin-link-back">← Back to testimonials</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" class="admin-form">
            @csrf
            @include('backend.testimonials._form')
            <div class="form-actions">
                <button type="submit" class="admin-btn">Create testimonial</button>
            </div>
        </form>
    </section>
@endsection
