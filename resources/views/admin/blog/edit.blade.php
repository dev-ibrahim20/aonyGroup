@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Blog Post</h1>
        <p class="page-subtitle">Update blog article content</p>
    </div>
    <div>
        <a href="{{ route('admin.blog.show', $blog) }}" class="btn btn-outline-info me-2">
            <i class="fas fa-eye me-2"></i> View Post
        </a>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Blog
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Post Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $blog->title_en) }}" required>
                                @error('title_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Excerpt (English)</label>
                                <textarea name="excerpt_en" class="form-control" rows="3" placeholder="Brief description...">{{ old('excerpt_en', $blog->excerpt_en) }}</textarea>
                                <small class="text-muted">Maximum 500 characters</small>
                                @error('excerpt_en')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Content (English) *</label>
                                <textarea name="content_en" class="form-control" rows="12" required>{{ old('content_en', $blog->content_en) }}</textarea>
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
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $blog->title_ar) }}" required dir="rtl">
                                @error('title_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Excerpt (Arabic)</label>
                                <textarea name="excerpt_ar" class="form-control" rows="3" placeholder="وصف موجز..." dir="rtl">{{ old('excerpt_ar', $blog->excerpt_ar) }}</textarea>
                                <small class="text-muted">Maximum 500 characters</small>
                                @error('excerpt_ar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Content (Arabic) *</label>
                                <textarea name="content_ar" class="form-control" rows="12" required dir="rtl">{{ old('content_ar', $blog->content_ar) }}</textarea>
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
                                <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug) }}" placeholder="auto-generated">
                                <small class="text-muted">Leave empty to auto-generate from title</small>
                                @error('slug')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status', $blog->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Published At</label>
                                <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $blog->published_at?->format('Y-m-d')) }}">
                                <small class="text-muted">Leave empty to use current date</small>
                                @error('published_at')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured', $blog->featured) ? 'checked' : '' }}>
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
                                
                                @if($blog->featuredImage)
                                    <div class="mt-3">
                                        <label class="form-label">Current Featured Image</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $blog->featuredImage->url) }}" alt="{{ $blog->title }}" class="img-thumbnail me-3" style="max-width: 100px; max-height: 100px;">
                                            <div>
                                                <small class="text-muted">{{ $blog->featuredImage->title }}</small><br>
                                                <small class="text-muted">Image uploaded</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('meta_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description', $blog->meta_description) }}</textarea>
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
                                <i class="fas fa-trash me-2"></i> Delete Post
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Post
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
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Blog Post Confirmation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10 p-3 mb-3">
                            <i class="fas fa-trash-alt fa-3x text-danger"></i>
                        </div>
                        <h6 class="mb-3">Are you absolutely sure?</h6>
                        <p class="text-muted mb-4">You're about to delete this blog post:</p>
                        <div class="alert bg-light border-0 rounded-3 p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-blog text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $blog->title }}</h6>
                                    <small class="text-muted">{{ $blog->status }}</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">ID: #{{ $blog->id }} | Created: {{ $blog->created_at->format('M d, Y') }}</small>
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
                    <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fas fa-trash me-2"></i>Delete Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Post Info Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i> Post Info
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Slug</label>
                    <div class="fw-semibold">{{ $blog->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div class="fw-semibold">{{ $blog->created_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div class="fw-semibold">{{ $blog->updated_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Status</label>
                    <span class="badge bg-{{ $blog->status === 'published' ? 'success' : ($blog->status === 'draft' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($blog->status) }}
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Featured</label>
                    @if($blog->featured)
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
                    <button onclick="window.open('{{ route('blog.show', $blog->slug) }}', '_blank')" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i> View on Website
                    </button>
                    <form action="{{ route('admin.blog.toggle-status', $blog) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">
                            <i class="fas fa-toggle-on me-2"></i> Toggle Status
                        </button>
                    </form>
                    <form action="{{ route('admin.blog.toggle-featured', $blog) }}" method="POST">
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
