<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = Blog::query();

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'LIKE', "%{$search}%")
                  ->orWhere('title_ar', 'LIKE', "%{$search}%")
                  ->orWhere('content_en', 'LIKE', "%{$search}%")
                  ->orWhere('content_ar', 'LIKE', "%{$search}%");
            });
        }

        $blogs = $query->with('featuredImage')->latest()->paginate(15);

        return view('admin.blog.index', [
            'blogs' => $blogs,
            'pageTitle' => 'Blog Posts'
        ]);
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('admin.blog.create', [
            'pageTitle' => 'Create Blog Post'
        ]);
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt_en' => 'nullable|string|max:500',
            'excerpt_ar' => 'nullable|string|max:500',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $blog = Blog::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => $request->slug ?: Str::slug($request->title_en),
            'excerpt_en' => $request->excerpt_en,
            'excerpt_ar' => $request->excerpt_ar,
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'featured_image_id' => $request->featured_image_id,
            'published_at' => $request->published_at ?: ($request->status === 'published' ? now() : null),
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $path = $image->store('blog-featured', 'public');
            
            $media = Media::create([
                'mediable_type' => Blog::class,
                'mediable_id' => $blog->id,
                'type' => 'image',
                'url' => $path,
                'title' => $image->getClientOriginalName(),
                'collection' => 'thumbnail',
                'order' => 0,
            ]);
            
            $blog->update(['featured_image_id' => $media->id]);
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified blog post.
     */
    public function show(Blog $blog)
    {
        $blog->load(['featuredImage', 'media' => function ($query) {
            $query->orderBy('order');
        }]);

        return view('admin.blog.show', [
            'blog' => $blog,
            'pageTitle' => 'Blog Post Details'
        ]);
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        $blog->load('featuredImage');
        
        return view('admin.blog.edit', [
            'blog' => $blog,
            'pageTitle' => 'Edit Blog Post'
        ]);
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt_en' => 'nullable|string|max:500',
            'excerpt_ar' => 'nullable|string|max:500',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $blog->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => $request->slug ?: Str::slug($request->title_en),
            'excerpt_en' => $request->excerpt_en,
            'excerpt_ar' => $request->excerpt_ar,
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'featured_image_id' => $request->featured_image_id,
            'published_at' => $request->published_at ?: ($request->status === 'published' && !$blog->published_at ? now() : $blog->published_at),
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $path = $image->store('blog-featured', 'public');
            
            $media = Media::create([
                'mediable_type' => Blog::class,
                'mediable_id' => $blog->id,
                'type' => 'image',
                'url' => $path,
                'title' => $image->getClientOriginalName(),
                'collection' => 'thumbnail',
                'order' => 0,
            ]);
            
            $blog->update(['featured_image_id' => $media->id]);
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully!');
    }

    /**
     * Toggle blog post status.
     */
    public function toggleStatus(Blog $blog)
    {
        $newStatus = $blog->status === 'published' ? 'draft' : 'published';
        $blog->update([
            'status' => $newStatus,
            'published_at' => $newStatus === 'published' && !$blog->published_at ? now() : null,
        ]);

        return redirect()
            ->back()
            ->with('success', "Blog post status updated to {$newStatus}!");
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Blog $blog)
    {
        $blog->update(['featured' => !$blog->featured]);

        return redirect()
            ->back()
            ->with('success', 'Blog post featured status updated!');
    }
}
