<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use Illuminate\View\View;

class UjiKompetensiController extends Controller
{
    public function index(): View
    {
        return view('pages.uji-kompetensi', [
            ...$this->sharedData(),
            'competencies' => Competency::active()->ordered()->get(),
        ]);
    }
}
