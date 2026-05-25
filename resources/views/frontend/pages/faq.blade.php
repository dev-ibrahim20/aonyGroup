@extends('frontend.layouts.app')

@section('title', __('FAQ'))
@section('seo_description', __('Frequently asked questions about Aony Group services, projects, and processes. Find answers to common inquiries.'))
@section('seo_keywords', 'FAQ, frequently asked questions, help, support, inquiries')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('FAQ') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Frequently Asked Questions') }}</h1>
    </div>
</div>

<!-- FAQ Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ Item 1 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded" data-aos="fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                {{ __('What types of properties do you develop?') }}
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('We develop a wide range of properties including residential complexes, commercial towers, mixed-use developments, and gated communities. Our projects cater to various needs and budgets.') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                {{ __('What payment plans do you offer?') }}
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('We offer flexible payment plans including installment options up to 8 years with low down payments starting from 5%. We also have cash payment discounts available.') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                {{ __('How can I schedule a site visit?') }}
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('You can schedule a site visit by contacting our sales team through phone, email, or by filling out the contact form on our website. Our team will arrange a convenient time for you.') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 4 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                {{ __('Do you offer property management services?') }}
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('Yes, we offer comprehensive property management services including tenant management, maintenance, financial reporting, and legal compliance for property owners.') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 5 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                {{ __('What is your warranty policy?') }}
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('We provide a comprehensive warranty on all our properties including structural warranty for 10 years and systems warranty for 2 years. Specific terms may vary by project.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <p class="text-muted mb-3">{{ __('Still have questions?') }}</p>
            <a href="{{ route('contact') }}" class="btn btn-primary-custom">
                {{ __('Contact Us') }}
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endsection
