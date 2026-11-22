<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Audience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AudienceController extends Controller
{
    public function index(): View
    {
        $audiences = Audience::orderBy('sort_order')->get();

        return view('admin.audiences.index', compact('audiences'));
    }

    public function create(): View
    {
        return view('admin.audiences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'      => ['required', 'string', 'max:255'],
            'text'       => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $audience = Audience::create([
            'title'      => $validated['title'],
            'text'       => $validated['text'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active', true),
        ]);

        ActivityLog::record(
            action: 'audience.create',
            description: "Menambahkan target audiens baru: '{$audience->title}'.",
            actionType: 'master_data',
            subject: $audience
        );

        return redirect()->route('admin.audiences.index')->with('success', 'Target audiens baru berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $audience = Audience::findOrFail($id);

        return view('admin.audiences.edit', compact('audience'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $audience = Audience::findOrFail($id);

        $validated = $request->validate([
            'title'      => ['required', 'string', 'max:255'],
            'text'       => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $audience->update([
            'title'      => $validated['title'],
            'text'       => $validated['text'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ]);

        ActivityLog::record(
            action: 'audience.update',
            description: "Memperbarui target audiens: '{$audience->title}'.",
            actionType: 'master_data',
            subject: $audience
        );

        return redirect()->route('admin.audiences.index')->with('success', 'Target audiens berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $audience = Audience::findOrFail($id);
        $title = $audience->title;
        $audienceId = $audience->id;
        $audience->delete();

        ActivityLog::record(
            action: 'audience.delete',
            description: "Menghapus target audiens: '{$title}' (ID #{$audienceId}).",
            actionType: 'master_data'
        );

        return redirect()->route('admin.audiences.index')->with('success', 'Target audiens berhasil dihapus.');
    }
}
