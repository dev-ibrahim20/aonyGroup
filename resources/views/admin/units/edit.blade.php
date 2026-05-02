@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Unit</h1>
        <p class="page-subtitle">Update unit information</p>
    </div>
    <div>
        <a href="{{ route('admin.units.show', $unit) }}" class="btn btn-outline-info me-2">
            <i class="fas fa-eye me-2"></i> View Unit
        </a>
        <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Units
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Unit Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.units.update', $unit) }}" method="POST">
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
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $unit->title_en) }}" required placeholder="Enter unit title in English">
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (English) *</label>
                                <textarea name="description_en" class="form-control" rows="4" required placeholder="Describe unit features in English">{{ old('description_en', $unit->description_en) }}</textarea>
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
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $unit->title_ar) }}" required dir="rtl" placeholder="أدخل عنوان الوحدة باللغة العربية">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (Arabic) *</label>
                                <textarea name="description_ar" class="form-control" rows="4" required dir="rtl" placeholder="صف مميزات الوحدة باللغة العربية">{{ old('description_ar', $unit->description_ar) }}</textarea>
                                @error('description_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Unit Details -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-info-circle me-2"></i> Unit Details
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Project *</label>
                                <select name="project_id" class="form-select" required>
                                    <option value="">Select Project</option>
                                    @foreach($projects as $id => $title)
                                        <option value="{{ $id }}" {{ old('project_id', $unit->project_id) == $id ? 'selected' : '' }}>{{ $title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Price ($) *</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price', $unit->price) }}" required min="0" step="0.01">
                                @error('price')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Area (m²) *</label>
                                <input type="number" name="area" class="form-control" value="{{ old('area', $unit->area) }}" required min="0" step="0.1">
                                @error('area')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bedrooms *</label>
                                <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $unit->bedrooms) }}" required min="0">
                                @error('bedrooms')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bathrooms *</label>
                                <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $unit->bathrooms) }}" required min="0">
                                @error('bathrooms')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="available" {{ old('status', $unit->status) == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="sold" {{ old('status', $unit->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                                    <option value="reserved" {{ old('status', $unit->status) == 'reserved' ? 'selected' : '' }}>Reserved</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
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
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $unit->meta_title) }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('meta_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description', $unit->meta_description) }}</textarea>
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
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-2"></i> Delete Unit
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Unit
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
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Unit Confirmation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10 p-3 mb-3">
                            <i class="fas fa-trash-alt fa-3x text-danger"></i>
                        </div>
                        <h6 class="mb-3">Are you absolutely sure?</h6>
                        <p class="text-muted mb-4">You're about to delete this unit:</p>
                        <div class="alert bg-light border-0 rounded-3 p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-home text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $unit->title_en }}</h6>
                                    <small class="text-muted">{{ $unit->title_ar }}</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">ID: #{{ $unit->id }} | Price: ${{ number_format($unit->price, 2) }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning border-0 rounded-3 d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <div>
                            <strong>This action cannot be undone!</strong><br>
                            <small>All associated data will be permanently removed.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <form action="{{ route('admin.units.destroy', $unit) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fas fa-trash me-2"></i>Delete Unit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <!-- Unit Info Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i> Unit Info
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Slug</label>
                    <div class="fw-semibold">{{ $unit->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div class="fw-semibold">{{ $unit->created_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div class="fw-semibold">{{ $unit->updated_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Status</label>
                    <span class="badge bg-{{ $unit->status === 'available' ? 'success' : ($unit->status === 'sold' ? 'danger' : 'warning') }}">
                        {{ ucfirst($unit->status) }}
                    </span>
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
                    <button onclick="window.open('{{ route('projects.show', $unit->project->slug) }}', '_blank')" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i> View Project
                    </button>
                    <button onclick="window.open('{{ route('units.show', $unit->slug) }}', '_blank')" class="btn btn-outline-success">
                        <i class="fas fa-external-link-alt me-2"></i> View on Website
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
