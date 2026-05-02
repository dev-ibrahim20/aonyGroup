@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Lead</h1>
        <p class="page-subtitle">Update lead information</p>
    </div>
    <div>
        <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-outline-info me-2">
            <i class="fas fa-eye me-2"></i> View Lead
        </a>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Leads
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Lead Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.leads.update', $lead) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-user me-2"></i> Basic Information
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $lead->name) }}" required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $lead->email) }}" required>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone *</label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $lead->phone) }}" required>
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Source</label>
                                <select name="source" class="form-select">
                                    <option value="website" {{ old('source', $lead->source) == 'website' ? 'selected' : '' }}>Website</option>
                                    <option value="whatsapp" {{ old('source', $lead->source) == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                    <option value="facebook" {{ old('source', $lead->source) == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="instagram" {{ old('source', $lead->source) == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="referral" {{ old('source', $lead->source) == 'referral' ? 'selected' : '' }}>Referral</option>
                                    <option value="other" {{ old('source', $lead->source) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('source')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Priority *</label>
                                <select name="priority" class="form-select" required>
                                    <option value="low" {{ old('priority', $lead->priority) == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ old('priority', $lead->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ old('priority', $lead->priority) == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                                @error('priority')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-comment me-2"></i> Message
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Message *</label>
                                <textarea name="message" class="form-control" rows="6" required>{{ old('message', $lead->message) }}</textarea>
                                @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-cog me-2"></i> Additional Information
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="new" {{ old('status', $lead->status) == 'new' ? 'selected' : '' }}>New</option>
                                    <option value="contacted" {{ old('status', $lead->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                    <option value="qualified" {{ old('status', $lead->status) == 'qualified' ? 'selected' : '' }}>Qualified</option>
                                    <option value="closed" {{ old('status', $lead->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Lost</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Assigned To</label>
                                <select name="assigned_to" class="form-select">
                                    <option value="">Unassigned</option>
                                    <!-- Add users here when you have user management -->
                                </select>
                                @error('assigned_to')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="Add any additional notes...">{{ old('notes', $lead->notes) }}</textarea>
                                @error('notes')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <div>
                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this lead?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-2"></i> Delete Lead
                                </button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Lead
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Lead Info Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i> Lead Info
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div class="fw-semibold">{{ $lead->created_at->format('M d, Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div class="fw-semibold">{{ $lead->updated_at->format('M d, Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Age</label>
                    <div class="fw-semibold">{{ $lead->created_at->diffForHumans() }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Priority</label>
                    <span class="badge bg-{{ $lead->priority === 'high' ? 'danger' : ($lead->priority === 'medium' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($lead->priority) }}
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Current Status</label>
                    <span class="badge bg-info">{{ ucfirst($lead->status) }}</span>
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
                    <a href="mailto:{{ $lead->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i> Send Email
                    </a>
                    <a href="tel:{{ $lead->phone }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-2"></i> Call Lead
                    </a>
                    <button onclick="window.open('https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}', '_blank')" class="btn btn-outline-success">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
