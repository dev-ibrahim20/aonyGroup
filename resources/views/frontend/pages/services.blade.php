@extends('frontend.layouts.app')

@section('title', __('Services'))
@section('seo_description', __('Discover Aony Group comprehensive real estate services including development, property management, investment consulting, and more.'))
@section('seo_keywords', 'real estate services, property management, investment consulting, architecture design')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Services') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Our Services') }}</h1>
    </div>
</div>

<!-- Services Hero -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('What We Do') }}</span>
                <h2 class="display-5 fw-bold mb-4">{{ __('Comprehensive Real Estate Solutions') }}</h2>
                <p class="text-muted lead mb-4">
                    {{ __('From concept to completion, we offer end-to-end real estate services tailored to meet your unique needs and exceed your expectations.') }}
                </p>
                <p class="text-muted mb-4">
                    {{ __('Our team of experts brings decades of experience across all aspects of real estate development, ensuring that every project we undertake is delivered to the highest standards of quality and excellence.') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary-custom">
                    {{ __('Get Started') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('images/services-hero.jpg') }}" alt="{{ __('Services') }}" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Services Detail -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">{{ __('Our Core Services') }}</h2>
            <p class="text-muted lead">{{ __('Expert solutions for all your real estate needs') }}</p>
        </div>
        
        <div class="row g-4">
            <!-- Real Estate Development -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Real Estate Development') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('We transform land into thriving communities through comprehensive development services that include planning, construction, and delivery of premium residential and commercial properties.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Residential complexes') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Commercial towers') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Mixed-use developments') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Gated communities') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Property Management -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-cogs"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Property Management') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('Professional property management services to maximize your investment returns while ensuring your property is maintained to the highest standards.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Tenant management') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Maintenance services') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Financial reporting') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Legal compliance') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Investment Consulting -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Investment Consulting') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('Expert investment advice to help you make informed decisions and maximize returns on your real estate investments.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Market analysis') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Investment strategy') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('ROI projections') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Risk assessment') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Architecture Design -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-drafting-compass"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Architecture Design') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('Innovative architectural solutions that blend aesthetics with functionality, creating spaces that inspire and endure.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Concept design') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('3D visualization') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Blueprint creation') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Permit acquisition') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Interior Design -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-couch"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Interior Design') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('Transform your spaces with our expert interior design services that reflect your style and enhance your lifestyle.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Space planning') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Material selection') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Custom furniture') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Lighting design') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sales & Marketing -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="service-icon mx-auto">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">{{ __('Sales & Marketing') }}</h3>
                            <p class="text-muted mb-3">
                                {{ __('Comprehensive sales and marketing strategies to help you sell or rent your property quickly and at the best price.') }}
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Property listing') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Digital marketing') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Open houses') }}</li>
                                <li class="mb-1"><i class="fas fa-check text-gold me-2"></i>{{ __('Negotiation support') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Process') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('How We Work') }}</h2>
            <p class="text-muted lead">{{ __('A streamlined approach to delivering excellence') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="fw-bold" style="font-size: 32px;">01</span>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Consultation') }}</h5>
                    <p class="text-muted small">{{ __('We listen to your needs and understand your vision.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="fw-bold" style="font-size: 32px;">02</span>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Planning') }}</h5>
                    <p class="text-muted small">{{ __('We create a detailed plan tailored to your requirements.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="fw-bold" style="font-size: 32px;">03</span>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Execution') }}</h5>
                    <p class="text-muted small">{{ __('We execute with precision and attention to detail.') }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="fw-bold" style="font-size: 32px;">04</span>
                    </div>
                    <h5 class="fw-bold mb-2">{{ __('Delivery') }}</h5>
                    <p class="text-muted small">{{ __('We deliver on time and exceed expectations.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
@include('frontend.sections.cta')
@endsection
