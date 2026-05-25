@extends('frontend.layouts.app')

@section('title', __('Contact Us'))
@section('seo_description', __('Get in touch with Aony Group. Contact us for inquiries, consultations, or to learn more about our real estate projects and services.'))
@section('seo_keywords', 'contact us, real estate inquiry, consultation, customer support')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Contact Us') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Contact Us') }}</h1>
    </div>
</div>

<!-- Contact Section -->
@include('frontend.sections.contact-section')

<!-- Map Section -->
@include('frontend.sections.map')
@endsection
