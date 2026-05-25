<!-- Contact Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Contact Us') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Get In Touch') }}</h2>
            <p class="text-muted lead">{{ __('Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.') }}</p>
        </div>
        
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <form action="{{ route('contact') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('First Name') }}</label>
                                <input type="text" class="form-control form-control-custom" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Last Name') }}</label>
                                <input type="text" class="form-control form-control-custom" name="last_name" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Email Address') }}</label>
                                <input type="email" class="form-control form-control-custom" name="email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Phone Number') }}</label>
                                <input type="tel" class="form-control form-control-custom" name="phone">
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Subject') }}</label>
                                <select class="form-select form-control-custom" name="subject">
                                    <option value="">{{ __('Select Subject') }}</option>
                                    <option value="general">{{ __('General Inquiry') }}</option>
                                    <option value="sales">{{ __('Sales Inquiry') }}</option>
                                    <option value="investment">{{ __('Investment Inquiry') }}</option>
                                    <option value="support">{{ __('Customer Support') }}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Message') }}</label>
                                <textarea class="form-control form-control-custom" name="message" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-custom w-100">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    {{ __('Send Message') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold mb-4">{{ __('Contact Information') }}</h4>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="service-icon flex-shrink-0 me-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('Address') }}</h5>
                            <p class="text-muted">{{ config('contact.address') ?? 'Cairo, Egypt' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="service-icon flex-shrink-0 me-3">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('Phone') }}</h5>
                            <p class="text-muted">{{ config('contact.phone') ?? '+20 100 000 0000' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="service-icon flex-shrink-0 me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('Email') }}</h5>
                            <p class="text-muted">{{ config('contact.email') ?? 'info@aonygroup.com' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="service-icon flex-shrink-0 me-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('Working Hours') }}</h5>
                            <p class="text-muted">{{ __('Sunday - Thursday: 9:00 AM - 6:00 PM') }}</p>
                            <p class="text-muted">{{ __('Friday - Saturday: Closed') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">{{ __('Follow Us') }}</h6>
                        <div class="d-flex gap-2">
                            <a href="{{ config('social.facebook') ?? '#' }}" class="social-icon" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{ config('social.twitter') ?? '#' }}" class="social-icon" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{{ config('social.instagram') ?? '#' }}" class="social-icon" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="{{ config('social.linkedin') ?? '#' }}" class="social-icon" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-icon:hover {
        background: var(--secondary-color);
        transform: translateY(-3px);
        color: var(--dark-color);
    }
</style>
