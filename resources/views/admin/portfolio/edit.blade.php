@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Portfolio Item</h1>
        <p class="page-subtitle">Update portfolio project information</p>
    </div>
    <div>
        <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn btn-outline-info me-2">
            <i class="fas fa-eye me-2"></i> View Item
        </a>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
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
                <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- English Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> English Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Project Title (English) *</label>
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $portfolio->title_en) }}" required>
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (English) *</label>
                                <textarea name="description_en" class="form-control" rows="6" required>{{ old('description_en', $portfolio->description_en) }}</textarea>
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
                                <label class="form-label">Project Title (Arabic) *</label>
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $portfolio->title_ar) }}" required dir="rtl">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (Arabic) *</label>
                                <textarea name="description_ar" class="form-control" rows="6" required dir="rtl">{{ old('description_ar', $portfolio->description_ar) }}</textarea>
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
                            <div class="col-md-4">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="web-design" {{ old('category', $portfolio->category) == 'web-design' ? 'selected' : '' }}>Web Design</option>
                                    <option value="mobile-app" {{ old('category', $portfolio->category) == 'mobile-app' ? 'selected' : '' }}>Mobile App</option>
                                    <option value="branding" {{ old('category', $portfolio->category) == 'branding' ? 'selected' : '' }}>Branding</option>
                                    <option value="marketing" {{ old('category', $portfolio->category) == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="other" {{ old('category', $portfolio->category) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Client Name</label>
                                <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $portfolio->client_name) }}" placeholder="Client company or name">
                                @error('client_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Date</label>
                                <input type="date" name="project_date" class="form-control" value="{{ old('project_date', $portfolio->project_date?->format('Y-m-d')) }}">
                                @error('project_date')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Technologies Used</label>
                                <input type="text" name="technologies" class="form-control" value="{{ old('technologies', $portfolio->technologies) }}" placeholder="e.g. Laravel, React, Node.js">
                                @error('technologies')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project URL</label>
                                <input type="url" name="project_url" class="form-control" value="{{ old('project_url', $portfolio->project_url) }}" placeholder="https://example.com">
                                @error('project_url')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="active" {{ old('status', $portfolio->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $portfolio->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="archived" {{ old('status', $portfolio->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured', $portfolio->featured) ? 'checked' : '' }}>
                                    <label class="form-check-label">Mark as featured project</label>
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
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $portfolio->meta_title) }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('meta_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description', $portfolio->meta_description) }}</textarea>
                                <small class="text-muted">Maximum 160 characters</small>
                                @error('meta_description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <div>
                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this portfolio item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-2"></i> Delete Item
                                </button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Portfolio Item
                            </button>
                        </div>
                    </div>
                </form>
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
                    <div class="fw-semibold">{{ $portfolio->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div class="fw-semibold">{{ $portfolio->created_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div class="fw-semibold">{{ $portfolio->updated_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Status</label>
                    <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : ($portfolio->status === 'inactive' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($portfolio->status) }}
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Featured</label>
                    @if($portfolio->featured)
                        <span class="badge bg-warning text-dark">
                            <i class="fas fa-star me-1"></i> Featured
                        </span>
                    @else
                        <span class="text-muted">Not featured</span>
                    @endif
                </div>
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
                    @if($portfolio->project_url)
                        <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-external-link-alt me-2"></i> Visit Project
                        </a>
                    @endif
                    <form action="{{ route('admin.portfolio.toggle-status', $portfolio) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">
                            <i class="fas fa-toggle-on me-2"></i> Toggle Status
                        </button>
                    </form>
                    <form action="{{ route('admin.portfolio.toggle-featured', $portfolio) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-warning">
                            <i class="fas fa-star me-2"></i> Toggle Featured
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
