<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
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

    public function featuredImage()
    {
        return $this->morphOne(Media::class, 'mediable')->where('collection', 'featured');
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

    public function getTechnologiesListAttribute()
    {
        return is_array($this->technologies) ? implode(', ', $this->technologies) : $this->technologies;
    }
}
