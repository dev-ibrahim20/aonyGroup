<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'mediable_type',
        'mediable_id',
        'type',
        'collection',
        'url',
        'title',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get the parent mediable model.
     */
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get images only.
     */
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    /**
     * Get videos only.
     */
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    /**
     * Get 360 media only.
     */
    public function scopeMedia360($query)
    {
        return $query->where('type', '360');
    }

    /**
     * Get gallery media only.
     */
    public function scopeGallery($query)
    {
        return $query->where('collection', 'gallery');
    }

    /**
     * Get thumbnails only.
     */
    public function scopeThumbnails($query)
    {
        return $query->where('collection', 'thumbnail');
    }

    /**
     * Get documents only.
     */
    public function scopeDocuments($query)
    {
        return $query->where('collection', 'document');
    }

    /**
     * Get floor plans only.
     */
    public function scopeFloorPlans($query)
    {
        return $query->where('collection', 'floor_plan');
    }

    /**
     * Get media by collection.
     */
    public function scopeByCollection($query, $collection)
    {
        return $query->where('collection', $collection);
    }

    /**
     * Get media by model type.
     */
    public function scopeByModel($query, $modelClass)
    {
        return $query->where('mediable_type', $modelClass);
    }

    /**
     * Get media ordered by order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get media ordered descending.
     */
    public function scopeOrderedDesc($query)
    {
        return $query->orderBy('order', 'desc');
    }

    /**
     * Check if media is an image.
     */
    public function isImage()
    {
        return $this->type === 'image';
    }

    /**
     * Check if media is a video.
     */
    public function isVideo()
    {
        return $this->type === 'video';
    }

    /**
     * Check if media is 360.
     */
    public function is360()
    {
        return $this->type === '360';
    }

    /**
     * Get file extension from URL.
     */
    public function getFileExtensionAttribute()
    {
        return pathinfo($this->url, PATHINFO_EXTENSION);
    }

    /**
     * Get file name from URL.
     */
    public function getFileNameAttribute()
    {
        return pathinfo($this->url, PATHINFO_FILENAME);
    }

    /**
     * Get full URL with protocol.
     */
    public function getFullUrlAttribute()
    {
        if (str_starts_with($this->url, 'http')) {
            return $this->url;
        }
        
        return url($this->url);
    }

    /**
     * Check if media is a gallery item.
     */
    public function isGallery()
    {
        return $this->collection === 'gallery';
    }

    /**
     * Check if media is a thumbnail.
     */
    public function isThumbnail()
    {
        return $this->collection === 'thumbnail';
    }

    /**
     * Check if media is a document.
     */
    public function isDocument()
    {
        return $this->collection === 'document';
    }

    /**
     * Check if media is a floor plan.
     */
    public function isFloorPlan()
    {
        return $this->collection === 'floor_plan';
    }

    /**
     * Get collection display name.
     */
    public function getCollectionDisplayNameAttribute()
    {
        return match($this->collection) {
            'gallery' => 'Gallery',
            'thumbnail' => 'Thumbnail',
            'video' => 'Video',
            '360' => '360° View',
            'document' => 'Document',
            'floor_plan' => 'Floor Plan',
            default => 'Other'
        };
    }

    /**
     * Get type display name.
     */
    public function getTypeDisplayNameAttribute()
    {
        return match($this->type) {
            'image' => 'Image',
            'video' => 'Video',
            '360' => '360° View',
            default => 'Other'
        };
    }

    /**
     * Get media size (if it's a local file).
     */
    public function getSizeAttribute()
    {
        if (str_starts_with($this->url, 'http')) {
            return null;
        }
        
        $path = public_path($this->url);
        return file_exists($path) ? filesize($path) : null;
    }

    /**
     * Get formatted file size.
     */
    public function getFormattedSizeAttribute()
    {
        $size = $this->size;
        
        if (!$size) {
            return null;
        }
        
        $units = ['B', 'KB', 'MB', 'GB'];
        $unitIndex = 0;
        
        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }
        
        return round($size, 2) . ' ' . $units[$unitIndex];
    }
}
