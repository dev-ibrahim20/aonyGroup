@extends('frontend.layouts.app')

@section('title', __('Home'))
@section('seo_description', __('Aony Group - Premium Real Estate Development Company. Discover luxury properties and investment opportunities.'))
@section('seo_keywords', 'real estate, luxury properties, investment, development, Egypt')

@section('content')
<!-- Hero Section -->
@include('frontend.sections.hero')

<!-- Featured Projects -->
@include('frontend.sections.featured-projects')

<!-- Statistics Section -->
@include('frontend.sections.statistics')

<!-- Why Choose Us -->
@include('frontend.sections.why-choose-us')

<!-- Services Section -->
@include('frontend.sections.services')

<!-- Latest Projects -->
@include('frontend.sections.latest-projects')

<!-- Investment Opportunities -->
@include('frontend.sections.investment')

<!-- Testimonials -->
@include('frontend.sections.testimonials')

<!-- Clients & Partners -->
@include('frontend.sections.partners')

<!-- Blog Preview -->
@include('frontend.sections.blog-preview')

<!-- CTA Section -->
@include('frontend.sections.cta')

<!-- Contact Section -->
@include('frontend.sections.contact-section')

<!-- Map Section -->
@include('frontend.sections.map')
@endsection

@push('scripts')
<script>
    // Hero slider initialization
    $('.hero-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true
    });
    
    // Testimonials slider
    $('.testimonials-slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    
    // Partners slider
    $('.partners-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
    
    // Counter animation
    $('.counter').each(function() {
        const $this = $(this);
        const countTo = $this.attr('data-count');
        
        $({ countNum: $this.text() }).animate({
            countNum: countTo
        },
        {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }
        });
    });
</script>
@endpush
