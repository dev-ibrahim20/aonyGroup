<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolio items.
     */
    public function index(Request $request)
    {
        $query = Portfolio::query();

        // Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

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
                  ->orWhere('description_en', 'LIKE', "%{$search}%")
                  ->orWhere('description_ar', 'LIKE', "%{$search}%");
            });
        }

        $portfolios = $query->latest()->paginate(15);

        return view('admin.portfolio.index', [
            'portfolios' => $portfolios,
            'pageTitle' => 'Portfolio'
        ]);
    }

    /**
     * Show the form for creating a new portfolio item.
     */
    public function create()
    {
        return view('admin.portfolio.create', [
            'pageTitle' => 'Create Portfolio Item'
        ]);
    }

    /**
     * Store a newly created portfolio item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'status' => 'required|in:active,inactive,archived',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'main_image_id' => 'nullable|exists:media,id',
        ]);

        $portfolio = Portfolio::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => $request->slug ?: Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'category' => $request->category,
            'client_name' => $request->client_name,
            'project_date' => $request->project_date,
            'technologies' => $request->technologies,
            'project_url' => $request->project_url,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'main_image_id' => $request->main_image_id,
        ]);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio item created successfully!');
    }

    /**
     * Display the specified portfolio item.
     */
    public function show(Portfolio $portfolio)
    {
        $portfolio->load(['mainImage', 'media' => function ($query) {
            $query->orderBy('order');
        }]);

        return view('admin.portfolio.show', [
            'portfolio' => $portfolio,
            'pageTitle' => 'Portfolio Details'
        ]);
    }

    /**
     * Show the form for editing the specified portfolio item.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', [
            'portfolio' => $portfolio,
            'pageTitle' => 'Edit Portfolio Item'
        ]);
    }

    /**
     * Update the specified portfolio item in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'status' => 'required|in:active,inactive,archived',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'main_image_id' => 'nullable|exists:media,id',
        ]);

        $portfolio->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => $request->slug ?: Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'category' => $request->category,
            'client_name' => $request->client_name,
            'project_date' => $request->project_date,
            'technologies' => $request->technologies,
            'project_url' => $request->project_url,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'main_image_id' => $request->main_image_id,
        ]);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Remove the specified portfolio item from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio item deleted successfully!');
    }

    /**
     * Toggle portfolio status.
     */
    public function toggleStatus(Portfolio $portfolio)
    {
        $newStatus = $portfolio->status === 'active' ? 'inactive' : 'active';
        $portfolio->update(['status' => $newStatus]);

        return redirect()
            ->back()
            ->with('success', "Portfolio status updated to {$newStatus}!");
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Portfolio $portfolio)
    {
        $portfolio->update(['featured' => !$portfolio->featured]);

        return redirect()
            ->back()
            ->with('success', 'Portfolio featured status updated!');
    }
}
