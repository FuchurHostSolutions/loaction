<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $activeCategory = $request->input('kategori');

        $query = Post::published()->latest('published_at');

        if (!empty($search)) {
            $query->search($search);
        }

        if (!empty($activeCategory) && $activeCategory !== 'Semua') {
            $query->category($activeCategory);
        }

        // Category counts
        $categoryCounts = [];
        foreach (Post::CATEGORIES as $cat) {
            $categoryCounts[$cat] = Post::published()->where('category', $cat)->count();
        }
        $totalPublished = Post::published()->count();

        // Get featured post (only on first page when not filtering by search)
        $featuredPost = null;
        if (blank($search) && (blank($activeCategory) || $activeCategory === 'Semua') && $request->input('page', 1) == 1) {
            $featuredPost = (clone $query)->first();
            if ($featuredPost) {
                $query->where('id', '!=', $featuredPost->id);
            }
        }

        $posts = $query->paginate(9)->withQueryString();

        return view('pages.posts.index', [
            'posts'          => $posts,
            'featuredPost'   => $featuredPost,
            'categories'     => Post::CATEGORIES,
            'activeCategory' => $activeCategory ?: 'Semua',
            'search'         => $search,
            'categoryCounts' => $categoryCounts,
            'totalPublished' => $totalPublished,
        ]);
    }

    public function show(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        // Increment view count safely
        $post->increment('views_count');

        // Fetch related posts (same category first, otherwise latest)
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedPosts->count() < 3) {
            $excludeIds = $relatedPosts->pluck('id')->push($post->id)->all();
            $morePosts = Post::published()
                ->whereNotIn('id', $excludeIds)
                ->latest('published_at')
                ->take(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($morePosts);
        }

        return view('pages.posts.show', [
            'post'         => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
