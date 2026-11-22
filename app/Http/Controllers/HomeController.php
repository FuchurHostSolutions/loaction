<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Models\Competency;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            ...$this->sharedData(),
            'services'     => Service::active()->ordered()->with('items')->get(),
            'testimonials' => Testimonial::active()->ordered()->get(),
            'audiences'    => Audience::active()->ordered()->get(),
            'competencies' => Competency::active()->ordered()->get(),
        ]);
    }
}
