<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::with('items')->orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:20'],
            'sort_order'  => ['nullable', 'integer'],
            'items'       => ['nullable', 'string'], // one item per line
        ]);

        $service = Service::create([
            'title'       => $validated['title'],
            'slug'        => Str::slug($validated['title']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'] ?: '✨',
            'sort_order'  => $validated['sort_order'] ?? 0,
            'is_active'   => $request->boolean('is_active', true),
        ]);

        if (! empty($validated['items'])) {
            $lines = array_filter(array_map('trim', explode("\n", $validated['items'])));
            foreach ($lines as $idx => $line) {
                $service->items()->create([
                    'title'      => $line,
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        ActivityLog::record(
            action: 'service.create',
            description: "Menambahkan layanan baru: '{$service->title}'.",
            actionType: 'master_data',
            subject: $service
        );

        return redirect()->route('admin.services.index')->with('success', "Layanan '{$service->title}' berhasil ditambahkan.");
    }

    public function edit(int $id): View
    {
        $service = Service::with('items')->findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:20'],
            'sort_order'  => ['nullable', 'integer'],
            'items'       => ['nullable', 'string'],
        ]);

        $service->update([
            'title'       => $validated['title'],
            'slug'        => Str::slug($validated['title']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'] ?: '✨',
            'sort_order'  => $validated['sort_order'] ?? 0,
            'is_active'   => $request->boolean('is_active'),
        ]);

        if (isset($validated['items'])) {
            $service->items()->delete();
            $lines = array_filter(array_map('trim', explode("\n", $validated['items'])));
            foreach ($lines as $idx => $line) {
                $service->items()->create([
                    'title'      => $line,
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        ActivityLog::record(
            action: 'service.update',
            description: "Memperbarui data layanan: '{$service->title}'.",
            actionType: 'master_data',
            subject: $service
        );

        return redirect()->route('admin.services.index')->with('success', "Layanan '{$service->title}' berhasil diperbarui.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        $title = $service->title;
        $serviceId = $service->id;
        $service->delete();

        ActivityLog::record(
            action: 'service.delete',
            description: "Menghapus layanan: '{$title}' (ID #{$serviceId}).",
            actionType: 'master_data'
        );

        return redirect()->route('admin.services.index')->with('success', "Layanan '{$title}' berhasil dihapus.");
    }
}
