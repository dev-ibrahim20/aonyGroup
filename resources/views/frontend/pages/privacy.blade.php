@extends('frontend.layouts.app')

@section('title', __('Privacy Policy'))
@section('seo_description', __('Aony Group privacy policy. Learn how we collect, use, and protect your personal information.'))
@section('seo_keywords', 'privacy policy, data protection, personal information, GDPR')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Privacy Policy') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Privacy Policy') }}</h1>
    </div>
</div>

<!-- Privacy Content -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light p-5 rounded-4" data-aos="fade-up">
                    <h3 class="fw-bold mb-4">{{ __('Introduction') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('At Aony Group, we are committed to protecting your privacy. This policy outlines how we collect, use, and safeguard your personal information.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Information We Collect') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('We collect information you provide directly to us, such as when you fill out a form, subscribe to our newsletter, or contact us. This may include your name, email address, phone number, and other contact details.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('How We Use Your Information') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('We use your information to provide services, respond to inquiries, send updates and marketing materials, and improve our offerings. We do not sell your personal information to third parties.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Data Security') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Your Rights') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('You have the right to access, correct, or delete your personal information. You may also opt out of marketing communications at any time.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Contact Us') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('If you have any questions about this privacy policy, please contact us at') }} {{ config('contact.email') ?? 'info@aonygroup.com' }}
                    </p>
                    
                    <p class="text-muted small">
                        {{ __('Last updated:') }} {{ date('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
