@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Leads Management</h1>
        <p class="page-subtitle">Manage and track customer leads</p>
    </div>
    <div>
        <a href="{{ route('admin.leads.export') }}" class="btn btn-success me-2">
            <i class="fas fa-file-excel me-2"></i> Export Excel
        </a>
        <a href="{{ route('admin.leads.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Lead
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.leads.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search leads..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="qualified" {{ request('status') == 'qualified' ? 'selected' : '' }}>Qualified</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Priority</label>
                <select name="priority" class="form-select">
                    <option value="">All Priority</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Source</label>
                <select name="source" class="form-select">
                    <option value="">All Sources</option>
                    <option value="website" {{ request('source') == 'website' ? 'selected' : '' }}>Website</option>
                    <option value="whatsapp" {{ request('source') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                    <option value="facebook" {{ request('source') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="instagram" {{ request('source') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="referral" {{ request('source') == 'referral' ? 'selected' : '' }}>Referral</option>
                    <option value="other" {{ request('source') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Leads Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Source</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $lead->name }}</div>
                            <small class="text-muted">{{ $lead->email }}</small>
                        </td>
                        <td>
                            <div>
                                <div class="text-muted small">{{ $lead->phone }}</div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($lead->source) }}</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $lead->priority === 'high' ? 'danger' : ($lead->priority === 'medium' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($lead->priority) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.leads.update-status', $lead) }}" method="POST" style="display: inline;">
                                @csrf
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                                    <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                    <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                                    <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Lost</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <small>{{ $lead->created_at->format('M d, Y') }}</small>
                            <div class="text-muted">{{ $lead->created_at->diffForHumans() }}</div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="btn-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.leads.edit', $lead) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this lead?')">
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
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <div class="text-muted">No leads found</div>
                            <a href="{{ route('admin.leads.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i> Create First Lead
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($leads->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $leads->firstItem() }} to {{ $leads->lastItem() }} of {{ $leads->total() }} results
                </div>
                {{ $leads->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
