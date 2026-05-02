@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Units</h1>
        <p class="page-subtitle">Manage property units and apartments</p>
    </div>
    <div>
        <a href="{{ route('admin.units.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Unit
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.units.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search units..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Project</label>
                <select name="project_id" class="form-select">
                    <option value="">All Projects</option>
                    @foreach($projects as $id => $title)
                        <option value="{{ $id }}" {{ request('project_id') == $id ? 'selected' : '' }}>{{ $title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                    <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Units Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Unit</th>
                        <th>Project</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Area</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($units as $unit)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    @if($unit->displayImage)
                                        <img src="{{ $unit->displayImage->url }}" alt="{{ $unit->title }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-home text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $unit->title }}</div>
                                    <small class="text-muted">{{ $unit->slug }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div class="fw-semibold">{{ $unit->project->title }}</div>
                                <small class="text-muted">{{ $unit->project->location }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $unit->bedrooms }}BR / {{ $unit->bathrooms }}BA</span>
                        </td>
                        <td>
                            <div class="fw-semibold">${{ number_format($unit->price, 0) }}</div>
                        </td>
                        <td>{{ $unit->area }} m²</td>
                        <td>
                            <span class="badge bg-{{ $unit->status === 'available' ? 'success' : ($unit->status === 'sold' ? 'danger' : 'warning') }}">
                                {{ ucfirst($unit->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.units.show', $unit) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.units.edit', $unit) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-delete" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $unit->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-home fa-3x text-muted mb-3"></i>
                            <div class="text-muted">No units found</div>
                            <a href="{{ route('admin.units.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i> Create First Unit
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($units->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $units->firstItem() }} to {{ $units->lastItem() }} of {{ $units->total() }} results
                </div>
                {{ $units->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Delete Modals for each unit -->
@foreach($units as $unit)
    <div class="modal fade" id="deleteModal{{ $unit->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $unit->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-danger bg-gradient text-white">
                    <h5 class="modal-title" id="deleteModalLabel{{ $unit->id }}">
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
                                    <h6 class="mb-1">{{ $unit->title }}</h6>
                                    <small class="text-muted">{{ $unit->project->title }}</small>
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
@endforeach
@endsection
