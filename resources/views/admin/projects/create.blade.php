@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Create Project</h1>
        <p class="page-subtitle">Add a new real estate project</p>
    </div>
    <div>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Projects
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Project Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST">
                    @csrf
                    
                    <!-- English Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> English Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Title (English) *</label>
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}" required>
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (English) *</label>
                                <textarea name="description_en" class="form-control" rows="6" required>{{ old('description_en') }}</textarea>
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
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}" required dir="rtl">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (Arabic) *</label>
                                <textarea name="description_ar" class="form-control" rows="6" required dir="rtl">{{ old('description_ar') }}</textarea>
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
                                <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="sold_out" {{ old('status') == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                                    <option value="coming_soon" {{ old('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Featured</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
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
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('meta_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description') }}</textarea>
                                <small class="text-muted">Maximum 160 characters</small>
                                @error('meta_description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Canonical URL</label>
                                <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url') }}" placeholder="https://example.com/projects/project-slug">
                                @error('canonical_url')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Create Project
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Help Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-question-circle me-2"></i> Help & Tips
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="fw-bold">Project Title</h6>
                    <p class="text-muted small">Use descriptive titles that include location and key features.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Description</h6>
                    <p class="text-muted small">Provide detailed information about the project, amenities, and nearby facilities.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">SEO Settings</h6>
                    <p class="text-muted small">Meta title and description help with search engine ranking. Leave empty to auto-generate.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Featured Projects</h6>
                    <p class="text-muted small">Featured projects appear prominently on the homepage and search results.</p>
                </div>
                <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Project Images</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Upload Images</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">You can upload multiple images. First image will be set as main image.</small>
                    @error('images')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Note:</strong> Supported formats: JPEG, PNG, JPG, GIF. Maximum size: 2MB per image.
                </div>
            </div>
        </div>
        
        <div class="alert alert-info small">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Note:</strong> You can add more images and units after creating the project.
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
