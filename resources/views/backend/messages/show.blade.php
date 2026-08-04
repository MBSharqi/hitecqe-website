@extends('layouts.backend')

@section('title', 'Message')
@section('eyebrow', 'Inbox')
@section('heading', $message->subject)

@section('content')
    <div class="admin-actions">
        <a href="{{ route('admin.messages.index') }}" class="admin-link-back">← Back to messages</a>
    </div>

    <section class="admin-panel message-detail">
        <div class="message-detail__meta">
            <div>
                <span>From</span>
                <strong>{{ $message->name }}</strong>
            </div>
            <div>
                <span>Email</span>
                <strong><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></strong>
            </div>
            <div>
                <span>Company</span>
                <strong>{{ $message->company ?: '—' }}</strong>
            </div>
            <div>
                <span>Phone</span>
                <strong>{{ $message->phone ?: '—' }}</strong>
            </div>
            <div>
                <span>Received</span>
                <strong>{{ $message->created_at->format('M j, Y H:i') }}</strong>
            </div>
            <div>
                <span>Status</span>
                <strong>
                    <span class="admin-badge {{ $message->status === 'new' ? 'admin-badge--new' : '' }}">
                        {{ ucfirst($message->status) }}
                    </span>
                </strong>
            </div>
        </div>

        <div class="message-detail__body">
            <h2>Message</h2>
            <p>{{ $message->message }}</p>
        </div>

        @if ($message->status === 'new')
            <form method="POST" action="{{ route('admin.messages.read', $message) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="admin-btn admin-btn--ghost">Mark as read</button>
            </form>
        @endif
    </section>
@endsection
