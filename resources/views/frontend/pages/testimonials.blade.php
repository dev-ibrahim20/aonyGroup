@extends('frontend.layouts.app')

@section('title', __('Testimonials'))
@section('seo_description', __('Read what our clients say about Aony Group. Real testimonials from satisfied customers and investors.'))
@section('seo_keywords', 'testimonials, client reviews, customer feedback, success stories')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Testimonials') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Client Testimonials') }}</h1>
    </div>
</div>

<!-- Testimonials Section -->
@include('frontend.sections.testimonials')

<!-- CTA -->
@include('frontend.sections.cta')
@endsection
