@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Projects</h1>
        <p class="page-subtitle">Manage your real estate projects</p>
    </div>
    <div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Project
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.projects.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search projects..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold_out" {{ request('status') == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                    <option value="coming_soon" {{ request('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Featured</label>
                <select name="featured" class="form-select">
                    <option value="">All</option>
                    <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>Not Featured</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Projects Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Units</th>
                        <th>Featured</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    @if($project->displayImage)
                                        <img src="{{ $project->displayImage->url }}" alt="{{ $project->title }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-building text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $project->title }}</div>
                                    <small class="text-muted">{{ $project->slug }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <i class="fas fa-map-marker-alt text-muted me-1"></i>
                            {{ $project->location }}
                        </td>
                        <td>
                            <span class="badge bg-{{ $project->status === 'available' ? 'success' : ($project->status === 'sold_out' ? 'danger' : 'warning') }}">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $project->units->count() }}</span>
                        </td>
                        <td>
                            @if($project->featured)
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-star me-1"></i> Featured
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ $project->created_at->format('M d, Y') }}</small>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-delete" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <div class="text-muted">No projects found</div>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i> Create First Project
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{ $projects->total() }} results
                </div>
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Delete Modals for each project -->
@foreach($projects as $project)
    <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-danger bg-gradient text-white">
                    <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Project Confirmation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10 p-3 mb-3">
                            <i class="fas fa-trash-alt fa-3x text-danger"></i>
                        </div>
                        <h6 class="mb-3">Are you absolutely sure?</h6>
                        <p class="text-muted mb-4">You're about to delete this project:</p>
                        <div class="alert bg-light border-0 rounded-3 p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-building text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $project->title_en }}</h6>
                                    <small class="text-muted">{{ $project->title_ar }}</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">ID: #{{ $project->id }} | Location: {{ $project->location }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning border-0 rounded-3 d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <div>
                            <strong>This action cannot be undone!</strong><br>
                            <small>All associated units and data will be permanently removed.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fas fa-trash me-2"></i>Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
