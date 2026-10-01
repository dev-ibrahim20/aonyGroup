@php($homepageSettings = \App\Models\SiteSetting::homepage())
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $project->seo_description }}">
    <meta name="keywords" content="{{ $project->title }}, عقارات, استثمار عقاري, {{ $project->location }}">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ $project->seo_title }}">
    <meta property="og:description" content="{{ $project->seo_description }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta property="og:image" content="{{ $project->display_image?->url }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $project->seo_title }}">
    <meta name="twitter:description" content="{{ $project->seo_description }}">
    <meta name="twitter:image" content="{{ $project->display_image?->url }}">
    <link rel="canonical" href="{{ $project->full_canonical_url }}">
    <title>{{ $project->seo_title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Dubai', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%);
            min-height: 100vh;
        }

        .hero-section {
            height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 50%, rgba(255, 193, 7, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .hero-location {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .back-button {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            z-index: 100;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
        }

        .back-button:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.5);
        }

        .content-section {
            padding: 4rem 2rem;
        }

        .project-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .project-gallery {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .thumbnail {
            width: 100%;
            height: 245px;
            object-fit: cover;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.3);
        }

        .project-info {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }

        .project-badges {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-available {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .badge-sold-out {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .badge-coming-soon {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
        }

        .badge-featured {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
        }

        .project-title {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .project-description {
            color: #475467;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .project-specs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .spec-item {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }

        .spec-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .spec-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .spec-value {
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .units-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2rem;
        }

        .units-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .unit-card {
            background: #f8f9fa;
            border: 1px solid #eaecf0;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .unit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.2);
            border-color: rgba(255, 193, 7, 0.3);
        }

        .unit-title {
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .unit-price {
            color: #ffc107;
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .unit-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .unit-feature {
            background: rgba(255, 193, 7, 0.1);
            color: #966600;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .contact-form {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            border-radius: 25px;
            padding: 3rem;
            color: white;
            margin-top: 3rem;
        }

        .contact-form h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .contact-form p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #ffc107;
            background: rgba(255, 255, 255, 0.15);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.5);
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 40vh;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-location {
                font-size: 1rem;
            }

            .back-button {
                top: 1rem;
                right: 1rem;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .project-gallery {
                grid-template-columns: 1fr;
            }

            .main-image {
                height: 300px;
            }

            .thumbnail-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .thumbnail {
                height: 100px;
            }

            .project-info {
                padding: 2rem;
            }

            .project-title {
                font-size: 1.8rem;
            }

            .project-specs {
                grid-template-columns: 1fr 1fr;
            }

            .units-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .project-info {
                padding: 1.5rem;
            }

            .project-title {
                font-size: 1.5rem;
            }

            .project-specs {
                grid-template-columns: 1fr;
            }

            .thumbnail-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="hero-section">
        <a href="{{ route('projects.index') }}" class="back-button">← العودة للمشاريع</a>
        <div class="hero-content">
            <h1 class="hero-title">{{ $project->title }}</h1>
            <div class="hero-location">
                <span>📍</span>
                <span>{{ $project->location }}</span>
            </div>
        </div>
    </div>

    <div class="content-section">
        <div class="project-container">
            <!-- Project Gallery -->
            @if ($project->gallery->count() > 0)
                <div class="project-gallery">
                    <img src="{{ $project->gallery->first()->url }}" alt="{{ $project->title }}" class="main-image" id="mainImage">
                    <div class="thumbnail-grid">
                        @foreach ($project->gallery->slice(1, 4) as $image)
                            <img src="{{ $image->url }}" alt="{{ $project->title }}" class="thumbnail" onclick="changeMainImage('{{ $image->url }}')">
                        @endforeach
                    </div>
                </div>
            @elseif ($project->display_image)
                <div class="project-gallery">
                    <img src="{{ $project->display_image->url }}" alt="{{ $project->title }}" class="main-image">
                </div>
            @endif

            <!-- Project Info -->
            <div class="project-info">
                <div class="project-badges">
                    @if ($project->featured)
                        <span class="badge badge-featured">مشروع مميز</span>
                    @endif
                    
                    <span class="badge badge-{{ $project->status }}">
                        @if ($project->status === 'available') متاح
                        @elseif ($project->status === 'sold_out') مباع
                        @elseif ($project->status === 'coming_soon') قريبًا
                        @else {{ $project->status }}
                        @endif
                    </span>
                </div>

                <h2 class="project-title">{{ $project->title }}</h2>
                
                <div class="project-description">
                    {{ $project->description }}
                </div>

                <div class="project-specs">
                    <div class="spec-item">
                        <div class="spec-icon">🏢</div>
                        <div class="spec-label">الموقع</div>
                        <div class="spec-value">{{ $project->location }}</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon">🏠</div>
                        <div class="spec-label">الوحدات</div>
                        <div class="spec-value">{{ $project->units->count() }}</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon">📊</div>
                        <div class="spec-label">الحالة</div>
                        <div class="spec-value">
                            @if ($project->status === 'available') متاح
                            @elseif ($project->status === 'sold_out') مباع
                            @elseif ($project->status === 'coming_soon') قريبًا
                            @else {{ $project->status }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Units Section -->
            @if ($project->units->count() > 0)
                <div class="units-section">
                    <h3 class="section-title">الوحدات المتاحة</h3>
                    <div class="units-grid">
                        @foreach ($project->units as $unit)
                            <div class="unit-card">
                                <h4 class="unit-title">{{ $unit->title }}</h4>
                                <div class="unit-price">{{ number_format((float) $unit->price, 0) }} ج.م</div>
                                <div class="unit-features">
                                    @if ($unit->area)
                                        <span class="unit-feature">{{ $unit->area }} م²</span>
                                    @endif
                                    @if ($unit->bedrooms)
                                        <span class="unit-feature">{{ $unit->bedrooms }} غرفة نوم</span>
                                    @endif
                                    @if ($unit->bathrooms)
                                        <span class="unit-feature">{{ $unit->bathrooms }} حمام</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Contact Info -->
            <div class="contact-form">
                <h3>تواصل معنا بخصوص هذا المشروع</h3>
                <p>للاستفسار عن هذا المشروع، تواصل معنا عبر:</p>
                <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
                    <a href="tel:{{ $homepageSettings['contact']['phone'] }}" class="submit-btn" style="text-align: center; text-decoration: none;">
                        📞 {{ $homepageSettings['contact']['phone'] }}
                    </a>
                    <a href="mailto:{{ $homepageSettings['contact']['email'] }}" class="submit-btn" style="text-align: center; text-decoration: none; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                        📧 {{ $homepageSettings['contact']['email'] }}
                    </a>
                    <a href="{{ url('/#contact') }}" class="submit-btn" style="text-align: center; text-decoration: none; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                        📍 زيارة صفحة التواصل
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>
        function changeMainImage(url) {
            document.getElementById('mainImage').src = url;
        }
    </script>
</body>
</html>