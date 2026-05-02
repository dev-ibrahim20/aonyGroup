@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Portfolio</h1>
        <p class="page-subtitle">Manage completed projects and portfolio items</p>
    </div>
    <div>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Item
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.portfolio.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search portfolio..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="web-design" {{ request('category') == 'web-design' ? 'selected' : '' }}>Web Design</option>
                    <option value="mobile-app" {{ request('category') == 'mobile-app' ? 'selected' : '' }}>Mobile App</option>
                    <option value="branding" {{ request('category') == 'branding' ? 'selected' : '' }}>Branding</option>
                    <option value="marketing" {{ request('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Portfolio Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    @if($portfolio->mainImage)
                                        <img src="{{ $portfolio->mainImage->url }}" alt="{{ $portfolio->title }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-briefcase text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $portfolio->title }}</div>
                                    <small class="text-muted">{{ $portfolio->slug }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ ucfirst($portfolio->category) }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $portfolio->client_name ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <small>{{ $portfolio->project_date?->format('M d, Y') ?? 'N/A' }}</small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : ($portfolio->status === 'inactive' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($portfolio->status) }}
                            </span>
                            @if($portfolio->featured)
                                <span class="badge bg-warning text-dark ms-2">
                                    <i class="fas fa-star me-1"></i> Featured
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this portfolio item?')">
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
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                            <div class="text-muted">No portfolio items found</div>
                            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i> Create First Item
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($portfolios->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $portfolios->firstItem() }} to {{ $portfolios->lastItem() }} of {{ $portfolios->total() }} results
                </div>
                {{ $portfolios->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
