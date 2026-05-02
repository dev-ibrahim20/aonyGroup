<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Unit;

class SEOService
{
    /**
     * Generate SEO-friendly slug from title.
     */
    public static function generateSlug(string $title, string $modelClass, ?int $excludeId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        // Check uniqueness
        while (self::slugExists($slug, $modelClass, $excludeId)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Check if slug already exists.
     */
    private static function slugExists(string $slug, string $modelClass, ?int $excludeId = null): bool
    {
        $query = $modelClass::where('slug', $slug);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    /**
     * Generate meta title from content.
     */
    public static function generateMetaTitle(string $title, ?string $location = null, int $maxLength = 60): string
    {
        $metaTitle = $title;
        
        if ($location) {
            $metaTitle .= " in {$location}";
        }
        
        return Str::limit($metaTitle, $maxLength, '');
    }

    /**
     * Generate meta description from content.
     */
    public static function generateMetaDescription(string $content, int $maxLength = 160): string
    {
        // Remove HTML tags and extra whitespace
        $cleanContent = strip_tags($content);
        $cleanContent = preg_replace('/\s+/', ' ', $cleanContent);
        $cleanContent = trim($cleanContent);
        
        return Str::limit($cleanContent, $maxLength, '');
    }

    /**
     * Generate canonical URL.
     */
    public static function generateCanonicalUrl(string $slug, string $type = 'project'): string
    {
        $baseUrl = config('app.url');
        
        return match($type) {
            'project' => "{$baseUrl}/projects/{$slug}",
            'unit' => "{$baseUrl}/units/{$slug}",
            'blog' => "{$baseUrl}/blog/{$slug}",
            default => "{$baseUrl}/{$slug}"
        };
    }

    /**
     * Generate Open Graph meta tags.
     */
    public static function generateOpenGraph(array $data): array
    {
        return [
            'og:title' => $data['title'] ?? '',
            'og:description' => $data['description'] ?? '',
            'og:type' => $data['type'] ?? 'website',
            'og:url' => $data['url'] ?? '',
            'og:image' => $data['image'] ?? '',
            'og:site_name' => config('app.name'),
            'og:locale' => app()->getLocale() === 'ar' ? 'ar_AR' : 'en_US',
        ];
    }

    /**
     * Generate Twitter Card meta tags.
     */
    public static function generateTwitterCard(array $data): array
    {
        return [
            'twitter:card' => 'summary_large_image',
            'twitter:title' => $data['title'] ?? '',
            'twitter:description' => $data['description'] ?? '',
            'twitter:image' => $data['image'] ?? '',
            'twitter:site' => '@' . config('app.twitter_handle', 'company'),
        ];
    }

    /**
     * Generate structured data for real estate project.
     */
    public static function generateStructuredData(Project $project): array
    {
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateListing',
            'name' => $project->title,
            'description' => $project->description,
            'url' => $project->full_canonical_url,
            'image' => $project->display_image?->full_url ?? '',
            'location' => [
                '@type' => 'Place',
                'address' => $project->location,
            ],
            'offers' => [
                '@type' => 'AggregateOffer',
                'lowPrice' => $project->units->min('price'),
                'highPrice' => $project->units->max('price'),
                'priceCurrency' => config('app.currency', 'USD'),
            ],
            'datePosted' => $project->created_at->format('Y-m-d'),
            'dateModified' => $project->updated_at->format('Y-m-d'),
        ];

        // Add units as individual offers
        if ($project->units->isNotEmpty()) {
            $structuredData['offers']['offers'] = $project->units->map(function ($unit) {
                return [
                    '@type' => 'Offer',
                    'name' => $unit->title,
                    'description' => $unit->description,
                    'price' => $unit->price,
                    'priceCurrency' => config('app.currency', 'USD'),
                    'availability' => $unit->isAvailable() ? 'https://schema.org/InStock' : 'https://schema.org/SoldOut',
                    'url' => $unit->url ?? '',
                    'image' => $unit->display_image?->full_url ?? '',
                ];
            })->toArray();
        }

        return $structuredData;
    }

    /**
     * Generate structured data for individual unit.
     */
    public static function generateUnitStructuredData(Unit $unit): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Apartment',
            'name' => $unit->title,
            'description' => $unit->description,
            'url' => $unit->url ?? '',
            'image' => $unit->display_image?->full_url ?? '',
            'address' => $unit->project->location,
            'numberOfRooms' => $unit->bedrooms,
            'numberOfBedrooms' => $unit->bedrooms,
            'numberOfBathrooms' => $unit->bathrooms,
            'floorSize' => [
                '@type' => 'QuantitativeValue',
                'value' => $unit->area,
                'unitCode' => 'MTR',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => $unit->price,
                'priceCurrency' => config('app.currency', 'USD'),
                'availability' => $unit->isAvailable() ? 'https://schema.org/InStock' : 'https://schema.org/SoldOut',
                'seller' => [
                    '@type' => 'RealEstateAgent',
                    'name' => config('app.name'),
                    'url' => config('app.url'),
                ],
            ],
        ];
    }

