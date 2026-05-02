<?php

namespace App\Traits;

use App\Services\SEOService;

trait SEOTraits
{
    /**
     * Boot the SEO trait.
     */
    protected static function bootSEOTraits()
    {
        static::saving(function ($model) {
            if (method_exists($model, 'autoGenerateSEO')) {
                $model->autoGenerateSEO();
            }
        });
    }

    /**
     * Auto-generate SEO fields for the model.
     */
    public function autoGenerateSEO(): void
    {
        SEOService::autoGenerateSEO($this);
    }

    /**
     * Get the SEO title.
     */
    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: $this->generateDefaultSeoTitle();
    }

    /**
     * Get the SEO description.
     */
    public function getSeoDescriptionAttribute(): string
    {
        return $this->meta_description ?: $this->generateDefaultSeoDescription();
    }

    /**
     * Get the full canonical URL.
     */
    public function getFullCanonicalUrlAttribute(): string
    {
        if ($this->canonical_url) {
            return str_starts_with($this->canonical_url, 'http') 
                ? $this->canonical_url 
                : url($this->canonical_url);
        }
        
        return $this->generateDefaultCanonicalUrl();
    }

    /**
     * Generate default SEO title.
     */
    protected function generateDefaultSeoTitle(): string
    {
        $title = $this->title ?? '';
        
        if (method_exists($this, 'getLocationAttribute') && $this->location) {
            $title .= ' in ' . $this->location;
        }
        
        return $title . ' | ' . config('app.name');
    }

    /**
     * Generate default SEO description.
     */
    protected function generateDefaultSeoDescription(): string
    {
        $content = $this->description ?? $this->title ?? '';
        
        return SEOService::generateMetaDescription($content);
    }

    /**
     * Generate default canonical URL.
     */
    protected function generateDefaultCanonicalUrl(): string
    {
        $slug = $this->slug ?? $this->id;
        $routeName = $this->getRouteName();
        
        return route($routeName, $slug);
    }

    /**
     * Get the route name for the model.
     */
    protected function getRouteName(): string
    {
        $modelName = strtolower(class_basename(static::class));
        
        return match($modelName) {
            'project' => 'projects.show',
            'unit' => 'units.show',
            'blog' => 'blog.show',
            default => $modelName . '.show'
        };
    }

    /**
     * Get SEO data for the model.
     */
    public function getSeoData(): array
    {
        return SEOService::generateSEOData($this);
    }

    /**
     * Check if the model should be indexed.
     */
    public function shouldBeIndexed(): bool
    {
        if (method_exists($this, 'isAvailable')) {
            return $this->isAvailable();
        }
        
        if (isset($this->status)) {
            return in_array($this->status, ['available', 'published', 'active']);
        }
        
        return true;
    }

    /**
     * Get robots meta tag content.
     */
    public function getRobotsAttribute(): string
    {
        return $this->shouldBeIndexed() ? 'index,follow' : 'noindex,nofollow';
    }
}
