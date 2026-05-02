<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::with(['units', 'mainImage'])
            ->latest()
            ->paginate(10);

        return view('admin.projects.index', [
            'projects' => $projects,
            'pageTitle' => 'Projects'
        ]);
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create', [
            'pageTitle' => 'Create Project'
        ]);
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'location' => 'required|string|max:255',
            'status' => 'required|in:available,sold_out,coming_soon',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|string|max:255',
            'main_image_id' => 'nullable|exists:media,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = Project::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'location' => $request->location,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'canonical_url' => $request->canonical_url,
            'main_image_id' => $request->main_image_id,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects', 'public');
                $url = Storage::url($path);
                
                $media = Media::create([
                    'mediable_type' => Project::class,
                    'mediable_id' => $project->id,
                    'type' => 'image',
                    'collection' => 'gallery',
                    'url' => $url,
                    'title' => $image->getClientOriginalName(),
                    'order' => $index,
                ]);

                // Set first image as main image if not already set
                if ($index === 0 && !$project->main_image_id) {
                    $project->update(['main_image_id' => $media->id]);
                }
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        $project->load([
            'units' => function ($query) {
                $query->with('displayImage');
            },
            'mainImage',
            'media' => function ($query) {
                $query->orderBy('order');
            }
        ]);

        return view('admin.projects.show', [
            'project' => $project,
            'pageTitle' => 'Project Details'
        ]);
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'pageTitle' => 'Edit Project'
        ]);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'location' => 'required|string|max:255',
            'status' => 'required|in:available,sold_out,coming_soon',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|string|max:255',
            'main_image_id' => 'nullable|exists:media,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'location' => $request->location,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'canonical_url' => $request->canonical_url,
            'main_image_id' => $request->main_image_id,
        ]);

        // Handle additional image uploads
        if ($request->hasFile('images')) {
            $currentMaxOrder = $project->media()->max('order') ?? 0;
            
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects', 'public');
                $url = Storage::url($path);
                
                Media::create([
                    'mediable_type' => Project::class,
                    'mediable_id' => $project->id,
                    'type' => 'image',
                    'collection' => 'gallery',
                    'url' => $url,
                    'title' => $image->getClientOriginalName(),
                    'order' => $currentMaxOrder + $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        // Check if project has units
        if ($project->units()->exists()) {
            return redirect()
                ->route('admin.projects.index')
                ->with('error', 'Cannot delete project with existing units. Please delete units first.');
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    /**
     * Toggle project status.
     */
    public function toggleStatus(Project $project)
    {
        $newStatus = $project->status === 'available' ? 'sold_out' : 'available';
        $project->update(['status' => $newStatus]);

        return redirect()
            ->back()
            ->with('success', "Project status updated to {$newStatus}!");
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Project $project)
    {
        $project->update(['featured' => !$project->featured]);

        return redirect()
            ->back()
            ->with('success', 'Project featured status updated!');
    }
}
