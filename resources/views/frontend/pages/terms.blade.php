@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))
@section('seo_description', __('Aony Group terms and conditions. Read our terms of service and use agreement.'))
@section('seo_keywords', 'terms and conditions, terms of service, legal agreement, user agreement')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Terms & Conditions') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Terms & Conditions') }}</h1>
    </div>
</div>

<!-- Terms Content -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light p-5 rounded-4" data-aos="fade-up">
                    <h3 class="fw-bold mb-4">{{ __('Acceptance of Terms') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('By accessing and using the Aony Group website, you agree to be bound by these Terms and Conditions. If you do not agree to these terms, please do not use our website.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Use of Website') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('You may use our website for personal and non-commercial purposes. You may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information obtained from our website.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Property Information') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('While we strive to provide accurate and up-to-date information, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information contained on our website.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Intellectual Property') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('All content on this website, including text, graphics, logos, images, and software, is the property of Aony Group or its content suppliers and is protected by international copyright laws.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Limitation of Liability') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('In no event shall Aony Group be liable for any indirect, incidental, special, consequential, or punitive damages arising out of your access to or use of this website.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Governing Law') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('These Terms and Conditions shall be governed by and construed in accordance with the laws of Egypt. Any disputes arising under these terms shall be subject to the exclusive jurisdiction of the Egyptian courts.') }}
                    </p>
                    
                    <h3 class="fw-bold mb-4">{{ __('Changes to Terms') }}</h3>
                    <p class="text-muted mb-4">
                        {{ __('We reserve the right to modify these Terms and Conditions at any time. Your continued use of the website following any changes constitutes your acceptance of the new terms.') }}
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
