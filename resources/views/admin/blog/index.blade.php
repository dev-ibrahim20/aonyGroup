@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Blog Posts</h1>
        <p class="page-subtitle">Manage blog content and articles</p>
    </div>
    <div>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Post
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.blog.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search posts..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Blog Posts Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>
                            @if($blog->featuredImage)
                                <img src="{{ asset('storage/' . $blog->featuredImage->url) }}" alt="{{ $blog->title }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $blog->title }}</div>
                            <small class="text-muted">{{ $blog->slug }}</small>
                            @if($blog->excerpt_en)
                                <div class="text-muted small mt-1">{{ Str::limit(strip_tags($blog->excerpt_en), 100) }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $blog->status === 'published' ? 'success' : ($blog->status === 'draft' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </td>
                        <td>
                            @if($blog->featured)
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-star me-1"></i> Featured
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ $blog->published_at?->format('M d, Y') ?? 'Not published' }}</small>
                            <div class="text-muted">{{ $blog->created_at->diffForHumans() }}</div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.blog.show', $blog) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-delete" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $blog->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                            <div class="text-muted">No blog posts found</div>
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i> Create First Post
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($blogs->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
                </div>
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Delete Modals for each blog -->
@foreach($blogs as $blog)
    <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $blog->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-danger bg-gradient text-white">
                    <h5 class="modal-title" id="deleteModalLabel{{ $blog->id }}">
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
                                    <small class="text-muted">{{ ucfirst($blog->status) }}</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">ID: #{{ $blog->id }} | Published: {{ $blog->published_at?->format('M d, Y') ?? 'Not published' }}</small>
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
@endforeach
@endsection
