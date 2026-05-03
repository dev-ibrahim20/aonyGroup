<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'excerpt_en',
        'excerpt_ar',
        'description_en',
        'description_ar',
        'category',
        'client_name',
        'project_date',
        'technologies',
        'project_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'main_image_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'project_date' => 'datetime',
        'technologies' => 'array',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function mainImage()
    {
        return $this->belongsTo(Media::class, 'main_image_id');
    }

    public function gallery()
    {
        return $this->morphMany(Media::class, 'mediable')->where('collection', 'gallery');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getFormattedProjectDateAttribute()
    {
        return $this->project_date?->format('M d, Y');
    }

    public function getUrlAttribute()
    {
        return route('portfolio.show', $this->slug);
    }

    public function getFullCanonicalUrlAttribute()
    {
        return config('app.url') . $this->url;
    }

    public function isAvailable()
    {
        return $this->status === 'active';
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getExcerptAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->excerpt_ar : $this->excerpt_en;
    }

    public function getContentAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getTechnologiesListAttribute()
    {
        return is_array($this->technologies) ? implode(', ', $this->technologies) : $this->technologies;
    }
}
