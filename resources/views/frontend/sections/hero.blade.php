<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <!-- Video Background -->
    <div class="video-background">
        @if(file_exists(public_path('videos/hero-video.mp4')))
            <video autoplay muted loop playsinline class="w-100 h-100 object-cover">
                <source src="{{ asset('videos/hero-video.mp4') }}" type="video/mp4">
            </video>
        @else
            <div class="hero-image" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);"></div>
        @endif
        <div class="video-overlay"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="hero-content position-relative z-1">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8">
                    <div class="hero-text" data-aos="fade-up" data-aos-duration="1000">
                        <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">
                            {{ __('Welcome to Aony Group') }}
                        </span>
                        <h1 class="display-3 fw-bold mb-4 text-white">
                            {{ __('Building Dreams,') }}
                            <br>
                            <span class="text-gold">{{ __('Creating Legacy') }}</span>
                        </h1>
                        <p class="lead text-white-50 mb-5">
                            {{ __('Discover premium real estate opportunities and luxury living spaces crafted with excellence and innovation.') }}
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('projects.index') }}" class="btn btn-gold btn-lg">
                                {{ __('Explore Projects') }}
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                                {{ __('Contact Us') }}
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Search Form -->
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="search-form glass-effect rounded-4 p-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        <h4 class="text-white mb-4">{{ __('Find Your Property') }}</h4>
                        <form action="{{ route('search.projects') }}" method="GET">
                            <div class="mb-3">
                                <label class="text-white small mb-2">{{ __('Property Type') }}</label>
                                <select class="form-select form-control-custom" name="type">
                                    <option value="">{{ __('All Types') }}</option>
                                    <option value="residential">{{ __('Residential') }}</option>
                                    <option value="commercial">{{ __('Commercial') }}</option>
                                    <option value="mixed">{{ __('Mixed Use') }}</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="text-white small mb-2">{{ __('Location') }}</label>
                                <select class="form-select form-control-custom" name="location">
                                    <option value="">{{ __('All Locations') }}</option>
                                    <option value="cairo">{{ __('Cairo') }}</option>
                                    <option value="alexandria">{{ __('Alexandria') }}</option>
                                    <option value="giza">{{ __('Giza') }}</option>
                                    <option value="new_cairo">{{ __('New Cairo') }}</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="text-white small mb-2">{{ __('Price Range') }}</label>
                                <select class="form-select form-control-custom" name="price_range">
                                    <option value="">{{ __('Any Price') }}</option>
                                    <option value="1-2">{{ __('1M - 2M EGP') }}</option>
                                    <option value="2-5">{{ __('2M - 5M EGP') }}</option>
                                    <option value="5-10">{{ __('5M - 10M EGP') }}</option>
                                    <option value="10+">{{ __('10M+ EGP') }}</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="text-white small mb-2">{{ __('Bedrooms') }}</label>
                                <select class="form-select form-control-custom" name="bedrooms">
                                    <option value="">{{ __('Any') }}</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-gold w-100">
                                <i class="fas fa-search me-2"></i>
                                {{ __('Search') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x">
        <a href="#featured-projects" class="text-white text-decoration-none">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <p class="small text-white-50 mt-2">{{ __('Scroll Down') }}</p>
        </a>
    </div>
</section>

<style>
    .hero-section {
        min-height: 100vh;
        position: relative;
    }
    
    .video-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }
    
    .video-background video {
        object-fit: cover;
    }
    
    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26, 54, 93, 0.85) 0%, rgba(45, 55, 72, 0.75) 100%);
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
        padding-top: 80px;
    }
    
    .search-form {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .scroll-indicator {
        z-index: 2;
        padding-bottom: 30px;
    }
    
    .mouse {
        width: 26px;
        height: 40px;
        border: 2px solid white;
        border-radius: 20px;
        position: relative;
        margin: 0 auto;
    }
    
    .wheel {
        width: 4px;
        height: 8px;
        background: white;
        border-radius: 2px;
        position: absolute;
        top: 6px;
        left: 50%;
        transform: translateX(-50%);
        animation: scroll 1.5s infinite;
    }
    
    @keyframes scroll {
        0% {
            top: 6px;
            opacity: 1;
        }
        100% {
            top: 20px;
            opacity: 0;
        }
    }
    
    @media (max-width: 991px) {
        .hero-text {
            text-align: center;
        }
        
        .hero-text h1 {
            font-size: 2.5rem;
        }
        
        .search-form {
            margin-top: 30px;
        }
    }
</style>
