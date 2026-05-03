@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Create Blog Post</h1>
        <p class="page-subtitle">Write and publish a new blog article</p>
    </div>
    <div>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Blog
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Post Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label class="form-label">Excerpt (English)</label>
                                <textarea name="excerpt_en" class="form-control" rows="3" placeholder="Brief description...">{{ old('excerpt_en') }}</textarea>
                                <small class="text-muted">Maximum 500 characters</small>
                                @error('excerpt_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Content (English) *</label>
                                <textarea name="content_en" class="form-control" rows="12" required>{{ old('content_en') }}</textarea>
                                @error('content_en')
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
                                <label class="form-label">Excerpt (Arabic)</label>
                                <textarea name="excerpt_ar" class="form-control" rows="3" placeholder="وصف موجز..." dir="rtl">{{ old('excerpt_ar') }}</textarea>
                                <small class="text-muted">Maximum 500 characters</small>
                                @error('excerpt_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Content (Arabic) *</label>
                                <textarea name="content_ar" class="form-control" rows="12" required dir="rtl">{{ old('content_ar') }}</textarea>
                                @error('content_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Post Settings -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-cog me-2"></i> Post Settings
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="auto-generated">
                                <small class="text-muted">Leave empty to auto-generate from title</small>
                                @error('slug')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Published At</label>
                                <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
                                <small class="text-muted">Leave empty to use current date</small>
                                @error('published_at')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label">Mark as featured post</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-image me-2"></i> Featured Image
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Featured Image</label>
                                <input type="file" name="featured_image" class="form-control" accept="image/*">
                                <small class="text-muted">Recommended size: 1200x800px, Max size: 2MB</small>
                                @error('featured_image')
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
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Create Post
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
                    <i class="fas fa-question-circle me-2"></i> Writing Tips
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="fw-bold">Title Guidelines</h6>
                    <p class="text-muted small">Use compelling titles that include keywords and are under 60 characters for SEO.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Content Structure</h6>
                    <p class="text-muted small">Start with a strong hook, use headings for structure, and include relevant keywords naturally.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">SEO Best Practices</h6>
                    <p class="text-muted small">Write unique meta descriptions, use relevant keywords, and maintain proper heading hierarchy.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Bilingual Content</h6>
                    <p class="text-muted small">Provide high-quality content in both English and Arabic for better reach.</p>
                </div>
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Tip:</strong> Save as draft until you're ready to publish.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
