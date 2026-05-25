<!-- Investment Opportunities Section -->
<section class="section-padding hero-gradient text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Investment') }}</span>
                <h2 class="display-5 fw-bold mb-4">{{ __('Smart Investment Opportunities') }}</h2>
                <p class="lead text-white-50 mb-4">
                    {{ __('Invest in prime real estate with guaranteed returns. Our properties offer excellent appreciation potential and steady rental income.') }}
                </p>
                
                <div class="row g-4 mb-4">
                    <div class="col-6">
                        <div class="glass-effect p-3 rounded-3 text-center">
                            <h3 class="fw-bold text-gold">15%</h3>
                            <p class="small text-white-50 mb-0">{{ __('Annual ROI') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="glass-effect p-3 rounded-3 text-center">
                            <h3 class="fw-bold text-gold">5%</h3>
                            <p class="small text-white-50 mb-0">{{ __('Down Payment') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="glass-effect p-3 rounded-3 text-center">
                            <h3 class="fw-bold text-gold">8</h3>
                            <p class="small text-white-50 mb-0">{{ __('Years Installments') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="glass-effect p-3 rounded-3 text-center">
                            <h3 class="fw-bold text-gold">0%</h3>
                            <p class="small text-white-50 mb-0">{{ __('Interest Rate') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('contact') }}" class="btn btn-gold btn-lg">
                        {{ __('Start Investing') }}
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-light btn-lg">
                        {{ __('View Properties') }}
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <img src="{{ asset('images/investment.jpg') }}" alt="{{ __('Investment') }}" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute top-50 start-50 translate-middle glass-effect p-4 rounded-4 text-center" style="width: 200px;">
                        <h3 class="fw-bold text-gold mb-0">500M+</h3>
                        <p class="small text-white mb-0">{{ __('EGP Invested') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
