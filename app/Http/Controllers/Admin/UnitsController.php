<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UnitsController extends Controller
{
    /**
     * Display a listing of units.
     */
    public function index(Request $request)
    {
        $query = Unit::with(['project', 'displayImage']);

        // Filter by project
        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
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
                  ->orWhereHas('project', function ($projectQuery) use ($search) {
                      $projectQuery->where('location', 'LIKE', "%{$search}%");
                  });
            });
        }

        $units = $query->latest()->paginate(15);
        $projects = Project::pluck('title_en', 'id');

        return view('admin.units.index', [
            'units' => $units,
            'projects' => $projects,
            'pageTitle' => 'Units'
        ]);
    }

    /**
     * Show the form for creating a new unit.
     */
    public function create()
    {
        $projects = Project::pluck('title_en', 'id');
        
        return view('admin.units.create', [
            'projects' => $projects,
            'pageTitle' => 'Create Unit'
        ]);
    }

    /**
     * Store a newly created unit in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'status' => 'required|in:available,sold,reserved',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'display_image_id' => 'nullable|exists:media,id',
        ]);

        $unit = Unit::create([
            'project_id' => $request->project_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'display_image_id' => $request->display_image_id,
        ]);

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit created successfully!');
    }

    /**
     * Display the specified unit.
     */
    public function show(Unit $unit)
    {
        $unit->load([
            'project',
            'displayImage',
            'media' => function ($query) {
                $query->orderBy('order');
            }
        ]);

        return view('admin.units.show', [
            'unit' => $unit,
            'pageTitle' => 'Unit Details'
        ]);
    }

    /**
     * Show the form for editing the specified unit.
     */
    public function edit(Unit $unit)
    {
        $projects = Project::pluck('title_en', 'id');

        return view('admin.units.edit', [
            'unit' => $unit,
            'projects' => $projects,
            'pageTitle' => 'Edit Unit'
        ]);
    }

    /**
     * Update the specified unit in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'status' => 'required|in:available,sold,reserved',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'display_image_id' => 'nullable|exists:media,id',
        ]);

        $unit->update([
            'project_id' => $request->project_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'slug' => Str::slug($request->title_en),
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'display_image_id' => $request->display_image_id,
        ]);

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit updated successfully!');
    }

    /**
     * Remove the specified unit from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit deleted successfully!');
    }

    /**
     * Toggle unit status.
     */
    public function toggleStatus(Unit $unit)
    {
        $newStatus = $unit->status === 'available' ? 'sold' : 'available';
        $unit->update(['status' => $newStatus]);

        return redirect()
            ->back()
            ->with('success', "Unit status updated to {$newStatus}!");
    }
}
