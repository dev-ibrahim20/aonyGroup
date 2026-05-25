<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title')</title>
    <meta name="description" content="{{ $seo_description ?? 'Aony Group - Premium Real Estate Development' }}">
    <meta name="keywords" content="{{ $seo_keywords ?? 'real estate, luxury properties, investment, development' }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $seo_title ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo_description ?? 'Aony Group - Premium Real Estate Development' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="{{ $seo_image ?? asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo_title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo_description ?? 'Aony Group - Premium Real Estate Development' }}">
    <meta name="twitter:image" content="{{ $seo_image ?? asset('images/og-image.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->url() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-color: #1a365d;
            --secondary-color: #c9a227;
            --accent-color: #2d3748;
            --light-color: #f7fafc;
            --dark-color: #1a202c;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        [data-theme="dark"] {
            --primary-color: #4a5568;
            --secondary-color: #d4af37;
            --accent-color: #718096;
            --light-color: #1a202c;
            --dark-color: #f7fafc;
            --text-primary: #f7fafc;
            --text-secondary: #a0aec0;
            --border-color: #4a5568;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-color);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        
        [lang="ar"] body {
            font-family: 'Cairo', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        
        [lang="ar"] h1, [lang="ar"] h2, [lang="ar"] h3, [lang="ar"] h4, [lang="ar"] h5, [lang="ar"] h6 {
            font-family: 'Cairo', sans-serif;
        }
        
        .text-gold {
            color: var(--secondary-color);
        }
        
        .bg-gold {
            background-color: var(--secondary-color);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }
        
        .btn-gold {
            background: linear-gradient(135deg, var(--secondary-color), #e6c547);
            border: none;
            color: var(--dark-color);
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: var(--dark-color);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        [data-theme="dark"] .glass-effect {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 0;
            }
        }
        
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            {{ app()->getLocale() == 'ar' ? 'left: 30px;' : 'right: 30px;' }}
            z-index: 1000;
            background-color: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .whatsapp-float:hover {
            transform: scale(1.1);
            color: white;
        }
        
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--light-color);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loader.hidden {
            opacity: 0;
            pointer-events: none;
            display: none;
        }
        
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }
        
        [data-theme="dark"] .navbar-custom {
            background: rgba(26, 32, 44, 0.95);
        }
        
        .navbar-custom.scrolled {
            padding: 10px 0;
            box-shadow: var(--shadow-lg);
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }
        
        [data-theme="dark"] .stat-card {
            background: var(--accent-color);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .project-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            background: white;
        }
        
        [data-theme="dark"] .project-card {
            background: var(--accent-color);
        }
        
        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }
        
        .project-card img {
            transition: transform 0.5s ease;
        }
        
        .project-card:hover img {
            transform: scale(1.1);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            margin-bottom: 20px;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
            position: relative;
        }
        
        [data-theme="dark"] .testimonial-card {
            background: var(--accent-color);
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            {{ app()->getLocale() == 'ar' ? 'right: 30px;' : 'left: 30px;' }}
            font-size: 80px;
            color: var(--secondary-color);
            opacity: 0.3;
            font-family: 'Playfair Display', serif;
        }
        
        .footer-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .breadcrumb-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            padding: 60px 0;
            color: white;
        }
        
        .form-control-custom {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 54, 93, 0.1);
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
        }
        
        .gallery-item img {
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 54, 93, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .counter {
            font-size: 48px;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .progress-custom {
            height: 8px;
            border-radius: 4px;
            background: var(--border-color);
        }
        
        .progress-bar-custom {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 4px;
        }
        
        /* Force navbar links to show on desktop */
        @media (min-width: 992px) {
            .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="text-center">
            <div class="spinner-border text-gold" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-gold">{{ __('Loading') }}...</p>
        </div>
    </div>
    
    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/{{ config('contact.whatsapp') ?? '201000000000' }}" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Navbar -->
    @if(view()->exists('frontend.components.navbar'))
        @include('frontend.components.navbar')
    @else
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNavbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="fw-bold text-gold">{{ config('app.name') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="display: flex !important;">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">{{ __('Projects') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">{{ __('Services') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('frontend.components.footer')
    
    <!-- Back to Top Button -->
    <button class="btn btn-gold position-fixed bottom-0 end-0 m-4 rounded-circle" id="backToTop" style="width: 50px; height: 50px; display: none; z-index: 999;">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Slick Slider JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/frontend.js') }}"></script>
    
    <script>
        // Force hide loader after page load
        window.addEventListener('load', function() {
            setTimeout(function() {
                const loader = document.getElementById('loader');
                if (loader) {
                    loader.style.display = 'none';
                    loader.classList.add('hidden');
                }
            }, 500);
        });
        
        // Fallback: hide loader after 3 seconds
        setTimeout(function() {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.display = 'none';
                loader.classList.add('hidden');
            }
        }, 3000);
        
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'slide',
                once: true,
                offset: 100
            });
        }
        
        // Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });
        
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Theme Toggle
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }
        
        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
        
        // Language Toggle
        function toggleLanguage() {
            const currentLang = '{{ app()->getLocale() }}';
            const newLang = currentLang === 'ar' ? 'en' : 'ar';
            window.location.href = '/lang/' + newLang;
        }
    </script>
    
    @stack('scripts')
</body>
</html>
