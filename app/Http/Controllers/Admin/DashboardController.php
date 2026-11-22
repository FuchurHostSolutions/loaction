<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audience;
use App\Models\Competency;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_consultations'     => Consultation::count(),
            'pending_consultations'   => Consultation::where('status', 'pending')->count(),
            'processed_consultations' => Consultation::where('status', 'processed')->count(),
            'total_services'          => Service::count(),
            'total_audiences'         => Audience::count(),
            'total_competencies'      => Competency::count(),
            'total_testimonials'      => Testimonial::count(),
        ];

        $recentConsultations = Consultation::with('service')
            ->latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentConsultations'));
    }
}