    /**
     * Generate breadcrumb structured data.
     */
    public static function generateBreadcrumbs(array $breadcrumbs): array
    {
        $items = [];
        
        foreach ($breadcrumbs as $index => $breadcrumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url'] ?? '',
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    /**
     * Generate complete SEO data array for any model.
     */
    public static function generateSEOData($model): array
    {
        // Check if caching is enabled
        if (class_exists('App\Services\SEOCacheService') && SEOCacheService::isEnabled()) {
            return SEOCacheService::getCachedSEOData($model);
        }

        return self::generateSEODataWithoutCache($model);
    }

    /**
     * Generate SEO data without caching (internal method).
     */
    private static function generateSEODataWithoutCache($model): array
    {
        $isProject = $model instanceof Project;
        $isUnit = $model instanceof Unit;
        
        $data = [
            'title' => $model->seo_title,
            'description' => $model->seo_description,
            'canonical_url' => $model->full_canonical_url,
            'robots' => $isProject ? ($model->isAvailable() ? 'index,follow' : 'noindex,nofollow') : 'index,follow',
        ];

        // Add image if available
        if ($model->display_image) {
            $data['image'] = $model->display_image->full_url;
        }

        // Add Open Graph
        $data['open_graph'] = self::generateOpenGraph($data);

        // Add Twitter Card
        $data['twitter_card'] = self::generateTwitterCard($data);

        // Add structured data
        if ($isProject) {
            $data['structured_data'] = self::generateStructuredData($model);
        } elseif ($isUnit) {
            $data['structured_data'] = self::generateUnitStructuredData($model);
        }

        // Add breadcrumbs
        if ($isProject) {
            $breadcrumbs = [
                ['name' => __('Home'), 'url' => route('home')],
                ['name' => __('Projects'), 'url' => route('projects.index')],
                ['name' => $model->title, 'url' => $model->full_canonical_url],
            ];
        } elseif ($isUnit) {
            $breadcrumbs = [
                ['name' => __('Home'), 'url' => route('home')],
                ['name' => __('Projects'), 'url' => route('projects.index')],
                ['name' => $model->project->title, 'url' => route('projects.show', $model->project->slug)],
                ['name' => $model->title, 'url' => $model->url],
            ];
        } else {
            $breadcrumbs = [
                ['name' => __('Home'), 'url' => route('home')],
                ['name' => $model->title ?? '', 'url' => $model->full_canonical_url ?? ''],
            ];
        }

        $data['breadcrumbs'] = self::generateBreadcrumbs($breadcrumbs);

        return $data;
    }

    /**
     * Auto-generate SEO fields for model.
     */
    public static function autoGenerateSEO($model): void
    {
        // Generate slug if not provided
        if (!$model->slug && $model->title) {
            $model->slug = self::generateSlug($model->title, get_class($model), $model->id);
        }

        // Generate meta title if not provided
        if (!$model->meta_title && $model->title) {
            $location = $model->location ?? null;
            $model->meta_title = self::generateMetaTitle($model->title, $location);
        }

        // Generate meta description if not provided
        if (!$model->meta_description && $model->description) {
            $model->meta_description = self::generateMetaDescription($model->description);
        }

        // Generate canonical URL if not provided and it's a project
        if (method_exists($model, 'full_canonical_url') && !$model->canonical_url) {
            $model->canonical_url = $model->full_canonical_url;
        }
    }

    /**
     * Generate SEO data for blog posts.
     */
    public static function generateBlogSEOData($blog): array
    {
        return [
            'title' => $blog->seo_title ?? $blog->title,
            'description' => $blog->seo_description ?? self::generateMetaDescription($blog->content),
            'canonical_url' => route('blog.show', $blog->slug),
            'robots' => 'index,follow',
            'image' => $blog->featured_image?->url ?? asset('images/blog-default.jpg'),
            'open_graph' => self::generateOpenGraph([
                'title' => $blog->title,
                'description' => $blog->seo_description ?? self::generateMetaDescription($blog->content),
                'type' => 'article',
                'url' => route('blog.show', $blog->slug),
                'image' => $blog->featured_image?->url ?? asset('images/blog-default.jpg'),
            ]),
            'twitter_card' => self::generateTwitterCard([
                'title' => $blog->title,
                'description' => $blog->seo_description ?? self::generateMetaDescription($blog->content),
                'image' => $blog->featured_image?->url ?? asset('images/blog-default.jpg'),
            ]),
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $blog->title,
                'description' => $blog->seo_description ?? self::generateMetaDescription($blog->content),
                'image' => $blog->featured_image?->url ?? asset('images/blog-default.jpg'),
                'author' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('images/logo.png'),
                    ],
                ],
                'datePublished' => $blog->created_at->format('Y-m-d'),
                'dateModified' => $blog->updated_at->format('Y-m-d'),
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('blog.show', $blog->slug),
                ],
            ],
            'breadcrumbs' => self::generateBreadcrumbs([
                ['name' => __('Home'), 'url' => route('home')],
                ['name' => __('Blog'), 'url' => route('blog.index')],
                ['name' => $blog->title, 'url' => route('blog.show', $blog->slug)],
            ]),
        ];
    }
}
