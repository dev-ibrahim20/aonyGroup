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
                        <th>Portfolio</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Gallery</th>
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
                            <div class="d-flex align-items-center">
                                @if($portfolio->gallery->count() > 0)
                                    <span class="badge bg-success me-2">
                                        <i class="fas fa-images me-1"></i>{{ $portfolio->gallery->count() }}
                                    </span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="dropdown-menu p-2" style="max-width: 300px;">
                                            <div class="row g-2">
                                                @foreach($portfolio->gallery()->take(4)->get() as $media)
                                                    <div class="col-6">
                                                <img src="{{ $media->url }}" alt="{{ $media->filename }}" class="img-fluid rounded" style="height: 60px; object-fit: cover; width: 100%;">
                                            </div>
                                                @endforeach
                                            </div>
                                            @if($portfolio->gallery->count() > 4)
                                                <div class="text-center mt-2">
                                                    <small class="text-muted">+{{ $portfolio->gallery->count() - 4 }} more</small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-images me-1"></i>0
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-delete" title="Delete" data-bs-toggle="modal" data-bs-target="#deletePortfolioModal{{ $portfolio->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
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

<!-- Delete Confirmation Modals -->
@foreach($portfolios as $portfolio)
<div class="modal fade" id="deletePortfolioModal{{ $portfolio->id }}" tabindex="-1" aria-labelledby="deletePortfolioModalLabel{{ $portfolio->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deletePortfolioModalLabel{{ $portfolio->id }}">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-3"></i>
                    <div>
                        <strong>Warning:</strong> This action cannot be undone!
                    </div>
                </div>
                
                <p class="mb-3">Are you sure you want to delete this portfolio item?</p>
                
                <div class="bg-light rounded p-3 mb-3">
                    <h6 class="text-primary mb-2">
                        <i class="fas fa-briefcase me-2"></i>{{ $portfolio->title }}
                    </h6>
                    <div class="row text-sm">
                        <div class="col-6">
                            <strong>Category:</strong> {{ ucfirst($portfolio->category) }}
                        </div>
                        <div class="col-6">
                            <strong>Status:</strong> 
                            <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : ($portfolio->status === 'inactive' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($portfolio->status) }}
                            </span>
                        </div>
                        @if($portfolio->client_name)
                        <div class="col-12 mt-2">
                            <strong>Client:</strong> {{ $portfolio->client_name }}
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="text-muted small">
                    <i class="fas fa-info-circle me-1"></i>
                    All associated media files and data will be permanently removed.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Portfolio
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
