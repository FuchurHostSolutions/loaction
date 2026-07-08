<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(): View
    {
        return view('pages.layanan', [
            ...$this->sharedData(),
            'services' => Service::active()->ordered()->with('items')->get(),
        ]);
    }
}
