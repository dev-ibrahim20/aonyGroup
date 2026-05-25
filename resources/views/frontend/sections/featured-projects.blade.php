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
            @for($i = 1; $i <= 6; $i++)
                @php
                    $categories = ['residential', 'commercial', 'mixed'];
                    $category = $categories[($i - 1) % 3];
                @endphp
                <div class="col-lg-4 col-md-6 project-item" data-category="{{ $category }}" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="project-card card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('images/featured-' . $i . '.jpg') }}" 
                                 alt="{{ __('Project') }}" 
                                 class="w-100" 
                                 style="height: 250px; object-fit: cover;"
                                 onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                            
                            <div class="position-absolute top-0 start-0 m-3">
                                @if($i % 3 == 0)
                                    <span class="badge bg-warning text-dark">{{ __('Coming Soon') }}</span>
                                @elseif($i % 2 == 0)
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
                                <div class="text-gold fw-bold">
                                    {{ number_format(3000000 + ($i * 500000)) }} EGP
                                </div>
                            </div>
                            
                            <h5 class="fw-bold mb-2">
                                <a href="{{ route('projects.index') }}" class="text-decoration-none text-dark">
                                    {{ __('Premium Project') }} {{ $i }}
                                </a>
                            </h5>
                            
                            <p class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt text-gold me-1"></i>
                                {{ __('New Cairo, Egypt') }}
                            </p>
                            
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-bed text-gold"></i>
                                        <small class="d-block">{{ 2 + ($i % 3) }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-bath text-gold"></i>
                                        <small class="d-block">{{ 1 + ($i % 2) }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-ruler-combined text-gold"></i>
                                        <small class="d-block">{{ 100 + ($i * 20) }}m²</small>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.index') }}" class="btn btn-primary-custom w-100">
                                {{ __('View Details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
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
