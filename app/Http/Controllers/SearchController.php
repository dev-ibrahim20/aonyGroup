<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Project;
use App\Models\Unit;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    /**
     * Search projects with filters.
     */
    public function searchProjects(SearchRequest $request)
    {
        $query = $request->getSearchQuery();
        $filters = $request->getFilters();
        
        $projects = SearchService::searchProjects($query, $filters);
        
        // Apply sorting
        $projects = $this->applySorting($projects, $request->get('sort'));
        
        // Paginate results
        $perPage = $request->get('per_page', 12);
        $results = $projects->paginate($perPage);
        
        // Return JSON for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'data' => $results->items(),
                'meta' => [
                    'current_page' => $results->currentPage(),
                    'last_page' => $results->lastPage(),
                    'per_page' => $results->perPage(),
                    'total' => $results->total(),
                ],
                'filters' => $filters,
                'query' => $query,
            ]);
        }
        
        // Return view for web requests
        return view('projects.search', [
            'projects' => $results,
            'filters' => $filters,
            'query' => $query,
            'filterOptions' => SearchService::getFilterOptions(),
        ]);
    }

    /**
     * Search units with filters.
     */
    public function searchUnits(SearchRequest $request)
    {
        $query = $request->getSearchQuery();
        $filters = $request->getFilters();
        
        $units = SearchService::searchUnits($query, $filters);
        
        // Apply sorting
        $units = $this->applySorting($units, $request->get('sort'));
        
        // Paginate results
        $perPage = $request->get('per_page', 12);
        $results = $units->paginate($perPage);
        
        // Return JSON for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'data' => $results->items(),
                'meta' => [
                    'current_page' => $results->currentPage(),
                    'last_page' => $results->lastPage(),
                    'per_page' => $results->perPage(),
                    'total' => $results->total(),
                ],
                'filters' => $filters,
                'query' => $query,
            ]);
        }
        
        // Return view for web requests
        return view('units.search', [
            'units' => $results,
            'filters' => $filters,
            'query' => $query,
            'filterOptions' => SearchService::getFilterOptions(),
        ]);
    }

    /**
     * Search both projects and units (global search).
     */
    public function globalSearch(SearchRequest $request): JsonResponse
    {
        $query = $request->getSearchQuery();
        $filters = $request->getFilters();
        
        if (!$query) {
            return response()->json([
                'message' => 'Search query is required for global search.',
            ], 422);
        }
        
        // Search projects
        $projects = SearchService::searchProjects($query, $filters)
            ->limit(5)
            ->get(['id', 'title_en', 'title_ar', 'location', 'slug', 'status', 'featured']);
        
        // Search units
        $units = SearchService::searchUnits($query, $filters)
            ->limit(5)
            ->get(['id', 'title_en', 'title_ar', 'project_id', 'price', 'bedrooms', 'bathrooms', 'area', 'status']);
        
        return response()->json([
            'projects' => $projects,
            'units' => $units,
            'query' => $query,
        ]);
    }

    /**
     * Get filter options for dropdowns.
     */
    public function getFilterOptions(): JsonResponse
    {
        return response()->json(SearchService::getFilterOptions());
    }

    /**
     * Get search suggestions (autocomplete).
     */
    public function getSearchSuggestions(Request $request): JsonResponse
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $suggestions = [];
        
        // Project title suggestions
        $projectTitles = Project::where('title_en', 'LIKE', "%{$query}%")
            ->orWhere('title_ar', 'LIKE', "%{$query}%")
            ->limit(5)
            ->pluck('title_en')
            ->toArray();
        
        $suggestions = array_merge($suggestions, $projectTitles);
        
        // Location suggestions
        $locations = Project::where('location', 'LIKE', "%{$query}%")
            ->distinct()
            ->limit(5)
            ->pluck('location')
            ->toArray();
        
        $suggestions = array_merge($suggestions, $locations);
        
        return response()->json(array_unique($suggestions));
    }

    /**
     * Handle SEO-friendly URLs for units.
     */
    public function unitsByFilters(Request $request)
    {
        $url = $request->path();
        $filters = SearchService::parseSeoUrl($url);
        
        // Add default filters
        if (!isset($filters['status'])) {
            $filters['status'] = 'available';
        }
        
        // Create a SearchRequest instance
        $searchRequest = SearchRequest::createFrom($request);
        $searchRequest->merge($filters);
        
        return $this->searchUnits($searchRequest);
    }

    /**
     * Handle SEO-friendly URLs for projects.
     */
    public function projectsByFilters(Request $request)
    {
        $url = $request->path();
        $filters = SearchService::parseSeoUrl($url);
        
        // Create a SearchRequest instance
        $searchRequest = SearchRequest::createFrom($request);
        $searchRequest->merge($filters);
        
        return $this->searchProjects($searchRequest);
    }

    /**
     * Apply sorting to query.
     */
    private function applySorting($query, ?string $sort)
    {
        if (!$sort) {
            return $query->latest();
        }
        
        return match($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'area_asc' => $query->orderBy('area', 'asc'),
            'area_desc' => $query->orderBy('area', 'desc'),
            'bedrooms_asc' => $query->orderBy('bedrooms', 'asc'),
            'bedrooms_desc' => $query->orderBy('bedrooms', 'desc'),
            'newest' => $query->latest(),
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };
    }
}
