<!-- Why Choose Us Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="position-relative">
                    <img src="{{ asset('images/why-choose-us.jpg') }}" alt="{{ __('Why Choose Us') }}" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 end-0 m-4 p-4 bg-gold text-white rounded-4 shadow-lg">
                        <h3 class="fw-bold mb-0">25+</h3>
                        <p class="mb-0 small">{{ __('Years of Excellence') }}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Why Choose Us') }}</span>
                <h2 class="display-5 fw-bold mb-4">{{ __('Building Trust Through Excellence') }}</h2>
                <p class="text-muted lead mb-5">
                    {{ __('We are committed to delivering exceptional quality and innovative solutions that exceed expectations.') }}
                </p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-award"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Quality Assurance') }}</h5>
                                <p class="text-muted small">{{ __('Highest standards in construction and design') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Expert Team') }}</h5>
                                <p class="text-muted small">{{ __('Skilled professionals with years of experience') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Flexible Payment') }}</h5>
                                <p class="text-muted small">{{ __('Multiple payment plans to suit your needs') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('24/7 Support') }}</h5>
                                <p class="text-muted small">{{ __('Dedicated customer service always available') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Sustainable Design') }}</h5>
                                <p class="text-muted small">{{ __('Eco-friendly and energy-efficient buildings') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Prime Locations') }}</h5>
                                <p class="text-muted small">{{ __('Strategic locations with high investment value') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <a href="{{ route('about') }}" class="btn btn-primary-custom">
                        {{ __('Learn More About Us') }}
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
