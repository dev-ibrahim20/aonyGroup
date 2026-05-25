<!-- Blog Preview Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Blog') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Latest News & Insights') }}</h2>
            <p class="text-muted lead">{{ __('Stay updated with our latest articles and industry news') }}</p>
        </div>
        
        <div class="row g-4">
            @for($i = 1; $i <= 3; $i++)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('images/blog-placeholder.jpg') }}" 
                                     alt="{{ __('Blog') }}" 
                                     class="w-100" 
                                     style="height: 200px; object-fit: cover;">
                                
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-gold">{{ __('News') }}</span>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-alt text-gold me-2"></i>
                                    <small class="text-muted">{{ date('M d, Y') }}</small>
                                </div>
                                
                                <h5 class="fw-bold mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        {{ __('Latest Real Estate Trends in Egypt') }}
                                    </a>
                                </h5>
                                
                                <p class="text-muted small mb-3">
                                    {{ __('Discover the latest trends shaping the real estate market in Egypt and what it means for investors.') }}
                                </p>
                                
                                <a href="#" class="btn btn-link text-gold text-decoration-none p-0">
                                    {{ __('Read More') }} <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg">
                {{ __('View All Articles') }}
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
