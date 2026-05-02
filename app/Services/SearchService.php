<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    /**
     * Full-text search for projects.
     */
    public static function searchProjects(string $query = null, array $filters = []): Builder
    {
        $projects = Project::query();

        // Eager load relationships to avoid N+1
        $projects->with([
            'mainImage',
            'units' => function ($query) {
                $query->available()->select('id', 'project_id', 'price', 'bedrooms', 'bathrooms', 'area');
            }
        ]);

        // Full-text search
        if ($query) {
            $projects->where(function ($q) use ($query) {
                $q->where('title_en', 'LIKE', "%{$query}%")
                  ->orWhere('title_ar', 'LIKE', "%{$query}%")
                  ->orWhere('location', 'LIKE', "%{$query}%")
                  ->orWhere('description_en', 'LIKE', "%{$query}%")
                  ->orWhere('description_ar', 'LIKE', "%{$query}%");
            });
        }

        // Apply filters
        self::applyProjectFilters($projects, $filters);

        return $projects;
    }

    /**
     * Full-text search for units.
     */
    public static function searchUnits(string $query = null, array $filters = []): Builder
    {
        $units = Unit::query();

        // Eager load relationships to avoid N+1
        $units->with([
            'project:id,title_en,title_ar,location,slug',
            'displayImage'
        ]);

        // Full-text search
        if ($query) {
            $units->where(function ($q) use ($query) {
                $q->where('title_en', 'LIKE', "%{$query}%")
                  ->orWhere('title_ar', 'LIKE', "%{$query}%")
                  ->orWhere('description_en', 'LIKE', "%{$query}%")
                  ->orWhere('description_ar', 'LIKE', "%{$query}%")
                  ->orWhereHas('project', function ($projectQuery) use ($query) {
                      $projectQuery->where('location', 'LIKE', "%{$query}%");
                  });
            });
        }

        // Apply filters
        self::applyUnitFilters($units, $filters);

        return $units;
    }

    /**
     * Apply project-specific filters.
     */
    private static function applyProjectFilters(Builder $query, array $filters): void
    {
        // Location filter
        if (!empty($filters['location'])) {
            $query->where('location', 'LIKE', "%{$filters['location']}%");
        }

        // Status filter
        if (!empty($filters['status'])) {
            if (is_array($filters['status'])) {
                $query->whereIn('status', $filters['status']);
            } else {
                $query->where('status', $filters['status']);
            }
        }

        // Featured filter
        if (isset($filters['featured'])) {
            $query->where('featured', $filters['featured']);
        }

        // Price range filter (based on units)
        if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
            $query->whereHas('units', function ($unitQuery) use ($filters) {
                if (!empty($filters['price_min'])) {
                    $unitQuery->where('price', '>=', $filters['price_min']);
                }
                if (!empty($filters['price_max'])) {
                    $unitQuery->where('price', '<=', $filters['price_max']);
                }
            });
        }

        // Area range filter (based on units)
        if (!empty($filters['area_min']) || !empty($filters['area_max'])) {
            $query->whereHas('units', function ($unitQuery) use ($filters) {
                if (!empty($filters['area_min'])) {
                    $unitQuery->where('area', '>=', $filters['area_min']);
                }
                if (!empty($filters['area_max'])) {
                    $unitQuery->where('area', '<=', $filters['area_max']);
                }
            });
        }

        // Bedrooms filter
        if (!empty($filters['bedrooms'])) {
            $query->whereHas('units', function ($unitQuery) use ($filters) {
                if (is_array($filters['bedrooms'])) {
                    $unitQuery->whereIn('bedrooms', $filters['bedrooms']);
                } else {
                    $unitQuery->where('bedrooms', $filters['bedrooms']);
                }
            });
        }

        // Bathrooms filter
        if (!empty($filters['bathrooms'])) {
            $query->whereHas('units', function ($unitQuery) use ($filters) {
                if (is_array($filters['bathrooms'])) {
                    $unitQuery->whereIn('bathrooms', $filters['bathrooms']);
                } else {
                    $unitQuery->where('bathrooms', $filters['bathrooms']);
                }
            });
        }
    }

    /**
     * Apply unit-specific filters.
     */
    private static function applyUnitFilters(Builder $query, array $filters): void
    {
        // Project filter
        if (!empty($filters['project_id'])) {
            $query->where('project_id', $filters['project_id']);
        }

        // Project slug filter
        if (!empty($filters['project_slug'])) {
            $query->whereHas('project', function ($projectQuery) use ($filters) {
                $projectQuery->where('slug', $filters['project_slug']);
            });
        }

        // Price range filter
        if (!empty($filters['price_min'])) {
            $query->where('price', '>=', $filters['price_min']);
        }

        if (!empty($filters['price_max'])) {
            $query->where('price', '<=', $filters['price_max']);
        }

        // Area range filter
        if (!empty($filters['area_min'])) {
            $query->where('area', '>=', $filters['area_min']);
        }

        if (!empty($filters['area_max'])) {
            $query->where('area', '<=', $filters['area_max']);
        }

        // Bedrooms filter
        if (!empty($filters['bedrooms'])) {
            if (is_array($filters['bedrooms'])) {
                $query->whereIn('bedrooms', $filters['bedrooms']);
            } else {
                $query->where('bedrooms', $filters['bedrooms']);
            }
        }

        // Bathrooms filter
        if (!empty($filters['bathrooms'])) {
            if (is_array($filters['bathrooms'])) {
                $query->whereIn('bathrooms', $filters['bathrooms']);
            } else {
                $query->where('bathrooms', $filters['bathrooms']);
            }
        }

        // Status filter
        if (!empty($filters['status'])) {
            if (is_array($filters['status'])) {
                $query->whereIn('status', $filters['status']);
            } else {
                $query->where('status', $filters['status']);
            }
        }

        // Default to available units if no status specified
        if (!isset($filters['status'])) {
            $query->where('status', 'available');
        }
    }

    /**
     * Get filter options for dropdowns.
     */
    public static function getFilterOptions(): array
    {
        return [
            'price_ranges' => [
                '0-100000' => 'Under $100,000',
                '100000-200000' => '$100,000 - $200,000',
                '200000-300000' => '$200,000 - $300,000',
                '300000-500000' => '$300,000 - $500,000',
                '500000+' => 'Over $500,000',
            ],
            'area_ranges' => [
                '0-50' => 'Under 50 m²',
                '50-100' => '50 - 100 m²',
                '100-150' => '100 - 150 m²',
                '150-200' => '150 - 200 m²',
                '200+' => 'Over 200 m²',
            ],
            'bedrooms' => [1, 2, 3, 4, 5],
            'bathrooms' => [1, 2, 3, 4],
            'statuses' => [
                'available' => 'Available',
                'sold_out' => 'Sold Out',
                'coming_soon' => 'Coming Soon',
                'reserved' => 'Reserved',
            ],
            'locations' => Project::distinct()->pluck('location')->filter()->sort()->values(),
        ];
    }

    /**
     * Parse price range string.
     */
    public static function parsePriceRange(string $range): array
    {
        $parts = explode('-', $range);
        
        return [
            'min' => $parts[0] === '' ? null : (int) $parts[0],
            'max' => ($parts[1] ?? '') === '+' ? null : (int) ($parts[1] ?? null),
        ];
    }

    /**
     * Parse area range string.
     */
    public static function parseAreaRange(string $range): array
    {
        $parts = explode('-', $range);
        
        return [
            'min' => $parts[0] === '' ? null : (int) $parts[0],
            'max' => ($parts[1] ?? '') === '+' ? null : (int) ($parts[1] ?? null),
        ];
    }

    /**
     * Build SEO-friendly URL from filters.
     */
    public static function buildSeoUrl(array $filters, string $type = 'units'): string
    {
        $segments = [];
        
        if ($type === 'units') {
            // Add bedrooms to URL
            if (!empty($filters['bedrooms'])) {
                $bedrooms = is_array($filters['bedrooms']) ? implode('-', $filters['bedrooms']) : $filters['bedrooms'];
                $segments[] = "{$bedrooms}-bedrooms";
            }
            
            // Add area range to URL
            if (!empty($filters['area_min']) || !empty($filters['area_max'])) {
                $areaMin = $filters['area_min'] ?? 0;
                $areaMax = $filters['area_max'] ?? 'plus';
                $segments[] = "{$areaMin}-{$areaMax}m";
            }
            
            // Add price range to URL
            if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
                $priceMin = $filters['price_min'] ?? 0;
                $priceMax = $filters['price_max'] ?? 'plus';
                $segments[] = "{$priceMin}-{$priceMax}";
            }
        }
        
        return '/' . $type . '/' . implode('/', $segments);
    }

    /**
     * Parse SEO-friendly URL to filters.
     */
    public static function parseSeoUrl(string $url): array
    {
        $filters = [];
        $segments = explode('/', trim($url, '/'));
        
        // Skip the first segment (type)
        array_shift($segments);
        
        foreach ($segments as $segment) {
            if (str_contains($segment, '-bedrooms')) {
                $bedrooms = str_replace('-bedrooms', '', $segment);
                $filters['bedrooms'] = str_contains($bedrooms, '-') ? explode('-', $bedrooms) : (int) $bedrooms;
            } elseif (str_ends_with($segment, 'm')) {
                $areaRange = str_replace('m', '', $segment);
                [$min, $max] = explode('-', $areaRange);
                $filters['area_min'] = $max === 'plus' ? null : (int) $min;
                $filters['area_max'] = $max === 'plus' ? null : (int) $max;
            } elseif (is_numeric($segment) || str_contains($segment, '-')) {
                // Assume it's a price range
                $priceRange = str_replace('+', 'plus', $segment);
                [$min, $max] = explode('-', $priceRange);
                $filters['price_min'] = $max === 'plus' ? null : (int) $min;
                $filters['price_max'] = $max === 'plus' ? null : (int) $max;
            }
        }
        
        return $filters;
    }
}
