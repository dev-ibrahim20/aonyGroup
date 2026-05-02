@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Welcome back! Here's what's happening with your real estate business.</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-value">{{ App\Models\Project::count() }}</div>
            <div class="stat-label">Total Projects</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-success bg-opacity-10 text-success">
                <i class="fas fa-home"></i>
            </div>
            <div class="stat-value">{{ App\Models\Unit::count() }}</div>
            <div class="stat-label">Total Units</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ App\Models\Lead::count() }}</div>
            <div class="stat-label">Total Leads</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-info bg-opacity-10 text-info">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-value">${{ number_format(App\Models\Unit::sum('price'), 0) }}</div>
            <div class="stat-label">Total Value</div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Projects -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Projects</h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Units</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Project::latest()->take(5)->get() as $project)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if($project->display_image)
                                                <img src="{{ $project->display_image->url }}" alt="{{ $project->title }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
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
                                <td>{{ $project->location }}</td>
                                <td>
                                    <span class="badge bg-{{ $project->status === 'available' ? 'success' : ($project->status === 'sold_out' ? 'danger' : 'warning') }}">
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </td>
                                <td>{{ $project->units->count() }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.projects.show', $project) }}" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Leads -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Leads</h5>
                <a href="{{ route('admin.leads.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach(App\Models\Lead::latest()->take(5)->get() as $lead)
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $lead->name }}</h6>
                                <p class="mb-1 text-muted small">{{ $lead->email }}</p>
                                <small class="text-muted">{{ $lead->created_at->diffForHumans() }}</small>
                            </div>
                            <span class="badge bg-{{ $lead->priority === 'high' ? 'danger' : ($lead->priority === 'medium' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($lead->priority) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i> New Project
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.units.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-plus me-2"></i> New Unit
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-info w-100">
                            <i class="fas fa-plus me-2"></i> New Blog Post
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.media.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-upload me-2"></i> Upload Media
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
