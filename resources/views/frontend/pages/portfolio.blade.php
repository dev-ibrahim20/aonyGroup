@extends('frontend.layouts.app')

@section('title', __('Portfolio'))
@section('seo_description', __('Explore Aony Group portfolio of completed projects. View our successful real estate developments and achievements.'))
@section('seo_keywords', 'portfolio, completed projects, real estate achievements, project gallery')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Portfolio') }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mt-3">{{ __('Our Portfolio') }}</h1>
    </div>
</div>

<!-- Portfolio Hero -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Our Work') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Completed Projects') }}</h2>
            <p class="text-muted lead">{{ __('Explore our portfolio of successful real estate developments') }}</p>
        </div>
        
        <!-- Portfolio Filters -->
        <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="btn-group flex-wrap gap-2">
                <button class="btn btn-outline-primary active filter-btn" data-filter="all">{{ __('All') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="residential">{{ __('Residential') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="commercial">{{ __('Commercial') }}</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="mixed">{{ __('Mixed Use') }}</button>
            </div>
        </div>
        
        <!-- Portfolio Grid -->
        <div class="row g-4" id="portfolio-grid">
            @php
                $portfolios = \App\Models\Portfolio::where('status', 'active')->get();
                $categories = ['residential', 'commercial', 'mixed'];
            @endphp
            @foreach($portfolios as $index => $portfolio)
                @php
                    $category = $categories[$index % 3];
                    $media = $portfolio->media()->where('type', 'image')->first();
                    $imageUrl = $media ? $media->url : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=600&fit=crop';
                @endphp
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="{{ $category }}" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="gallery-item">
                        <img src="{{ $imageUrl }}"
                             alt="{{ $portfolio->title }}"
                             class="w-100"
                             style="height: 300px; object-fit: cover;"
                             onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, var(--primary-color), var(--accent-color))'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white\'><span>{{ __('Image Not Available') }}</span></div>'">
                        <div class="gallery-overlay">
                            <div class="text-center text-white">
                                <h5 class="fw-bold mb-2">{{ $portfolio->title }}</h5>
                                <p class="small mb-3">{{ $portfolio->category }}</p>
                                @if($portfolio->project_url)
                                <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-gold btn-sm">
                                    {{ __('View Details') }}
                                </a>
                                @else
                                <button class="btn btn-gold btn-sm">
                                    {{ __('View Details') }}
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistics -->
@include('frontend.sections.statistics')

<!-- CTA -->
@include('frontend.sections.cta')
@endsection

@push('scripts')
<script>
    // Portfolio filtering
    $('.filter-btn').click(function() {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        const filter = $(this).data('filter');
        
        if (filter === 'all') {
            $('.portfolio-item').show();
        } else {
            $('.portfolio-item').hide();
            $('.portfolio-item[data-category="' + filter + '"]').show();
        }
    });
</script>
@endpush
