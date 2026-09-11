<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('backend.dashboard.index', [
            'totalMessages' => ContactMessage::count(),
            'newMessages' => ContactMessage::query()->where('status', 'new')->count(),
            'totalPosts' => Post::count(),
            'publishedPosts' => Post::query()->published()->count(),
            'latestMessages' => ContactMessage::query()
                ->latest()
                ->limit(5)
                ->get(),
        ]);
    }
}
