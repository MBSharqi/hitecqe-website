@extends('layouts.backend')

@section('title', 'Dashboard')
@section('eyebrow', 'Overview')
@section('heading', 'Dashboard')

@section('content')
    <div class="admin-stats">
        <article class="admin-stat">
            <span>Total messages</span>
            <strong>{{ $totalMessages }}</strong>
        </article>
        <article class="admin-stat">
            <span>New messages</span>
            <strong>{{ $newMessages }}</strong>
        </article>
        <article class="admin-stat">
            <span>Total posts</span>
            <strong>{{ $totalPosts }}</strong>
        </article>
        <article class="admin-stat">
            <span>Published posts</span>
            <strong>{{ $publishedPosts }}</strong>
        </article>
    </div>

    <section class="admin-panel">
        <div class="admin-panel__head">
            <h2>Latest messages</h2>
            <a href="{{ route('admin.messages.index') }}">View all</a>
        </div>

        @if ($latestMessages->isEmpty())
            <p class="admin-empty">No contact messages yet.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestMessages as $message)
                            <tr>
                                <td>
                                    <span class="admin-badge {{ $message->status === 'new' ? 'admin-badge--new' : '' }}">
                                        {{ ucfirst($message->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.messages.show', $message) }}">{{ $message->name }}</a>
                                </td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at->format('M j, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
