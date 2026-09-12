<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('frontend.home.index', [
            'content' => PageContent::page('home'),
            'testimonials' => Testimonial::query()
                ->published()
                ->ordered()
                ->get(),
        ]);
    }
}
