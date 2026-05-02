@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Project</h1>
        <p class="page-subtitle">Update project information</p>
    </div>
    <div>
        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-outline-info me-2">
            <i class="fas fa-eye me-2"></i> View Project
        </a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Projects
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Project Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- English Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> English Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Title (English) *</label>
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $project->title_en) }}" required>
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (English) *</label>
                                <textarea name="description_en" class="form-control" rows="6" required>{{ old('description_en', $project->description_en) }}</textarea>
                                @error('description_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> Arabic Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Title (Arabic) *</label>
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $project->title_ar) }}" required dir="rtl">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (Arabic) *</label>
                                <textarea name="description_ar" class="form-control" rows="6" required dir="rtl">{{ old('description_ar', $project->description_ar) }}</textarea>
                                @error('description_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-info-circle me-2"></i> Project Details
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Location *</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}" required>
                                @error('location')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="available" {{ old('status', $project->status) == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="sold_out" {{ old('status', $project->status) == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                                    <option value="coming_soon" {{ old('status', $project->status) == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Featured</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                                    <label class="form-check-label">Mark as featured</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-search me-2"></i> SEO Settings
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $project->meta_title) }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('meta_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description', $project->meta_description) }}</textarea>
                                <small class="text-muted">Maximum 160 characters</small>
                                @error('meta_description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Canonical URL</label>
                                <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $project->canonical_url) }}" placeholder="https://example.com/projects/project-slug">
                                @error('canonical_url')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-2"></i> Delete Project
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Project
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-danger bg-gradient text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Project Confirmation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10 p-3 mb-3">
                            <i class="fas fa-trash-alt fa-3x text-danger"></i>
                        </div>
                        <h6 class="mb-3">Are you absolutely sure?</h6>
                        <p class="text-muted mb-4">You're about to delete this project:</p>
                        <div class="alert bg-light border-0 rounded-3 p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-building text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $project->title_en }}</h6>
                                    <small class="text-muted">{{ $project->title_ar }}</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">ID: #{{ $project->id }} | Location: {{ $project->location }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning border-0 rounded-3 d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <div>
                            <strong>This action cannot be undone!</strong><br>
                            <small>All associated units and data will be permanently removed.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fas fa-trash me-2"></i>Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Project Info Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i> Project Info
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Slug</label>
                    <div class="fw-semibold">{{ $project->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div class="fw-semibold">{{ $project->created_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div class="fw-semibold">{{ $project->updated_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Units Count</label>
                    <div class="fw-semibold">{{ $project->units->count() }} units</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Status</label>
                    <span class="badge bg-{{ $project->status === 'available' ? 'success' : ($project->status === 'sold_out' ? 'danger' : 'warning') }}">
                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Project Images -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-images me-2"></i> Project Images ({{ $project->media->count() }})
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Upload Additional Images</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Upload additional images for the project gallery.</small>
                </div>
                
                @if($project->media->isNotEmpty())
                    <div class="row g-2">
                        @foreach($project->media->where('type', 'image')->orderBy('order') as $media)
                        <div class="col-md-4">
                            <div class="position-relative">
                                <img src="{{ $media->url }}" alt="{{ $media->title }}" class="img-fluid rounded" style="height: 80px; object-fit: cover; width: 100%;">
                                @if($media->id === $project->main_image_id)
                                    <span class="badge bg-primary position-absolute top-0 start-0 m-1" style="font-size: 0.7rem;">
                                        <i class="fas fa-star"></i>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('admin.media.index') }}?filter[mediable_type]=App%5CModels%5CProject&filter[mediable_id]={{ $project->id }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-cog me-1"></i> Manage All Images
                        </a>
                    </div>
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-images fa-2x text-muted mb-2"></i>
                        <div class="text-muted small">No images uploaded yet</div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-bolt me-2"></i> Quick Actions
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.units.create') }}?project_id={{ $project->id }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i> Add Unit
                    </a>
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info">
                        <i class="fas fa-eye me-2"></i> View Details
                    </a>
                    <button onclick="window.open('{{ route('projects.show', $project->slug) }}', '_blank')" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i> View on Website
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
