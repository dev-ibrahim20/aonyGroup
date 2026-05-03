@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Create Portfolio Item</h1>
        <p class="page-subtitle">Add a new completed project to portfolio</p>
    </div>
    <div>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
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
                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- English Content -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-language me-2"></i> English Content
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Project Title (English) *</label>
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
                                <label class="form-label">Project Title (Arabic) *</label>
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
                            <div class="col-md-4">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="web-design" {{ old('category') == 'web-design' ? 'selected' : '' }}>Web Design</option>
                                    <option value="mobile-app" {{ old('category') == 'mobile-app' ? 'selected' : '' }}>Mobile App</option>
                                    <option value="branding" {{ old('category') == 'branding' ? 'selected' : '' }}>Branding</option>
                                    <option value="marketing" {{ old('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Client Name</label>
                                <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" placeholder="Client company or name">
                                @error('client_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Date</label>
                                <input type="date" name="project_date" class="form-control" value="{{ old('project_date') }}">
                                @error('project_date')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Technologies Used</label>
                                <input type="text" name="technologies" class="form-control" value="{{ old('technologies') }}" placeholder="e.g. Laravel, React, Node.js">
                                @error('technologies')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project URL</label>
                                <input type="url" name="project_url" class="form-control" value="{{ old('project_url') }}" placeholder="https://example.com">
                                @error('project_url')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label">Mark as featured project</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Image -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-image me-2"></i> Main Image
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Project Main Image</label>
                                <input type="file" name="main_image" class="form-control" accept="image/*" onchange="previewImage(this)">
                                <small class="text-muted">Upload the main image for this portfolio item. Recommended size: 1200x800px.</small>
                                <div id="imagePreview" class="mt-3" style="display: none;">
                                    <img src="" alt="Image Preview" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                                @error('main_image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-images me-2"></i> Project Gallery
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Gallery Images</label>
                                <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple onchange="previewGalleryImages(this)">
                                <small class="text-muted">Select multiple images to upload to the project gallery. You can select JPG, PNG, GIF files.</small>
                                <div id="galleryPreview" class="mt-3" style="display: none;">
                                    <p class="text-muted mb-2">Gallery Preview:</p>
                                    <div class="row g-2" id="galleryPreviewContainer"></div>
                                </div>
                                @error('gallery_images.*')
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
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Create Portfolio Item
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
                    <p class="text-muted small">Use descriptive titles that highlight the project type and key achievements.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Description</h6>
                    <p class="text-muted">Provide detailed information about the project, challenges, and solutions.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Categories</h6>
                    <p class="text-muted">Choose appropriate categories to help visitors find relevant projects.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Client Information</h6>
                    <p class="text-muted">Include client details to build credibility and trust.</p>
                </div>
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Note:</strong> You can add images after creating the portfolio item.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

function previewGalleryImages(input) {
    const preview = document.getElementById('galleryPreview');
    const container = document.getElementById('galleryPreviewContainer');
    
    // Clear previous previews
    container.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        preview.style.display = 'block';
        
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-3';
                col.innerHTML = `
                    <img src="${e.target.result}" alt="Gallery Preview ${index + 1}" class="img-fluid rounded" style="height: 100px; object-fit: cover; width: 100%;">
                    <small class="text-muted d-block text-center mt-1">${file.name}</small>
                `;
                container.appendChild(col);
            };
            
            reader.readAsDataURL(file);
        });
    } else {
        preview.style.display = 'none';
    }
}
</script>

@endsection
