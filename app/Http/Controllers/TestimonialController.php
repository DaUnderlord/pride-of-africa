<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::published()
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        $partners = Partner::published()
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $featuredTestimonials = $testimonials->where('is_featured', true);
        $otherTestimonials = $testimonials->where('is_featured', false);

        return view('testimonials.index', compact(
            'featuredTestimonials',
            'otherTestimonials',
            'partners'
        ));
    }
}
