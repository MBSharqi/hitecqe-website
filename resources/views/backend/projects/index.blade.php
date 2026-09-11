@extends('layouts.backend')

@section('title', 'Projects')
@section('eyebrow', 'Portfolio')
@section('heading', 'Projects')

@section('content')
    <div class="admin-actions admin-actions--split">
        <p class="admin-help">Manage portfolio projects shown on the public website.</p>
        <a href="{{ route('admin.projects.create') }}" class="admin-btn">New project</a>
    </div>

    <section class="admin-panel">
        @if ($projects->isEmpty())
            <p class="admin-empty">No projects yet. Add your first client project.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Featured</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <span class="admin-badge {{ $project->status === 'published' ? 'admin-badge--new' : '' }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project) }}">{{ $project->title }}</a>
                                </td>
                                <td>{{ $project->sort_order }}</td>
                                <td>{{ $project->is_featured ? 'Yes' : '—' }}</td>
                                <td class="admin-table__actions">
                                    @if ($project->status === 'published')
                                        <a href="{{ route('portfolio') }}" target="_blank" rel="noopener">View</a>
                                    @endif
                                    <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
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
                {{ $projects->links() }}
            </div>
        @endif
    </section>
@endsection
