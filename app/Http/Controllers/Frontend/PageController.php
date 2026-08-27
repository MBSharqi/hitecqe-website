<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('frontend.about.index');
    }

    public function services(): View
    {
        return view('frontend.services.index');
    }

    public function portfolio(): View
    {
        $published = Project::query()
            ->published()
            ->ordered()
            ->get();

        $featured = $published->firstWhere('is_featured', true) ?? $published->first();
        $projects = $published
            ->when($featured, fn ($items) => $items->where('id', '!=', $featured->id))
            ->values();

        return view('frontend.portfolio.index', compact('featured', 'projects'));
    }
}
