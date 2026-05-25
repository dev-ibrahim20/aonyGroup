<!-- Latest Projects Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('New Arrivals') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Latest Projects') }}</h2>
            <p class="text-muted lead">{{ __('Explore our newest developments and upcoming launches') }}</p>
        </div>
        
        <div class="row g-4">
            @for($i = 1; $i <= 3; $i++)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="project-card card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('images/project-' . $i . '.jpg') }}" 
                                 alt="{{ __('Project') }}" 
                                 class="w-100" 
                                 style="height: 300px; object-fit: cover;"
                                 onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, var(--primary-color), var(--accent-color))'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white\'><span>{{ __('Image Not Available') }}</span></div>'">
                            
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-gold">{{ __('New') }}</span>
                            </div>
                            
                            <div class="position-absolute bottom-0 start-0 end-0 p-4" 
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <h5 class="text-white fw-bold mb-1">
                                    {{ __('Luxury Residence') }} {{ $i }}
                                </h5>
                                <p class="text-white-50 small mb-0">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    {{ __('New Cairo, Egypt') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="text-gold fw-bold">
                                    {{ number_format(5000000 + ($i * 1000000)) }} EGP
                                </div>
                                <div class="small text-muted">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ __('Q4 2024') }}
                                </div>
                            </div>
                            
                            <div class="progress-custom mb-3">
                                <div class="progress-bar-custom" style="width: {{ 60 + ($i * 10) }}%"></div>
                            </div>
                            <p class="small text-muted mb-3">{{ __('Completion Progress') }}: {{ 60 + ($i * 10) }}%</p>
                            
                            <a href="{{ route('projects.index') }}" class="btn btn-primary-custom w-100">
                                {{ __('View Project') }}
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
