<!-- Blog Preview Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-gold mb-3 px-4 py-2 rounded-pill">{{ __('Blog') }}</span>
            <h2 class="display-5 fw-bold mb-3">{{ __('Latest News & Insights') }}</h2>
            <p class="text-muted lead">{{ __('Stay updated with our latest articles and industry news') }}</p>
        </div>
        
        <div class="row g-4">
            @php
                $blogs = \App\Models\Blog::where('status', 'published')->latest()->take(3)->get();
            @endphp
            @foreach($blogs as $index => $blog)
                @php
                    $media = $blog->media()->where('type', 'image')->first();
                    $imageUrl = $media ? $media->url : 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=600&fit=crop';
                @endphp
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $blog->title }}"
                                 class="w-100"
                                 style="height: 200px; object-fit: cover;"
                                 onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, var(--primary-color), var(--accent-color))'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white\'><i class=\'fas fa-newspaper fa-2x\'></i></div>'">

                            <div class="position-absolute top-0 start-0 m-3">
                                @if($blog->featured)
                                    <span class="badge bg-gold">{{ __('Featured') }}</span>
                                @else
                                    <span class="badge bg-gold">{{ __('News') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-calendar-alt text-gold me-2"></i>
                                <small class="text-muted">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</small>
                            </div>

                            <h5 class="fw-bold mb-3">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                                    {{ \Illuminate\Support\Str::limit($blog->title, 50) }}
                                </a>
                            </h5>

                            <p class="text-muted small mb-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->excerpt ?: $blog->content), 100) }}
                            </p>

                            <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-link text-gold text-decoration-none p-0">
                                {{ __('Read More') }} <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg">
                {{ __('View All Articles') }}
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
