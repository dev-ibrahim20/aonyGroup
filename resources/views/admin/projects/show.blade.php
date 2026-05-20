@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $project->title }}</h1>
        <p class="page-subtitle">Project details and management</p>
    </div>
    <div>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i> Edit Project
        </a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Projects
        </a>
    </div>
</div>

<!-- Project Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <!-- Main Image Display -->
        @if($project->displayImage)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Main Image</h5>
            </div>
            <div class="card-body p-0">
                <img src="{{ $project->displayImage->url }}" alt="{{ $project->title }}" class="w-100" style="height: 400px; object-fit: cover;">
            </div>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Project Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (English)</label>
                            <div class="fw-semibold">{{ $project->title_en }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Title (Arabic)</label>
                            <div class="fw-semibold" dir="rtl">{{ $project->title_ar }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Location</label>
                            <div class="fw-semibold">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                {{ $project->location }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <span class="badge bg-{{ $project->status === 'available' ? 'success' : ($project->status === 'sold_out' ? 'danger' : 'warning') }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                                @if($project->featured)
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
                            <div class="fw-semibold">{{ $project->slug }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div class="fw-semibold">{{ $project->created_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div class="fw-semibold">{{ $project->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Website URL</label>
                            <div>
                                <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-1"></i> View on Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (English)</h6>
                    <div class="bg-light p-3 rounded">{{ $project->description_en }}</div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Description (Arabic)</h6>
                    <div class="bg-light p-3 rounded" dir="rtl">{{ $project->description_ar }}</div>
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
                @if($project->mainImage)
                    <img src="{{ $project->mainImage->url }}" alt="{{ $project->title }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
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
                <h6 class="mb-0">Statistics</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h4 mb-0">{{ $project->units->count() }}</div>
                            <div class="text-muted small">Total Units</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h4 mb-0">{{ $project->units->where('status', 'available')->count() }}</div>
                            <div class="text-muted small">Available</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h4 mb-0">${{ number_format($project->units->min('price') ?? 0, 0) }}</div>
                            <div class="text-muted small">Min Price</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h4 mb-0">${{ number_format($project->units->max('price') ?? 0, 0) }}</div>
                            <div class="text-muted small">Max Price</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Units Section -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Project Units ({{ $project->units->count() }})</h5>
        <div>
            <a href="{{ route('admin.units.create') }}?project_id={{ $project->id }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-2"></i> Add Unit
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($project->units->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->units as $unit)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($unit->displayImage)
                                        <img src="{{ $unit->displayImage->url }}" alt="{{ $unit->title }}" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas fa-home text-muted"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $unit->title }}</div>
                                        <small class="text-muted">{{ $unit->slug }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $unit->bedrooms }}BR / {{ $unit->bathrooms }}BA</span>
                            </td>
                            <td>
                                <div class="fw-semibold">${{ number_format($unit->price, 0) }}</div>
                            </td>
                            <td>{{ $unit->area }} m²</td>
                            <td>
                                <span class="badge bg-{{ $unit->status === 'available' ? 'success' : ($unit->status === 'sold' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($unit->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.units.show', $unit) }}" class="btn-action btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.units.edit', $unit) }}" class="btn-action btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-home fa-3x text-muted mb-3"></i>
                <div class="text-muted mb-3">No units added yet</div>
                <a href="{{ route('admin.units.create') }}?project_id={{ $project->id }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i> Add First Unit
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Media Gallery -->
@if($project->media->isNotEmpty())
<div class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Project Gallery ({{ $project->media->count() }} images)</h5>
        <a href="{{ route('admin.media.index') }}?filter[mediable_type]=App%5CModels%5CProject&filter[mediable_id]={{ $project->id }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-images me-2"></i> Manage Media
        </a>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($project->media->where('type', 'image')->orderBy('order') as $media)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ $media->url }}" alt="{{ $media->title }}" class="card-img-top" style="height: 150px; object-fit: cover; cursor: pointer;" onclick="window.open('{{ $media->url }}', '_blank')">
                        @if($media->id === $project->main_image_id)
                            <span class="badge bg-primary position-absolute top-0 start-0 m-2">
                                <i class="fas fa-star me-1"></i>Main
                            </span>
                        @endif
                    </div>
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $media->title }}</small>
                            <small class="text-muted">Order: {{ $media->order }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($project->media->where('type', 'image')->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <div class="text-muted mb-3">No images uploaded yet</div>
                <a href="{{ route('admin.media.index') }}" class="btn btn-success">
                    <i class="fas fa-upload me-2"></i> Upload Images
                </a>
            </div>
        @endif
    </div>
</div>
@else
<div class="card mt-4">
    <div class="card-body text-center py-4">
        <i class="fas fa-images fa-3x text-muted mb-3"></i>
        <div class="text-muted mb-3">No images uploaded yet</div>
        <a href="{{ route('admin.media.index') }}" class="btn btn-success">
            <i class="fas fa-upload me-2"></i> Upload Images
        </a>
    </div>
</div>
@endif
</div>
@endsection
