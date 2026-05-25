@extends('frontend.layouts.app')

@section('title', __('About Us'))
@section('seo_description', __('Learn about Aony Group - Our story, mission, values, and commitment to excellence in real estate development.'))
@section('seo_keywords', 'about us, company profile, real estate development, mission, vision')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('About Us') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('About Us') }}</h1>
    </div>
</div>

<!-- About Hero -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Story') }}</span>
                <h2 class="display-5 fw-bold mb-4">{{ __('Building Excellence Since 1999') }}</h2>
                <p class="text-muted lead mb-4">
                    {{ __('Aony Group has been at the forefront of real estate development in Egypt for over two decades. We transform visions into iconic landmarks that define skylines and create lasting value for our stakeholders.') }}
                </p>
                <p class="text-muted mb-4">
                    {{ __('Our journey began with a simple mission: to create exceptional living spaces that combine luxury, comfort, and sustainability. Today, we are proud to have delivered over 150 projects across Egypt, each one a testament to our commitment to quality and innovation.') }}
                </p>
                <div class="row g-4 mb-4">
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Quality First') }}</h5>
                                <p class="text-muted small">{{ __('Premium materials and craftsmanship') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="service-icon flex-shrink-0 me-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">{{ __('Innovation') }}</h5>
                                <p class="text-muted small">{{ __('Cutting-edge design solutions') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('projects.index') }}" class="btn btn-primary-custom">
                    {{ __('View Our Projects') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <img src="{{ asset('images/about-hero.jpg') }}" alt="{{ __('About Us') }}" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 end-0 m-4 p-4 bg-gold text-white rounded-4 shadow-lg">
                        <h3 class="fw-bold mb-0">25+</h3>
                        <p class="mb-0 small">{{ __('Years of Experience') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="fw-bold mb-3">{{ __('Our Mission') }}</h3>
                    <p class="text-muted">
                        {{ __('To deliver exceptional real estate developments that exceed expectations, create sustainable communities, and provide our clients with premium properties that offer both comfort and investment value.') }}
                    </p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Deliver superior quality') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Innovative design solutions') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Sustainable development practices') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Customer-centric approach') }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="fw-bold mb-3">{{ __('Our Vision') }}</h3>
                    <p class="text-muted">
                        {{ __('To be the leading real estate developer in Egypt and the region, recognized for our commitment to excellence, innovation, and sustainable development that shapes the future of urban living.') }}
                    </p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Industry leadership') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Regional expansion') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Setting new standards') }}</li>
                        <li class="mb-2"><i class="fas fa-check text-gold me-2"></i>{{ __('Creating lasting legacy') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Values') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Core Values That Guide Us') }}</h2>
            <p class="text-muted lead">{{ __('The principles that define who we are and how we work') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="card h-100 border-0 shadow-sm card-hover text-center p-4">
                    <div class="service-icon mx-auto mb-4">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Excellence') }}</h5>
                    <p class="text-muted small">{{ __('We strive for excellence in everything we do, from design to delivery.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm card-hover text-center p-4">
                    <div class="service-icon mx-auto mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Integrity') }}</h5>
                    <p class="text-muted small">{{ __('We conduct business with honesty, transparency, and ethical standards.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm card-hover text-center p-4">
                    <div class="service-icon mx-auto mb-4">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Innovation') }}</h5>
                    <p class="text-muted small">{{ __('We embrace innovation and continuously seek new ways to improve.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm card-hover text-center p-4">
                    <div class="service-icon mx-auto mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Collaboration') }}</h5>
                    <p class="text-muted small">{{ __('We believe in teamwork and building strong partnerships.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Team') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Meet Our Leadership') }}</h2>
            <p class="text-muted lead">{{ __('Experienced professionals dedicated to your success') }}</p>
        </div>
        
        <div class="row g-4">
            @for($i = 1; $i <= 4; $i++)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="card h-100 border-0 shadow-sm card-hover text-center">
                        <img src="{{ asset('images/team/team-' . $i . '.jpg') }}" 
                             alt="{{ __('Team Member') }}" 
                             class="w-100"
                             style="height: 300px; object-fit: cover;"
                             onerror="this.src='{{ asset('images/avatar-placeholder.jpg') }}'">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1">{{ __('Team Member') }} {{ $i }}</h5>
                            <p class="text-gold small mb-2">{{ __('Executive Position') }}</p>
                            <p class="text-muted small">{{ __('Expert in real estate development with over 15 years of experience.') }}</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Certifications') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Our Certifications & Awards') }}</h2>
            <p class="text-muted lead">{{ __('Recognized for excellence and industry leadership') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="bg-light p-4 rounded-4 text-center">
                    <i class="fas fa-award text-gold" style="font-size: 48px;"></i>
                    <h5 class="fw-bold mt-3">{{ __('ISO 9001:2015') }}</h5>
                    <p class="text-muted small">{{ __('Quality Management System Certified') }}</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-light p-4 rounded-4 text-center">
                    <i class="fas fa-leaf text-gold" style="font-size: 48px;"></i>
                    <h5 class="fw-bold mt-3">{{ __('LEED Certified') }}</h5>
                    <p class="text-muted small">{{ __('Leadership in Energy and Environmental Design') }}</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-light p-4 rounded-4 text-center">
                    <i class="fas fa-trophy text-gold" style="font-size: 48px;"></i>
                    <h5 class="fw-bold mt-3">{{ __('Best Developer 2023') }}</h5>
                    <p class="text-muted small">{{ __('Egypt Real Estate Awards') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
@include('frontend.sections.cta')
@endsection
