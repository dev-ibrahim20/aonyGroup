@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $lead->name }}</h1>
        <p class="page-subtitle">Lead details and management</p>
    </div>
    <div>
        <a href="{{ route('admin.leads.edit', $lead) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i> Edit Lead
        </a>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Leads
        </a>
    </div>
</div>

<!-- Lead Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Lead Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Name</label>
                            <div class="fw-semibold">{{ $lead->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <div>
                                <a href="mailto:{{ $lead->email }}" class="text-primary">{{ $lead->email }}</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Phone</label>
                            <div>
                                <a href="tel:{{ $lead->phone }}" class="text-primary">{{ $lead->phone }}</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Source</label>
                            <div>
                                <span class="badge bg-secondary">{{ ucfirst($lead->source) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Priority</label>
                            <div>
                                <span class="badge bg-{{ $lead->priority === 'high' ? 'danger' : ($lead->priority === 'medium' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($lead->priority) }}
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <form action="{{ route('admin.leads.update-status', $lead) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                                        <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                                        <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                        <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Lost</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div class="fw-semibold">{{ $lead->created_at->format('M d, Y H:i') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div class="fw-semibold">{{ $lead->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Message</h6>
                    <div class="bg-light p-3 rounded">{{ $lead->message }}</div>
                </div>
                
                @if($lead->notes)
                <div class="mt-4">
                    <h6 class="text-primary mb-3">Notes</h6>
                    <div class="bg-light p-3 rounded">{{ $lead->notes }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Quick Actions -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-bolt me-2"></i> Quick Actions
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $lead->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i> Send Email
                    </a>
                    <a href="tel:{{ $lead->phone }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-2"></i> Call Lead
                    </a>
                    <button onclick="window.open('https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}', '_blank')" class="btn btn-outline-success">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Lead Timeline -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-history me-2"></i> Timeline
                </h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <div class="fw-semibold">Lead Created</div>
                            <div class="text-muted small">{{ $lead->created_at->format('M d, Y H:i') }}</div>
                            <div class="text-muted">{{ $lead->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    
                    @if($lead->updated_at != $lead->created_at)
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <div class="fw-semibold">Last Updated</div>
                            <div class="text-muted small">{{ $lead->updated_at->format('M d, Y H:i') }}</div>
                            <div class="text-muted">{{ $lead->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 20px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 8px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e5e7eb;
}

.timeline-item {
    position: relative;
    padding-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -12px;
    top: 0;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 2px solid white;
    z-index: 1;
}

.timeline-content {
    margin-left: 20px;
}
</style>
@endsection
