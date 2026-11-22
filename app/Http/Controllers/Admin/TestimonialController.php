<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'quote'      => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $testimonial = Testimonial::create([
            'name'       => $validated['name'],
            'role'       => $validated['role'],
            'quote'      => $validated['quote'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active', true),
        ]);

        ActivityLog::record(
            action: 'testimonial.create',
            description: "Menambahkan testimoni baru dari: '{$testimonial->name}'.",
            actionType: 'master_data',
            subject: $testimonial
        );

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni baru berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'quote'      => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $testimonial->update([
            'name'       => $validated['name'],
            'role'       => $validated['role'],
            'quote'      => $validated['quote'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ]);

        ActivityLog::record(
            action: 'testimonial.update',
            description: "Memperbarui testimoni dari: '{$testimonial->name}'.",
            actionType: 'master_data',
            subject: $testimonial
        );

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $name = $testimonial->name;
        $testimonialId = $testimonial->id;
        $testimonial->delete();

        ActivityLog::record(
            action: 'testimonial.delete',
            description: "Menghapus testimoni dari: '{$name}' (ID #{$testimonialId}).",
            actionType: 'master_data'
        );

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
