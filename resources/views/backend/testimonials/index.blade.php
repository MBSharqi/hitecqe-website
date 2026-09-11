@extends('layouts.backend')

@section('title', 'Testimonials')
@section('eyebrow', 'Home')
@section('heading', 'Testimonials')

@section('content')
    <div class="admin-actions admin-actions--split">
        <p class="admin-help">Client quotes shown on the homepage. Publish only real feedback when ready.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="admin-btn">New testimonial</a>
    </div>

    <section class="admin-panel">
        @if ($testimonials->isEmpty())
            <p class="admin-empty">No testimonials yet. Add your first client quote.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Quote</th>
                            <th>Order</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <span class="admin-badge {{ $testimonial->status === 'published' ? 'admin-badge--new' : '' }}">
                                        {{ ucfirst($testimonial->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}">{{ $testimonial->author_name }}</a>
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($testimonial->quote, 70) }}</td>
                                <td>{{ $testimonial->sort_order }}</td>
                                <td class="admin-table__actions">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
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
                {{ $testimonials->links() }}
            </div>
        @endif
    </section>
@endsection
