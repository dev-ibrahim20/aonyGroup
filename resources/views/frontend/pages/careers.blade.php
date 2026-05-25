@extends('frontend.layouts.app')

@section('title', __('Careers'))
@section('seo_description', __('Join Aony Group team. Explore career opportunities in real estate development and grow with us.'))
@section('seo_keywords', 'careers, jobs, employment, real estate careers, join our team')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Careers') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Careers') }}</h1>
    </div>
</div>

<!-- Careers Hero -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Join Our Team') }}</span>
                <h2 class="display-5 fw-bold mb-4">{{ __('Build Your Career With Us') }}</h2>
                <p class="text-muted lead mb-4">
                    {{ __('Join a dynamic team of professionals dedicated to excellence in real estate development. We offer competitive benefits and growth opportunities.') }}
                </p>
                <a href="#openings" class="btn btn-primary-custom">
                    {{ __('View Open Positions') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('images/careers.jpg') }}" alt="{{ __('Careers') }}" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Why Work With Us -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">{{ __('Why Work With Us') }}</h2>
            <p class="text-muted lead">{{ __('Discover the benefits of joining our team') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="bg-white p-4 rounded-4 shadow-sm text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Career Growth') }}</h5>
                    <p class="text-muted small">{{ __('Continuous learning and advancement opportunities') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white p-4 rounded-4 shadow-sm text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Health Benefits') }}</h5>
                    <p class="text-muted small">{{ __('Comprehensive health insurance for you and your family') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white p-4 rounded-4 shadow-sm text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Great Culture') }}</h5>
                    <p class="text-muted small">{{ __('Collaborative and inclusive work environment') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions -->
<section id="openings" class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">{{ __('Open Positions') }}</h2>
            <p class="text-muted lead">{{ __('Find your perfect role') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-12" data-aos="fade-up">
                <div class="bg-light p-4 rounded-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-1">{{ __('Senior Project Manager') }}</h5>
                            <p class="text-muted small mb-0"><i class="fas fa-map-marker-alt me-1"></i>{{ __('Cairo, Egypt') }}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="badge bg-gold">{{ __('Full Time') }}</span>
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-primary-custom btn-sm">{{ __('Apply Now') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-light p-4 rounded-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-1">{{ __('Sales Executive') }}</h5>
                            <p class="text-muted small mb-0"><i class="fas fa-map-marker-alt me-1"></i>{{ __('Cairo, Egypt') }}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="badge bg-gold">{{ __('Full Time') }}</span>
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-primary-custom btn-sm">{{ __('Apply Now') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-light p-4 rounded-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-1">{{ __('Architect') }}</h5>
                            <p class="text-muted small mb-0"><i class="fas fa-map-marker-alt me-1"></i>{{ __('Cairo, Egypt') }}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="badge bg-gold">{{ __('Full Time') }}</span>
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-primary-custom btn-sm">{{ __('Apply Now') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
@include('frontend.sections.cta')
@endsection
