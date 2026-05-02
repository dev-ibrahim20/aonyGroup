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
                                <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
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
@endsection
