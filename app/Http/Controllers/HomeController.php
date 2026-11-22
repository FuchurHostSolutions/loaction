<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Models\Competency;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Cache data beranda selama 1 jam untuk meningkatkan kecepatan server (TTFB)
        $cachedData = Cache::remember('loaction_public_home', 3600, function () {
            return [
                'services'     => Service::active()->ordered()->with('items')->get(),
                'testimonials' => Testimonial::active()->ordered()->get(),
                'audiences'    => Audience::active()->ordered()->get(),
                'competencies' => Competency::active()->ordered()->get(),
                'latestPosts'  => Post::published()->latest('published_at')->take(3)->get(),
            ];
        });

        return view('pages.home', [
            ...$this->sharedData(),
            ...$cachedData,
        ]);
    }

    public function sitemap(): Response
    {
        $posts = Post::published()->latest('updated_at')->get();
        $xml = view('pages.sitemap', compact('posts'))->render();

        return response($xml, 200, [
            'Content-Type'  => 'application/xml; charset=utf-8',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
