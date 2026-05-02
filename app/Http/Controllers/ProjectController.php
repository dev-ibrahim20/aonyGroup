<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::available()->featured()->paginate(12);
        
        // SEO data for listing page
        $seoData = [
            'title' => 'Projects - ' . config('app.name'),
            'description' => 'Browse our exclusive collection of luxury properties and real estate projects.',
            'canonical_url' => route('projects.index'),
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Real Estate Projects',
                'description' => 'Browse our exclusive collection of luxury properties',
                'url' => route('projects.index'),
                'mainEntity' => $projects->getCollection()->map(function ($project) {
                    return [
                        '@type' => 'RealEstateListing',
                        'name' => $project->title,
                        'url' => $project->full_canonical_url,
                        'image' => $project->display_image?->full_url ?? '',
                    ];
                })->toArray(),
            ],
        ];
        
        return view('projects.index', compact('projects', 'seoData'));
    }

    /**
     * Display the specified project.
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        // SEO is automatically handled by the SEOMeta component
        return view('projects.show', compact('project'));
    }
}
