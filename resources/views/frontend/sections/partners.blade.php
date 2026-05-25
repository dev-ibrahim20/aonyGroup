<!-- Partners Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Partners') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Our Trusted Partners') }}</h2>
            <p class="text-muted lead">{{ __('Working with industry leaders to deliver excellence') }}</p>
        </div>
        
        <div class="partners-slider" data-aos="fade-up" data-aos-delay="100">
            @for($i = 1; $i <= 8; $i++)
                <div class="px-4">
                    <div class="bg-white p-4 rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="height: 120px;">
                        <img src="{{ asset('images/partners/partner-' . $i . '.png') }}" 
                             alt="{{ __('Partner') }} {{ $i }}" 
                             class="img-fluid"
                             style="max-height: 60px; opacity: 0.7;"
                             onerror="this.style.display='none'; this.parentElement.innerHTML='<h5 class=\'text-muted fw-bold\'>Partner {{ $i }}</h5>';">
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
