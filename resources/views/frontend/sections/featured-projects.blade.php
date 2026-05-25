<!-- Featured Projects Section -->
<section id="featured-projects" class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Projects') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Featured Projects') }}</h2>
            <p class="text-muted lead">{{ __('Discover our exclusive collection of premium properties') }}</p>
        </div>
        
        <!-- Project Filters -->
        <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="btn-group flex-wrap gap-2">
                <button class="btn btn-outline-primary active filter-btn" data-filter="all">{{ __('All') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="residential">{{ __('Residential') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="commercial">{{ __('Commercial') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="mixed">{{ __('Mixed Use') }}</button>
            </div>
        </div>
        
        <!-- Projects Grid -->
        <div class="row g-4" id="projects-grid">
            @php
                $projects = \App\Models\Project::where('status', 'available')->orWhere('status', 'coming_soon')->get();
                $categories = ['residential', 'commercial', 'mixed'];
            @endphp
            @foreach($projects as $index => $project)
                @php
                    $category = $categories[$index % 3];
                    $firstUnit = $project->units()->first();
                    $price = $firstUnit ? $firstUnit->price : 0;
                    $bedrooms = $firstUnit ? $firstUnit->bedrooms : 0;
                    $bathrooms = $firstUnit ? $firstUnit->bathrooms : 0;
                    $area = $firstUnit ? $firstUnit->area : 0;
                    $media = $project->media()->where('type', 'image')->first();
                    $imageUrl = $media ? $media->url : 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800&h=600&fit=crop';
                @endphp
                <div class="col-lg-4 col-md-6 project-item" data-category="{{ $category }}" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="project-card card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $project->title_en }}"
                                 class="w-100"
                                 style="height: 250px; object-fit: cover;"
                                 onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, var(--primary-color), var(--accent-color))'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white\'><span>{{ __('Image Not Available') }}</span></div>'">

                            <div class="position-absolute top-0 start-0 m-3">
                                @if($project->status == 'coming_soon')
                                    <span class="badge bg-warning text-dark">{{ __('Coming Soon') }}</span>
                                @elseif($project->status == 'sold_out')
                                    <span class="badge bg-danger">{{ __('Sold Out') }}</span>
                                @else
                                    <span class="badge bg-success">{{ __('Available') }}</span>
                                @endif
                            </div>

                            <div class="position-absolute top-0 end-0 m-3">
                                <button class="btn btn-sm btn-gold rounded-circle wishlist-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-light text-dark">{{ ucfirst($category) }}</span>
                                @if($price > 0)
                                <div class="text-gold fw-bold">
                                    {{ number_format($price) }} EGP
                                </div>
                                @endif
                            </div>

                            <h5 class="fw-bold mb-2">
                                <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                    {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                </a>
                            </h5>

                            <p class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt text-gold me-1"></i>
                                {{ $project->location }}
                            </p>

                            @if($firstUnit)
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-bed text-gold"></i>
                                        <small class="d-block">{{ $bedrooms }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-bath text-gold"></i>
                                        <small class="d-block">{{ $bathrooms }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-ruler-combined text-gold"></i>
                                        <small class="d-block">{{ number_format($area) }}m²</small>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary-custom w-100">
                                {{ __('View Details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary btn-lg">
                {{ __('View All Projects') }}
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .filter-btn {
        border-radius: 25px;
        padding: 10px 25px;
        transition: all 0.3s ease;
    }
    
    .filter-btn.active,
    .filter-btn:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .project-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .wishlist-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .wishlist-btn:hover {
        transform: scale(1.1);
    }
    
    .wishlist-btn.active {
        background: var(--secondary-color);
        color: white;
    }
</style>

<script>
    // Project filtering
    $('.filter-btn').click(function() {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        const filter = $(this).data('filter');
        
        if (filter === 'all') {
            $('.project-item').show();
        } else {
            $('.project-item').hide();
            $('.project-item[data-category="' + filter + '"]').show();
        }
    });
    
    // Wishlist toggle
    $('.wishlist-btn').click(function() {
        $(this).toggleClass('active');
        const icon = $(this).find('i');
        icon.toggleClass('far fas');
    });
</script>
