@extends('frontend.layouts.app')

@section('title', __('Projects'))
@section('seo_description', __('Browse our exclusive collection of luxury properties and real estate projects.'))
@section('seo_keywords', 'real estate projects, luxury properties, investment opportunities')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Projects') }}</li>
            </ol>
        </nav>
        <h1 class="text-center text-white mt-3">{{ __('Our Projects') }}</h1>
    </div>
</div>

<!-- Projects Section -->
<section class="section-padding">
    <div class="container">
        <!-- Filter Options -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="filter-buttons text-center mb-4">
                    <button class="btn btn-outline-primary filter-btn active" data-filter="all">{{ __('All') }}</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="residential">{{ __('Residential') }}</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="commercial">{{ __('Commercial') }}</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="mixed">{{ __('Mixed Use') }}</button>
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4 project-item" data-category="{{ $project->type ?? 'residential' }}">
                    <div class="project-card">
                        <div class="position-relative overflow-hidden">
                            @if($project->mainImage)
                                <img src="{{ $project->mainImage->full_url }}" alt="{{ $project->title }}" class="w-100" style="height: 250px; object-fit: cover;">
                            @else
                                <div class="w-100 d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color));">
                                    <span class="text-white">{{ __('No Image') }}</span>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 p-3">
                                @if($project->status == 'available')
                                    <span class="badge bg-success">{{ __('Available') }}</span>
                                @elseif($project->status == 'sold_out')
                                    <span class="badge bg-danger">{{ __('Sold Out') }}</span>
                                @else
                                    <span class="badge bg-warning">{{ __('Coming Soon') }}</span>
                                @endif
                            </div>
                            <div class="gallery-overlay">
                                <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-gold">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="mb-2">{{ $project->title }}</h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>{{ $project->location }}
                            </p>
                            @if($project->price)
                                <p class="text-gold fw-bold mb-0">
                                    {{ __('Starting from') }}: {{ number_format($project->price) }} {{ __('EGP') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">{{ __('No projects found.') }}</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    {{ $projects->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
@include('frontend.sections.cta')
@endsection

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.project-item').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
