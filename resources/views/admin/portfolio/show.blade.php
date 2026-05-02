@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $portfolio->title }}</h1>
        <p class="page-subtitle">Portfolio project details and management</p>
    </div>
    <div>
        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i> Edit Project
        </a>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
        </a>
    </div>
</div>

<!-- Project Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Project Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (English)</label>
                            <div class="fw-semibold">{{ $portfolio->title_en }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (Arabic)</label>
                            <div class="fw-semibold" dir="rtl">{{ $portfolio->title_ar }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Category</label>
                            <div>
                                <span class="badge bg-info">{{ ucfirst($portfolio->category) }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Client</label>
                            <div class="fw-semibold">{{ $portfolio->client_name ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Technologies</label>
                            <div class="fw-semibold">{{ $portfolio->technologies ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : ($portfolio->status === 'inactive' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($portfolio->status) }}
                                </span>
                                @if($portfolio->featured)
                                    <span class="badge bg-warning text-dark ms-2">
                                        <i class="fas fa-star me-1"></i> Featured
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <div class="fw-semibold">{{ $portfolio->slug }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Project Date</label>
                            <div class="fw-semibold">{{ $portfolio->project_date?->format('M d, Y') ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div class="fw-semibold">{{ $portfolio->created_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div class="fw-semibold">{{ $portfolio->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Project URL</label>
                            <div>
                                @if($portfolio->project_url)
                                    <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-external-link-alt me-1"></i> Visit Project
                                    </a>
                                @else
                                    <span class="text-muted">No URL provided</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (English)</h6>
                    <div class="bg-light p-3 rounded">{{ $portfolio->description_en }}</div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (Arabic)</h6>
                    <div class="bg-light p-3 rounded" dir="rtl">{{ $portfolio->description_ar }}</div>
                </div>
                
                <!-- SEO Data -->
                <div class="mt-4">
                    <h6 class="text-primary mb-3">SEO Information</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Meta Title</label>
                            <div class="bg-light p-3 rounded">{{ $portfolio->meta_title ?: 'Not set' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted">Meta Description</label>
                            <div class="bg-light p-3 rounded">{{ $portfolio->meta_description ?: 'Not set' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Project Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Main Image</h6>
            </div>
            <div class="card-body text-center">
                @if($portfolio->mainImage)
                    <img src="{{ $portfolio->mainImage->url }}" alt="{{ $portfolio->title }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                @endif
                <div class="text-muted small">Main project image</div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Project Statistics</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ Str::length(strip_tags($portfolio->description_en)) }}</div>
                            <div class="text-muted small">Words (EN)</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ Str::length(strip_tags($portfolio->description_ar)) }}</div>
                            <div class="text-muted small">Words (AR)</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ $portfolio->created_at->diffForHumans() }}</div>
                            <div class="text-muted small">Age</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Media Gallery -->
@if($portfolio->media->isNotEmpty())
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Media Gallery ({{ $portfolio->media->count() }})</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($portfolio->media as $media)
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
