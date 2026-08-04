<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        return view('frontend.portfolio.index');
    }
}
