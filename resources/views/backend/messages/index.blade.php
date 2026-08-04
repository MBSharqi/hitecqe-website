@extends('layouts.backend')

@section('title', 'Messages')
@section('eyebrow', 'Inbox')
@section('heading', 'Contact messages')

@section('content')
    <section class="admin-panel">
        @if ($messages->isEmpty())
            <p class="admin-empty">No messages yet. When someone submits the contact form, it will appear here.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>
                                    <span class="admin-badge {{ $message->status === 'new' ? 'admin-badge--new' : '' }}">
                                        {{ ucfirst($message->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.messages.show', $message) }}">{{ $message->name }}</a>
                                </td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at->format('M j, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="admin-pagination">
                {{ $messages->links() }}
            </div>
        @endif
    </section>
@endsection
