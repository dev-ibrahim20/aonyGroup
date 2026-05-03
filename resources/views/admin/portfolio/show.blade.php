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
                @elseif($portfolio->gallery->isNotEmpty())
                    <img src="{{ $portfolio->gallery()->first()->url }}" alt="{{ $portfolio->title }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
                    <div class="text-warning small mb-2">Showing first gallery image (no main image set)</div>
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
@if($portfolio->gallery->isNotEmpty())
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Project Gallery ({{ $portfolio->gallery->count() }} images)</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($portfolio->gallery()->orderBy('order')->get() as $media)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <img src="{{ $media->url }}" alt="{{ $media->filename }}" class="img-fluid rounded" style="height: 120px; object-fit: cover; width: 100%; cursor: pointer;" onclick="openImageModal('{{ $media->url }}', '{{ $media->filename }}')">
                        <div class="mt-2">
                            <small class="text-muted d-block">{{ $media->filename }}</small>
                            <small class="text-muted">{{ number_format($media->size / 1024, 2) }} KB</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<!-- No Gallery Images -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Project Gallery</h5>
    </div>
    <div class="card-body text-center">
        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 150px;">
            <div>
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <div class="text-muted">No gallery images uploaded yet</div>
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-primary btn-sm mt-2">
                    <i class="fas fa-plus me-2"></i>Add Gallery Images
                </a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid rounded" style="max-height: 500px;">
                <div class="mt-3">
                    <small id="modalImageName" class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(imageUrl, imageName) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('modalImageName').textContent = imageName;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}
</script>

@endsection
