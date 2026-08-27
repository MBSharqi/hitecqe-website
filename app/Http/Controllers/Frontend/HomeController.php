<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::query()
            ->published()
            ->ordered()
            ->get();

        return view('frontend.home.index', compact('testimonials'));
    }
}
