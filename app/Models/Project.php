<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'description_en',
        'description_ar',
        'location',
        'status',
        'featured',
        'meta_title',
        'meta_description',
        'canonical_url',
        'main_image_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    /**
     * Get the units for the project.
     */
    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Get the leads for the project.
     */
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Get the media for the project.
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get the images for the project.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'image');
    }

    /**
     * Get the videos for the project.
     */
    public function videos(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'video');
    }

    /**
     * Get the 360 media for the project.
     */
    public function media360(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', '360');
    }

    /**
     * Get the main image for the project.
     */
    public function mainImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'main_image_id');
    }

    /**
     * Get the featured image for the project.
     */
    public function featuredImage()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'image')->where('collection', 'gallery')->orderBy('order');
    }

    /**
     * Get the thumbnail for the project.
     */
    public function thumbnail()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'image')->where('collection', 'thumbnail')->orderBy('order');
    }

    /**
     * Get the gallery images for the project.
     */
    public function gallery()
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'image')->where('collection', 'gallery')->ordered();
    }

    /**
     * Get the floor plans for the project.
     */
    public function floorPlans()
    {
        return $this->morphMany(Media::class, 'mediable')->where('collection', 'floor_plan')->ordered();
    }

    /**
     * Get available projects.
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Get featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get the title based on locale.
     */
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    /**
     * Get the description based on locale.
     */
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    /**
     * Get the display image (main image, then thumbnail, then featured).
     */
    public function getDisplayImageAttribute()
    {
        return $this->mainImage ?: $this->thumbnail ?: $this->featuredImage;
    }

    /**
     * Get the full canonical URL.
     */
    public function getFullCanonicalUrlAttribute()
    {
        if ($this->canonical_url) {
            return str_starts_with($this->canonical_url, 'http') 
                ? $this->canonical_url 
                : url($this->canonical_url);
        }
        
        return route('projects.show', $this->slug);
    }

    /**
     * Check if project is sold out.
     */
    public function isSoldOut()
    {
        return $this->status === 'sold_out';
    }

    /**
     * Check if project is coming soon.
     */
    public function isComingSoon()
    {
        return $this->status === 'coming_soon';
    }

    /**
     * Check if project is available.
     */
    public function isAvailable()
    {
        return $this->status === 'available';
    }

    /**
     * Get SEO meta title.
     */
    public function getSeoTitleAttribute()
    {
        return $this->meta_title ?: $this->title;
    }

    /**
     * Get SEO meta description.
     */
    public function getSeoDescriptionAttribute()
    {
        return $this->meta_description ?: Str::limit(strip_tags($this->description), 160);
    }
}
