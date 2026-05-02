<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title_en',
        'title_ar',
        'slug',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'status',
        'description_en',
        'description_ar',
        'meta_title',
        'meta_description',
        'display_image_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area' => 'decimal:2',
    ];

    /**
     * Get the project that owns the unit.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the media for the unit.
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get the images for the unit.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'image');
    }

    /**
     * Get the videos for the unit.
     */
    public function videos(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'video');
    }

    /**
     * Get the 360 media for the unit.
     */
    public function media360(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', '360');
    }

    /**
     * Get the thumbnail for the unit.
     */
    public function thumbnail()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'image')->where('collection', 'thumbnail')->orderBy('order');
    }

    /**
     * Get the floor plans for the unit.
     */
    public function floorPlans()
    {
        return $this->morphMany(Media::class, 'mediable')->where('collection', 'floor_plan')->ordered();
    }

    /**
     * Get the display image relationship.
     */
    public function displayImage()
    {
        return $this->belongsTo(Media::class, 'display_image_id');
    }

    /**
     * Get the display image (thumbnail, then first gallery image).
     */
    public function getDisplayImageAttribute()
    {
        // First try the display_image_id relationship
        if ($this->display_image_id) {
            return $this->belongsTo(Media::class, 'display_image_id')->first();
        }
        
        // Then try thumbnail
        if ($this->thumbnail) {
            return $this->thumbnail;
        }
        
        // Finally, try first gallery image
        return $this->images()->ordered()->first();
    }

    /**
     * Get the SEO-friendly URL.
     */
    public function getUrlAttribute()
    {
        return route('units.show', [$this->project->slug, $this->slug]);
    }

    /**
     * Check if unit is sold.
     */
    public function isSold()
    {
        return $this->status === 'sold';
    }

    /**
     * Check if unit is reserved.
     */
    public function isReserved()
    {
        return $this->status === 'reserved';
    }

    /**
     * Check if unit is available.
     */
    public function isAvailable()
    {
        return $this->status === 'available';
    }

    /**
     * Get available units.
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Get units by price range.
     */
    public function scopePriceRange($query, $min, $max = null)
    {
        $query->where('price', '>=', $min);
        
        if ($max) {
            $query->where('price', '<=', $max);
        }
        
        return $query;
    }

    /**
     * Get units by bedroom count.
     */
    public function scopeBedrooms($query, $bedrooms)
    {
        return $query->where('bedrooms', $bedrooms);
    }

    /**
     * Get units by bathroom count.
     */
    public function scopeBathrooms($query, $bathrooms)
    {
        return $query->where('bathrooms', $bathrooms);
    }

    /**
     * Get formatted price.
     */
    public function getFormattedPriceAttribute()
    {
        return number_format((float) $this->price, 2);
    }

    /**
     * Get price per square meter.
     */
    public function getPricePerMeterAttribute()
    {
        return $this->area > 0 ? $this->price / $this->area : 0;
    }
}
