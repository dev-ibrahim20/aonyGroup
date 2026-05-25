<footer class="footer-gradient text-white">
    <!-- Main Footer -->
    <div class="section-padding">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="mb-4">
                        <img src="{{ asset('images/logo-white.png') }}" alt="{{ config('app.name') }}" height="50" class="mb-3">
                        <p class="text-white-50">
                            {{ __('Aony Group is a leading real estate development company committed to creating exceptional living spaces and investment opportunities.') }}
                        </p>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="social-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ __('Address') }}</h6>
                                <p class="text-white-50 mb-0 small">{{ config('contact.address') ?? 'Cairo, Egypt' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="social-icon me-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ __('Phone') }}</h6>
                                <p class="text-white-50 mb-0 small">{{ config('contact.phone') ?? '+20 100 000 0000' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="social-icon me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ __('Email') }}</h6>
                                <p class="text-white-50 mb-0 small">{{ config('contact.email') ?? 'info@aonygroup.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h5 class="mb-4 text-gold">{{ __('Quick Links') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('about') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('About Us') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('projects.index') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Projects') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Services') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('portfolio') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Portfolio') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('contact') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Contact') }}
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4 text-gold">{{ __('Our Services') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Real Estate Development') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Property Management') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Investment Consulting') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Architecture Design') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('services') }}" class="text-white-50 text-decoration-none hover:text-gold">
                                {{ __('Interior Design') }}
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4 text-gold">{{ __('Newsletter') }}</h5>
                    <p class="text-white-50 mb-3">
                        {{ __('Subscribe to our newsletter for the latest updates and offers.') }}
                    </p>
                    <form class="newsletter-form">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="{{ __('Your Email') }}" required>
                            <button class="btn btn-gold" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    
                    <!-- Social Media -->
                    <div class="mt-4">
                        <h6 class="mb-3">{{ __('Follow Us') }}</h6>
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
                            <a href="{{ config('social.youtube') ?? '#' }}" class="social-icon" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Footer -->
    <div class="py-4" style="background: rgba(0, 0, 0, 0.2);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50 small">
                        © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="{{ route('privacy') }}" class="text-white-50 text-decoration-none small hover:text-gold">
                            {{ __('Privacy Policy') }}
                        </a>
                        <a href="{{ route('terms') }}" class="text-white-50 text-decoration-none small hover:text-gold">
                            {{ __('Terms & Conditions') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-gradient {
        background: linear-gradient(135deg, #1a365d 0%, #2d3748 100%);
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-icon:hover {
        background: var(--secondary-color);
        transform: translateY(-3px);
        color: var(--dark-color);
    }
    
    .footer-gradient a:hover {
        color: var(--secondary-color);
    }
    
    .newsletter-form .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: 8px;
    }
    
    .newsletter-form .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: var(--secondary-color);
        color: white;
    }
    
    .newsletter-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    @media (max-width: 768px) {
        .footer-gradient {
            text-align: center;
        }
        
        .footer-gradient .d-flex {
            justify-content: center;
        }
    }
</style>

<script>
    // Newsletter form submission
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input[type="email"]').value;
        
        // Show success message
        alert('{{ __('Thank you for subscribing!') }}');
        this.reset();
    });
</script>
