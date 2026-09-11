@extends('layouts.backend')

@section('title', 'Edit Testimonial')
@section('eyebrow', 'Home')
@section('heading', 'Edit testimonial')

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.testimonials.index') }}" class="admin-link-back">← Back to testimonials</a>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" class="admin-form">
            @csrf
            @method('PUT')
            @include('backend.testimonials._form')
            <div class="form-actions">
                <button type="submit" class="admin-btn">Save changes</button>
            </div>
        </form>
    </section>
@endsection
