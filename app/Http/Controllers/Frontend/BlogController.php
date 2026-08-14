<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->published()
            ->latest('published_at')
            ->simplePaginate(6);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        abort_unless($post->isPubliclyVisible(), 404);

        return view('frontend.blog.show', compact('post'));
    }
}
