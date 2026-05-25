<!-- Testimonials Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Testimonials') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('What Our Clients Say') }}</h2>
            <p class="text-muted lead">{{ __('Real stories from real clients who trusted us with their dreams') }}</p>
        </div>
        
        <div class="testimonials-slider" data-aos="fade-up" data-aos-delay="100">
            @for($i = 1; $i <= 3; $i++)
                <div>
                    <div class="testimonial-card mx-3">
                        <div class="mb-4">
                            <i class="fas fa-star text-gold"></i>
                            <i class="fas fa-star text-gold"></i>
                            <i class="fas fa-star text-gold"></i>
                            <i class="fas fa-star text-gold"></i>
                            <i class="fas fa-star text-gold"></i>
                        </div>
                        <p class="text-muted mb-4 fst-italic">
                            "{{ __('Excellent service and professionalism. The team delivered beyond our expectations. Highly recommended!') }}"
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/avatar-placeholder.jpg') }}" 
                                    alt="{{ __('Client') }}" 
                                    class="rounded-circle me-3"
                                    style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-0">{{ __('Client Name') }} {{ $i }}</h6>
                                <p class="small text-muted mb-0">{{ __('Property Investor') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
