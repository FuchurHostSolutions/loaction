<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::query();

        if ($search = $request->input('q')) {
            $query->search($search);
        }

        if ($category = $request->input('kategori')) {
            $query->category($category);
        }

        if ($status = $request->input('status')) {
            if ($status === 'published') {
                $query->where('is_published', true);
            } elseif ($status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $posts = $query->latest()->paginate(10)->withQueryString();
        $categories = Post::CATEGORIES;

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create(): View
    {
        $categories = Post::CATEGORIES;

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'category'         => ['required', 'string', Rule::in(Post::CATEGORIES)],
            'excerpt'          => ['nullable', 'string', 'max:600'],
            'content'          => ['required', 'string'],
            'cover_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'cover_image_url'  => ['nullable', 'url', 'max:500'],
            'author_name'      => ['nullable', 'string', 'max:255'],
            'published_at'     => ['nullable', 'date'],
            'is_published'     => ['nullable', 'boolean'],
        ]);

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        // Ensure unique slug
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $coverImage = null;
        if ($request->hasFile('cover_image_file')) {
            $uploadPath = public_path('uploads/posts');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('cover_image_file');
            $fileName = 'post_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $coverImage = $fileName;
        } elseif (!empty($validated['cover_image_url'])) {
            $coverImage = $validated['cover_image_url'];
        }

        $isPublished = $request->boolean('is_published', true);
        $publishedAt = $validated['published_at'] ?? ($isPublished ? now() : null);

        $post = Post::create([
            'title'        => $validated['title'],
            'slug'         => $slug,
            'category'     => $validated['category'],
            'excerpt'      => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160),
            'content'      => $validated['content'],
            'cover_image'  => $coverImage,
            'author_name'  => $validated['author_name'] ?: 'Tim Psikolog LoAction',
            'reading_time' => Post::estimateReadingTime($validated['content']),
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
            'views_count'  => 0,
        ]);

        ActivityLog::record(
            action: 'post.create',
            description: "Membuat postingan baru: '{$post->title}' dalam kategori '{$post->category}'.",
            actionType: 'master_data',
            subject: $post
        );

        return redirect()->route('admin.posts.index')->with('success', 'Postingan artikel berhasil diterbitkan.');
    }

    public function edit(int $id): View
    {
        $post = Post::findOrFail($id);
        $categories = Post::CATEGORIES;

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'category'         => ['required', 'string', Rule::in(Post::CATEGORIES)],
            'excerpt'          => ['nullable', 'string', 'max:600'],
            'content'          => ['required', 'string'],
            'cover_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'cover_image_url'  => ['nullable', 'url', 'max:500'],
            'author_name'      => ['nullable', 'string', 'max:255'],
            'published_at'     => ['nullable', 'date'],
            'is_published'     => ['nullable', 'boolean'],
        ]);

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $coverImage = $post->cover_image;
        if ($request->hasFile('cover_image_file')) {
            // Delete old file if stored locally
            if (!empty($post->cover_image) && !Str::startsWith($post->cover_image, ['http://', 'https://'])) {
                $oldPath = public_path('uploads/posts/' . $post->cover_image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $uploadPath = public_path('uploads/posts');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('cover_image_file');
            $fileName = 'post_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $coverImage = $fileName;
        } elseif (!empty($validated['cover_image_url'])) {
            $coverImage = $validated['cover_image_url'];
        }

        $isPublished = $request->boolean('is_published');
        $publishedAt = $validated['published_at'] ?? ($isPublished && !$post->published_at ? now() : $post->published_at);

        $post->update([
            'title'        => $validated['title'],
            'slug'         => $slug,
            'category'     => $validated['category'],
            'excerpt'      => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160),
            'content'      => $validated['content'],
            'cover_image'  => $coverImage,
            'author_name'  => $validated['author_name'] ?: 'Tim Psikolog LoAction',
            'reading_time' => Post::estimateReadingTime($validated['content']),
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
        ]);

        ActivityLog::record(
            action: 'post.update',
            description: "Memperbarui postingan: '{$post->title}' (ID #{$post->id}).",
            actionType: 'master_data',
            subject: $post
        );

        return redirect()->route('admin.posts.index')->with('success', 'Postingan artikel berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $title = $post->title;
        $postId = $post->id;

        // Delete local cover image file if exists
        if (!empty($post->cover_image) && !Str::startsWith($post->cover_image, ['http://', 'https://'])) {
            $oldPath = public_path('uploads/posts/' . $post->cover_image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        $post->delete();

        ActivityLog::record(
            action: 'post.delete',
            description: "Menghapus postingan: '{$title}' (ID #{$postId}).",
            actionType: 'master_data'
        );

        return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil dihapus.');
    }
}
