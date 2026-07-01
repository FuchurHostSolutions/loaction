<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(): View
    {
        return view('pages.profil', [
            ...$this->sharedData(),
            'testimonials' => Testimonial::active()->ordered()->get(),
        ]);
    }
}
