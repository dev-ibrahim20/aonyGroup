<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class SEOCacheService
{
    /**
     * Cache key prefix
     */
    const CACHE_PREFIX = 'seo_';

    /**
     * Cache duration in seconds (24 hours)
     */
    const CACHE_DURATION = 86400;

    /**
     * Get cached SEO data or generate and cache it.
     */
    public static function getCachedSEOData($model): array
    {
        $cacheKey = self::getCacheKey($model);
        
        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($model) {
            return SEOService::generateSEOData($model);
        });
    }

    /**
     * Get cached structured data.
     */
    public static function getCachedStructuredData($model): array
    {
        $cacheKey = self::getStructuredDataCacheKey($model);
        
        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($model) {
            if ($model instanceof \App\Models\Project) {
                return SEOService::generateStructuredData($model);
            } elseif ($model instanceof \App\Models\Unit) {
                return SEOService::generateUnitStructuredData($model);
            }
            
            return [];
        });
    }

    /**
     * Get cached blog SEO data.
     */
    public static function getCachedBlogSEOData($blog): array
    {
        $cacheKey = self::getBlogCacheKey($blog);
        
        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($blog) {
            return SEOService::generateBlogSEOData($blog);
        });
    }

    /**
     * Clear SEO cache for a specific model.
     */
    public static function clearCache($model): void
    {
        $cacheKey = self::getCacheKey($model);
        $structuredDataKey = self::getStructuredDataCacheKey($model);
        
        Cache::forget($cacheKey);
        Cache::forget($structuredDataKey);
    }

    /**
     * Clear all SEO cache.
     */
    public static function clearAllCache(): void
    {
        $prefix = self::CACHE_PREFIX;
        
        // Get all cache keys with SEO prefix
        $keys = Cache::getRedis()?->keys("{$prefix}*") ?? [];
        
        foreach ($keys as $key) {
            Cache::forget($key);
        }
    }

    /**
     * Warm up SEO cache for popular content.
     */
    public static function warmUpCache(): void
    {
        // Warm up featured projects
        $featuredProjects = \App\Models\Project::featured()->limit(10)->get();
        foreach ($featuredProjects as $project) {
            self::getCachedSEOData($project);
            self::getCachedStructuredData($project);
        }

        // Warm up latest blog posts
        $latestPosts = \App\Models\Blog::published()->limit(10)->get();
        foreach ($latestPosts as $post) {
            self::getCachedBlogSEOData($post);
        }
    }

    /**
     * Generate cache key for model.
     */
    private static function getCacheKey($model): string
    {
        $className = class_basename($model);
        return self::CACHE_PREFIX . strtolower($className) . '_' . $model->id;
    }

    /**
     * Generate structured data cache key for model.
     */
    private static function getStructuredDataCacheKey($model): string
    {
        $className = class_basename($model);
        return self::CACHE_PREFIX . 'structured_' . strtolower($className) . '_' . $model->id;
    }

    /**
     * Generate blog cache key.
     */
    private static function getBlogCacheKey($blog): string
    {
        return self::CACHE_PREFIX . 'blog_' . $blog->id;
    }

    /**
     * Check if SEO cache is enabled.
     */
    public static function isEnabled(): bool
    {
        return Config::get('seo.cache.enabled', true);
    }

    /**
     * Get cache duration.
     */
    public static function getCacheDuration(): int
    {
        return Config::get('seo.cache.duration', self::CACHE_DURATION);
    }
}
