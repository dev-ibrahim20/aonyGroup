<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

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

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at?->format('M d, Y');
    }

    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }

    public function getFullCanonicalUrlAttribute()
    {
        return config('app.url') . $this->url;
    }

    public function isAvailable()
    {
        return $this->status === 'published' && $this->published_at <= now();
    }
}
