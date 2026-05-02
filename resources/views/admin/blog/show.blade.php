@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $blog->title }}</h1>
        <p class="page-subtitle">Blog post details and management</p>
    </div>
    <div>
        <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i> Edit Post
        </a>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Blog
        </a>
    </div>
</div>

<!-- Post Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Post Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (English)</label>
                            <div class="fw-semibold">{{ $blog->title_en }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (Arabic)</label>
                            <div class="fw-semibold" dir="rtl">{{ $blog->title_ar }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <div class="fw-semibold">{{ $blog->slug }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <span class="badge bg-{{ $blog->status === 'published' ? 'success' : ($blog->status === 'draft' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($blog->status) }}
                                </span>
                                @if($blog->featured)
                                    <span class="badge bg-warning text-dark ms-2">
                                        <i class="fas fa-star me-1"></i> Featured
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div class="fw-semibold">{{ $blog->created_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div class="fw-semibold">{{ $blog->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Published</label>
                            <div class="fw-semibold">{{ $blog->published_at?->format('M d, Y H:i') ?? 'Not published' }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Website URL</label>
                            <div>
                                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-1"></i> View on Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Excerpts -->
                @if($blog->excerpt_en || $blog->excerpt_ar)
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Excerpt (English)</h6>
                        <div class="bg-light p-3 rounded">{{ $blog->excerpt_en }}</div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Excerpt (Arabic)</h6>
                        <div class="bg-light p-3 rounded" dir="rtl">{{ $blog->excerpt_ar }}</div>
                    </div>
                </div>
                @endif
                
                <!-- Content -->
                <div class="row g-4">
                    <div class="col-md-12">
                        <h6 class="text-primary mb-3">Content (English)</h6>
                        <div class="bg-light p-3 rounded">{{ $blog->content_en }}</div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="text-primary mb-3">Content (Arabic)</h6>
                        <div class="bg-light p-3 rounded" dir="rtl">{{ $blog->content_ar }}</div>
                    </div>
                </div>
                
                <!-- SEO Data -->
                <div class="row g-4 mt-4">
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">SEO Meta Title</h6>
                        <div class="bg-light p-3 rounded">{{ $blog->meta_title ?: 'Not set' }}</div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">SEO Meta Description</h6>
                        <div class="bg-light p-3 rounded">{{ $blog->meta_description ?: 'Not set' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Featured Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Featured Image</h6>
            </div>
            <div class="card-body text-center">
                @if($blog->featuredImage)
                    <img src="{{ $blog->featuredImage->url }}" alt="{{ $blog->title }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                @endif
                <div class="text-muted small">Featured image for blog post</div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Statistics</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ Str::length(strip_tags($blog->content_en)) }}</div>
                            <div class="text-muted small">Words (EN)</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ Str::length(strip_tags($blog->content_ar)) }}</div>
                            <div class="text-muted small">Words (AR)</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ $blog->created_at->diffForHumans() }}</div>
                            <div class="text-muted small">Age</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Media Gallery -->
@if($blog->media->isNotEmpty())
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Media Gallery ({{ $blog->media->count() }})</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($blog->media as $media)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        @if(str_contains($media->mime_type, 'image'))
                            <img src="{{ $media->url }}" alt="{{ $media->alt_text }}" class="img-fluid rounded" style="height: 120px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 120px;">
                                <i class="fas fa-file fa-2x text-muted"></i>
                            </div>
                        @endif
                        <div class="mt-2">
                            <small class="text-muted d-block">{{ $media->collection }}</small>
                            <small class="text-muted">{{ $media->size_formatted }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
