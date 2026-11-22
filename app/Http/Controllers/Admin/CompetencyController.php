<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Competency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompetencyController extends Controller
{
    public function index(): View
    {
        $competencies = Competency::orderBy('sort_order')->get();

        return view('admin.competencies.index', compact('competencies'));
    }

    public function create(): View
    {
        return view('admin.competencies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'role'       => ['required', 'string', 'max:255'],
            'text'       => ['required', 'string'],
            'icon'       => ['nullable', 'string', 'max:20'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $competency = Competency::create([
            'role'       => $validated['role'],
            'text'       => $validated['text'],
            'icon'       => $validated['icon'] ?: '👤',
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active', true),
        ]);

        ActivityLog::record(
            action: 'competency.create',
            description: "Menambahkan skema kompetensi baru: '{$competency->role}'.",
            actionType: 'master_data',
            subject: $competency
        );

        return redirect()->route('admin.competencies.index')->with('success', 'Skema kompetensi baru berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $competency = Competency::findOrFail($id);

        return view('admin.competencies.edit', compact('competency'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $competency = Competency::findOrFail($id);

        $validated = $request->validate([
            'role'       => ['required', 'string', 'max:255'],
            'text'       => ['required', 'string'],
            'icon'       => ['nullable', 'string', 'max:20'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $competency->update([
            'role'       => $validated['role'],
            'text'       => $validated['text'],
            'icon'       => $validated['icon'] ?: '👤',
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ]);

        ActivityLog::record(
            action: 'competency.update',
            description: "Memperbarui skema kompetensi: '{$competency->role}'.",
            actionType: 'master_data',
            subject: $competency
        );

        return redirect()->route('admin.competencies.index')->with('success', 'Skema kompetensi berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $competency = Competency::findOrFail($id);
        $role = $competency->role;
        $competencyId = $competency->id;
        $competency->delete();

        ActivityLog::record(
            action: 'competency.delete',
            description: "Menghapus skema kompetensi: '{$role}' (ID #{$competencyId}).",
            actionType: 'master_data'
        );

        return redirect()->route('admin.competencies.index')->with('success', 'Skema kompetensi berhasil dihapus.');
    }
}
