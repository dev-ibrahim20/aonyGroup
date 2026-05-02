@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Create Lead</h1>
        <p class="page-subtitle">Add a new customer lead</p>
    </div>
    <div>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Leads
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Lead Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.leads.store') }}" method="POST">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-user me-2"></i> Basic Information
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone *</label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Source</label>
                                <select name="source" class="form-select">
                                    <option value="website" {{ old('source') == 'website' ? 'selected' : '' }}>Website</option>
                                    <option value="whatsapp" {{ old('source') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                    <option value="facebook" {{ old('source') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="instagram" {{ old('source') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="referral" {{ old('source') == 'referral' ? 'selected' : '' }}>Referral</option>
                                    <option value="other" {{ old('source') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('source')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Priority *</label>
                                <select name="priority" class="form-select" required>
                                    <option value="">Select Priority</option>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
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
                                <textarea name="message" class="form-control" rows="6" required>{{ old('message') }}</textarea>
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
                                    <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>New</option>
                                    <option value="contacted" {{ old('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                    <option value="qualified" {{ old('status') == 'qualified' ? 'selected' : '' }}>Qualified</option>
                                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="lost" {{ old('status') == 'lost' ? 'selected' : '' }}>Lost</option>
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
                                <textarea name="notes" class="form-control" rows="3" placeholder="Add any additional notes...">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Create Lead
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Help Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-question-circle me-2"></i> Help & Tips
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="fw-bold">Lead Information</h6>
                    <p class="text-muted small">Collect accurate contact information for effective follow-up.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Priority Levels</h6>
                    <p class="text-muted small">
                        <strong>High:</strong> Urgent leads requiring immediate attention<br>
                        <strong>Medium:</strong> Standard leads for regular follow-up<br>
                        <strong>Low:</strong> Cold leads for future consideration
                    </p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Status Tracking</h6>
                    <p class="text-muted small">Track lead progression through the sales funnel.</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Source Attribution</h6>
                    <p class="text-muted small">Track where leads come from to optimize marketing.</p>
                </div>
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Tip:</strong> Always follow up with high-priority leads within 24 hours.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
