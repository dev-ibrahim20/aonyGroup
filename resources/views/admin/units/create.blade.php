@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Create Unit</h1>
        <p class="page-subtitle">Add a new property unit</p>
    </div>
    <div>
        <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Units
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Unit Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.units.store') }}" method="POST">
                    @csrf
                    
                    <!-- English Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> English Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Title (English) *</label>
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}" required placeholder="Enter unit title in English">
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (English) *</label>
                                <textarea name="description_en" class="form-control" rows="4" required placeholder="Describe unit features in English">{{ old('description_en') }}</textarea>
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
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}" required dir="rtl" placeholder="أدخل عنوان الوحدة باللغة العربية">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description (Arabic) *</label>
                                <textarea name="description_ar" class="form-control" rows="4" required dir="rtl" placeholder="صف مميزات الوحدة باللغة العربية">{{ old('description_ar') }}</textarea>
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
                                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Price ($) *</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required min="0" step="0.01">
                                @error('price')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Area (m²) *</label>
                                <input type="number" name="area" class="form-control" value="{{ old('area') }}" required min="0" step="0.1">
                                @error('area')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bedrooms *</label>
                                <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}" required min="0">
                                @error('bedrooms')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bathrooms *</label>
                                <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}" required min="0">
                                @error('bathrooms')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                                    <option value="reserved" {{ old('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
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
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Create Unit
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
                    <h6 class="fw-bold">Unit Title</h6>
                    <p class="text-muted small">Use descriptive titles that include type, size, and key features.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Description</h6>
                    <p class="text-muted small">Provide detailed information about the unit, amenities, and features.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Pricing</h6>
                    <p class="text-muted small">Set competitive prices based on market rates and unit features.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">SEO Settings</h6>
                    <p class="text-muted small">Meta title and description help with search engine ranking.</p>
                </div>
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Note:</strong> You can add images after creating the unit.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
