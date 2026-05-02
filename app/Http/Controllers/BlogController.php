<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SEOService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = Blog::published()->latest()->paginate(10);
        
        // SEO data for blog listing
        $seoData = [
            'title' => 'Blog - ' . config('app.name'),
            'description' => 'Read our latest articles about real estate, market trends, and property investment tips.',
            'canonical_url' => route('blog.index'),
            'open_graph' => [
                'type' => 'website',
                'title' => 'Blog - ' . config('app.name'),
                'description' => 'Read our latest articles about real estate, market trends, and property investment tips.',
                'url' => route('blog.index'),
                'image' => asset('images/blog-og.jpg'),
            ],
            'twitter_card' => [
                'title' => 'Blog - ' . config('app.name'),
                'description' => 'Read our latest articles about real estate, market trends, and property investment tips.',
                'image' => asset('images/blog-og.jpg'),
            ],
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Real Estate Blog',
                'description' => 'Read our latest articles about real estate, market trends, and property investment tips.',
                'url' => route('blog.index'),
                'mainEntity' => $posts->getCollection()->map(function ($post) {
                    return [
                        '@type' => 'BlogPosting',
                        'headline' => $post->title,
                        'url' => route('blog.show', $post->slug),
                        'datePublished' => $post->created_at->format('Y-m-d'),
                        'image' => $post->featured_image?->url ?? asset('images/blog-default.jpg'),
                    ];
                })->toArray(),
            ],
        ];
        
        return view('blog.index', compact('posts', 'seoData'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->published()->firstOrFail();
        
        // SEO is automatically handled by the SEO service
        $seoData = SEOService::generateBlogSEOData($post);
        
        return view('blog.show', compact('post', 'seoData'));
    }
}
