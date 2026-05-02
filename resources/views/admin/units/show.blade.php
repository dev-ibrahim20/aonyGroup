@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $unit->title }}</h1>
        <p class="page-subtitle">Unit details and management</p>
    </div>
    <div>
        <a href="{{ route('admin.units.edit', $unit) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i> Edit Unit
        </a>
        <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Units
        </a>
    </div>
</div>

<!-- Unit Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Unit Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (English)</label>
                            <div class="fw-semibold">{{ $unit->title_en }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (Arabic)</label>
                            <div class="fw-semibold" dir="rtl">{{ $unit->title_ar }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Project</label>
                            <div class="fw-semibold">
                                <a href="{{ route('admin.projects.show', $unit->project) }}" class="text-primary">
                                    {{ $unit->project->title }}
                                </a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Type</label>
                            <div>
                                <span class="badge bg-info">{{ $unit->bedrooms }}BR / {{ $unit->bathrooms }}BA</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <span class="badge bg-{{ $unit->status === 'available' ? 'success' : ($unit->status === 'sold' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($unit->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <div class="fw-semibold">{{ $unit->slug }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Price</label>
                            <div class="fw-semibold text-success">${{ number_format($unit->price, 0) }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Area</label>
                            <div class="fw-semibold">{{ $unit->area }} m²</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div class="fw-semibold">{{ $unit->created_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div class="fw-semibold">{{ $unit->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Website URL</label>
                            <div>
                                <a href="{{ route('units.show', $unit->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-1"></i> View on Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (English)</h6>
                    <div class="bg-light p-3 rounded">{{ $unit->description_en }}</div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (Arabic)</h6>
                    <div class="bg-light p-3 rounded" dir="rtl">{{ $unit->description_ar }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Unit Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Main Image</h6>
            </div>
            <div class="card-body text-center">
                @if($unit->displayImage)
                    <img src="{{ $unit->displayImage->url }}" alt="{{ $unit->title }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                @endif
                <div class="text-muted small">Main unit image</div>
            </div>
        </div>
        
        <!-- Project Info -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Project Information</h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    @if($unit->project->mainImage)
                        <img src="{{ $unit->project->mainImage->url }}" alt="{{ $unit->project->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-building text-muted"></i>
                        </div>
                    @endif
                    <div>
                        <div class="fw-semibold">{{ $unit->project->title }}</div>
                        <div class="text-muted small">{{ $unit->project->location }}</div>
                        <a href="{{ route('admin.projects.show', $unit->project) }}" class="btn btn-sm btn-outline-primary mt-1">
                            <i class="fas fa-eye me-1"></i> View Project
                        </a>
                    </div>
                </div>
                
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ $unit->project->units->count() }}</div>
                            <div class="text-muted small">Total Units</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h5 mb-0">{{ $unit->project->units->where('status', 'available')->count() }}</div>
                            <div class="text-muted small">Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Media Gallery -->
@if($unit->media->isNotEmpty())
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Media Gallery ({{ $unit->media->count() }})</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($unit->media as $media)
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
