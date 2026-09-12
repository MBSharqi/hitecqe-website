<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProjectRequest;
use App\Http\Requests\Backend\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->ordered()
            ->simplePaginate(12);

        return view('backend.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('backend.projects.create', ['project' => null]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image']);
        $data['slug'] = Project::makeSlug($data['title']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeCover($request->file('cover_image'));
        }

        if (! empty($data['is_featured'])) {
            Project::clearFeatured();
        }

        Project::create($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('backend.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image', 'remove_cover']);
        $data['slug'] = Project::makeSlug($data['title'], $project->id);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $previousCover = null;

        if ($request->boolean('remove_cover')) {
            $previousCover = $project->isStoredCover() ? $project->cover_image : null;
            $data['cover_image'] = null;
        }

        if ($request->hasFile('cover_image')) {
            $previousCover = $project->isStoredCover() ? $project->cover_image : null;
            $data['cover_image'] = $this->storeCover($request->file('cover_image'));
        }

        if (! empty($data['is_featured'])) {
            Project::clearFeatured($project->id);
        }

        $project->update($data);

        if ($previousCover) {
            Storage::disk('public')->delete($previousCover);
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteStoredCover($project);
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function storeCover(UploadedFile $file): string
    {
        return $file->store('projects/covers', 'public');
    }

    private function deleteStoredCover(Project $project): void
    {
        if ($project->isStoredCover()) {
            Storage::disk('public')->delete($project->cover_image);
        }
    }
}
