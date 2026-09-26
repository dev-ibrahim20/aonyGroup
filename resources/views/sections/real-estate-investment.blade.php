<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="خدمات الاستثمار العقاري من شركة العوني العقارية - فرص استثمارية استراتيجية في العقارات بأعلى عوائد وأقل مخاطر">
    <meta name="keywords" content="استثمار عقاري, فرص استثمارية, تحليل السوق, إدارة المحافظ, تمويل الاستثمار, دراسات الجدوى, استثمار دولي">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="الاستثمار العقاري - شركة العوني العقارية">
    <meta property="og:description" content="نقدم فرص استثمارية استراتيجية في العقارات بأعلى عوائد وأقل مخاطر">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="الاستثمار العقاري - شركة العوني العقارية">
    <meta name="twitter:description" content="نقدم فرص استثمارية استراتيجية في العقارات بأعلى عوائد وأقل مخاطر">
    <link rel="canonical" href="{{ url('/real-estate-investment') }}">
    <title>الاستثمار العقاري | شركة العوني العقارية</title>
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
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .background-slider {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            filter: brightness(0.75) contrast(1.05) saturate(1.1);
        }

        .slide.active {
            opacity: 1;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.25), rgba(15, 23, 42, 0.5));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1400px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-initial {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeInCenter 1s ease-out;
        }

        @keyframes fadeInCenter {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .hero-full {
            display: none;
            width: 100%;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-full.active {
            display: grid;
            animation: fadeInContent 1s ease-out;
        }

        @keyframes fadeInContent {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideToRight 1s ease-out;
        }

        @keyframes slideToRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .hero-info {
            animation: slideToLeft 1s ease-out;
        }

        @keyframes slideToLeft {
            from { opacity: 0; transform: translateX(-100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .info-item {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-right: 4px solid #ffc107;
            opacity: 0;
            transform: translateY(20px);
        }

        .info-item.show {
            animation: fadeInItem 0.5s ease-out forwards;
        }

        @keyframes fadeInItem {
            to { opacity: 1; transform: translateY(0); }
        }

        .info-item h3 {
            color: #ffc107;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .info-item p {
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.6;
        }

        .logo-container {
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 4.5rem;
            box-shadow: 0 20px 50px rgba(255, 193, 7, 0.4);
            animation: pulseLogo 2s infinite;
            position: relative;
        }

        @keyframes pulseLogo {
            0%, 100% { transform: scale(1); box-shadow: 0 20px 50px rgba(255, 193, 7, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 25px 60px rgba(255, 193, 7, 0.6); }
        }

        .main-title {
            font-size: 4.5rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
        }

        .hero-brand .main-title {
            font-size: 3rem;
            margin-top: 1rem;
        }

        .pulse-ring {
            position: absolute;
            inset: 0;
            border: 2px solid rgba(255, 193, 7, 0.3);
            border-radius: 50%;
            animation: pulseRing 2s infinite;
        }

        @keyframes pulseRing {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        .content-section {
            padding: 4rem 2rem;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .feature-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 50px rgba(255, 193, 7, 0.25);
            border-color: rgba(255, 193, 7, 0.4);
        }

        .back-button {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
        }

        .back-button:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.5);
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.3);
            transition: transform 0.3s ease;
        }

        .feature-card:hover .icon-wrapper {
            transform: scale(1.15) rotate(10deg);
        }

        .process-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
            position: relative;
            overflow: hidden;
        }

        .process-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 50%, rgba(255, 193, 7, 0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        .process-section h2 {
            color: #ffffff;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 4rem;
        }

        .process-container {
            display: flex;
            flex-direction: column;
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .process-line {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            background: linear-gradient(180deg, transparent 0%, #ffc107 20%, #ff9800 80%, transparent 100%);
            transform: translateX(-50%);
            z-index: 1;
        }

        .process-step {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
            margin-bottom: 2.5rem;
            opacity: 0;
            animation: fadeInSlide 0.6s ease-out forwards;
        }

        .process-step:nth-child(1) { animation-delay: 0.1s; }
        .process-step:nth-child(2) { animation-delay: 0.2s; }
        .process-step:nth-child(3) { animation-delay: 0.3s; }
        .process-step:nth-child(4) { animation-delay: 0.4s; }
        .process-step:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeInSlide {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .process-step {
            flex-direction: row;
        }

        .process-step.right-side {
            flex-direction: row-reverse;
        }

        .step-content {
            flex: 1;
            padding: 1.2rem 1.5rem;
            margin: 0 1rem;
            text-align: right;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            border-left: 4px solid #ffc107;
        }

        .process-step.right-side .step-content {
            text-align: left;
            border-left: none;
            border-right: 4px solid #ffc107;
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a2e;
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.4);
            border: 4px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            z-index: 3;
        }

        .step-title {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            pointer-events: none;
        }

        .projects-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .projects-section h2 {
            color: #2c3e50;
            margin-bottom: 3rem;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .project-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 30px 60px rgba(255, 193, 7, 0.3);
            border-color: rgba(255, 193, 7, 0.5);
        }

        .project-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image {
            transform: scale(1.1);
        }

        .project-content {
            padding: 2rem;
        }

        .project-title {
            color: #2c3e50;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .project-description {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .project-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .project-badge {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .testimonials-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 50%, rgba(255, 193, 7, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(255, 152, 0, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .testimonials-section h2 {
            color: #ffffff;
            position: relative;
            z-index: 2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 3rem;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 2.5rem;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 70px rgba(255, 193, 7, 0.4);
            border-color: rgba(255, 193, 7, 0.4);
        }

        .testimonial-quote {
            font-size: 3rem;
            color: #ffc107;
            opacity: 0.5;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .testimonial-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .author-info h4 {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .author-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .main-title {
                font-size: 4rem;
            }

            .hero-brand .main-title {
                font-size: 2.5rem;
            }

            .logo-container {
                width: 160px;
                height: 160px;
                font-size: 4rem;
            }

            .hero-full {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-brand {
                margin-bottom: 1rem;
            }

            .content-section {
                padding: 3rem 1.5rem;
            }

            .process-container {
                padding: 1rem 0;
            }

            .process-line {
                left: 30px;
            }

            .process-step {
                margin-bottom: 2rem;
            }

            .process-step,
            .process-step.right-side {
                flex-direction: row;
            }

            .step-content {
                margin: 0 0.3rem;
                padding: 0.8rem 1rem;
                text-align: right;
                border-left: 4px solid #ffc107;
                border-right: none;
            }

            .step-number {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .step-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 100vh;
            }

            .main-title {
                font-size: 2.8rem;
            }

            .hero-brand .main-title {
                font-size: 2rem;
            }

            .logo-container {
                width: 140px;
                height: 140px;
                font-size: 3.5rem;
            }

            .hero-content {
                padding: 1rem;
            }

            .info-item {
                padding: 1rem;
            }

            .content-section {
                padding: 2rem 1rem;
            }

            .feature-card {
                padding: 2rem;
            }

            .icon-wrapper {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }

            .back-button {
                top: 1rem;
                right: 1rem;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .process-container {
                padding: 1rem 0;
            }

            .process-line {
                left: 20px;
            }

            .process-step {
                margin-bottom: 1.5rem;
            }

            .process-step,
            .process-step.right-side {
                flex-direction: row;
            }

            .step-content {
                margin: 0 0.3rem;
                padding: 0.6rem 0.8rem;
                text-align: right;
                border-left: 4px solid #ffc107;
                border-right: none;
            }

            .step-number {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }

            .step-title {
                font-size: 0.95rem;
            }

            .projects-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 2.2rem;
            }

            .hero-brand .main-title {
                font-size: 1.8rem;
            }

            .logo-container {
                width: 120px;
                height: 120px;
                font-size: 3rem;
            }

            .info-item {
                padding: 0.75rem;
            }

            .info-item h3 {
                font-size: 1rem;
            }

            .info-item p {
                font-size: 0.9rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .icon-wrapper {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .process-container {
                padding: 1rem 0;
            }

            .process-line {
                left: 15px;
            }

            .process-step {
                margin-bottom: 1.5rem;
            }

            .process-step,
            .process-step.left-number {
                flex-direction: row;
            }

            .step-content {
                margin: 0 0.3rem;
                padding: 0.5rem;
                text-align: right;
            }

            .step-number {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .step-title {
                font-size: 0.9rem;
            }

            .projects-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .project-title {
                font-size: 1.2rem;
            }

            .project-description {
                font-size: 0.85rem;
            }

            .testimonial-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="hero-section">
        <div class="background-slider" id="backgroundSlider">
            <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
        </div>

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container">
                    <div class="pulse-ring"></div>
                    🏢
                </div>
                <h1 class="main-title">الاستثمار العقاري</h1>
            </div>

            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container">
                        <div class="pulse-ring"></div>
                        📈
                    </div>
                    <h1 class="main-title">الاستثمار العقاري</h1>
                </div>

                <div class="hero-info">
                    <div class="info-item" id="visionItem">
                        <h3>🎯 رؤيتنا</h3>
                        <p>أن نكون وجهتك الموثوقة لبناء استثمارات عقارية مستدامة وواعدة.</p>
                    </div>

                    <div class="info-item" id="missionItem">
                        <h3>🚀 رسالتنا</h3>
                        <p>نساعدك على اكتشاف الفرص العقارية المناسبة واتخاذ قرارات استثمارية مدروسة.</p>
                    </div>

                    <div class="info-item" id="valuesItem">
                        <h3>💎 قيمنا</h3>
                        <p>الشفافية، التحليل الدقيق، وإدارة استثماراتك بما يحقق أهدافك على المدى الطويل.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">خدماتنا في الاستثمار العقاري</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="icon-wrapper">📈</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">تحليل السوق</h3>
                <p class="text-gray-600">دراسات شاملة لتحليل اتجاهات السوق وتحديد أفضل الفرص الاستثمارية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">🏘️</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">إدارة المحافظ</h3>
                <p class="text-gray-600">إدارة احترافية لمحافظك العقارية لتحقيق أعلى عوائد الاستثمار</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">💰</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">تمويل الاستثمار</h3>
                <p class="text-gray-600">حلول تمويلية مبتكرة لدعم مشاريعك الاستثمارية العقارية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">🔍</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">دراسات الجدوى</h3>
                <p class="text-gray-600">إعداد دراسات جدوى اقتصادية وفنية دقيقة للمشاريع الاستثمارية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">🌍</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">استثمار دولي</h3>
                <p class="text-gray-600">فرص استثمارية في أسواق عقارية عالمية واعدة ومربحة</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">📊</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">تقارير دورية</h3>
                <p class="text-gray-600">تقارير دورية شاملة عن أداء استثماراتك وتطورات السوق</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-500 mb-4">هل أنت مهتم بالاستثمار معنا؟</p>
            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition-opacity shadow-lg">
                تواصل معنا الآن
            </button>
        </div>
    </div>

    <div class="process-section">
        <h2 class="text-3xl font-bold text-center mb-8">خطوات الاستثمار معنا</h2>

        <div class="process-container">
            <div class="process-line"></div>

            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">التعرّف على أهدافك الاستثمارية</h3>
                </div>
            </div>

            <div class="process-step right-side">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">تحليل السوق واختيار الفرص المناسبة</h3>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">إعداد دراسة الجدوى وتقييم المخاطر</h3>
                </div>
            </div>

            <div class="process-step right-side">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">بناء المحفظة والخطة الاستثمارية</h3>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3 class="step-title">متابعة الأداء وإصدار التقارير الدورية</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="projects-section">
        <h2 class="text-3xl font-bold text-center">مجالات الاستثمار العقاري</h2>

        <div class="projects-grid">
            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مبانٍ تجارية في مركز المدينة" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">العقارات التجارية</h3>
                    <p class="project-description">فرص في الأبراج والمكاتب والمساحات التجارية ضمن مواقع حيوية.</p>
                    <div class="project-details">
                        <span class="project-badge">تجاري</span>
                        <span class="project-badge">تحليل السوق</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مجمع سكني حديث" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">المجمعات السكنية</h3>
                    <p class="project-description">دراسة فرص المجمعات والوحدات السكنية لتناسب أهداف المحفظة.</p>
                    <div class="project-details">
                        <span class="project-badge">سكني</span>
                        <span class="project-badge">إدارة الأصول</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="منزل معروض للبيع كفرصة عقارية" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">العقارات السكنية</h3>
                    <p class="project-description">تقييم الوحدات السكنية ومقارنتها وفق الموقع والقيمة والطلب.</p>
                    <div class="project-details">
                        <span class="project-badge">وحدات</span>
                        <span class="project-badge">دراسة جدوى</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="فيلا ضمن سوق العقارات الفاخرة" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">العقارات الفندقية</h3>
                    <p class="project-description">استكشاف الأصول الفندقية والسياحية ودراسة ملاءمتها للاستثمار.</p>
                    <div class="project-details">
                        <span class="project-badge">ضيافة</span>
                        <span class="project-badge">فرص متنوعة</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مساحة داخلية حديثة قابلة للاستثمار" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">الأصول متعددة الاستخدام</h3>
                    <p class="project-description">تحليل الأصول التي تجمع بين الاستخدامات السكنية والتجارية والخدمية.</p>
                    <div class="project-details">
                        <span class="project-badge">متعدد الاستخدام</span>
                        <span class="project-badge">تنويع</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="عقار حديث ضمن فرص الاستثمار" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">الفرص العقارية الدولية</h3>
                    <p class="project-description">دراسة أسواق عقارية متنوعة ومقارنة الفرص وفق معايير واضحة.</p>
                    <div class="project-details">
                        <span class="project-badge">دولي</span>
                        <span class="project-badge">تحليل ومقارنة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials-section">
        <h2 class="text-3xl font-bold text-center">ركائز الاستثمار العقاري الناجح</h2>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-quote">📊</div>
                <p class="testimonial-text">قرارات مبنية على قراءة دقيقة لاتجاهات السوق ومقارنة الفرص المتاحة.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">📈</div>
                    <div class="author-info">
                        <h4>تحليل السوق</h4>
                        <p>رؤية أوضح قبل الاستثمار</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">🧭</div>
                <p class="testimonial-text">اختيار الفرص بما يتوافق مع أهدافك الاستثمارية ومستوى المخاطر المناسب لك.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">🎯</div>
                    <div class="author-info">
                        <h4>تخطيط مخصص</h4>
                        <p>استراتيجية تناسب أهدافك</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">🧮</div>
                <p class="testimonial-text">دراسة الجوانب الاقتصادية والفنية قبل المضي في أي فرصة عقارية.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">🔍</div>
                    <div class="author-info">
                        <h4>دراسة الجدوى</h4>
                        <p>تقييم شامل للفرص</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">🏘️</div>
                <p class="testimonial-text">تنويع الأصول العقارية للمساعدة على بناء محفظة أكثر توازنًا.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">⚖️</div>
                    <div class="author-info">
                        <h4>تنويع المحفظة</h4>
                        <p>توزيع مدروس للأصول</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">📋</div>
                <p class="testimonial-text">متابعة دورية لأداء الاستثمارات وتطورات السوق من خلال تقارير واضحة.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">📑</div>
                    <div class="author-info">
                        <h4>تقارير دورية</h4>
                        <p>متابعة مستمرة للأداء</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">🤝</div>
                <p class="testimonial-text">دعم في مراحل الاستثمار المختلفة، من تقييم الفرصة إلى متابعة المحفظة.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">💼</div>
                    <div class="author-info">
                        <h4>دعم استثماري</h4>
                        <p>شراكة في كل خطوة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>
        function initBackgroundSlider() {
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;

            if (slides.length < 2) return;

            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 4000);
        }

        function initHeroAnimation() {
            const heroInitial = document.getElementById('heroInitial');
            const heroFull = document.getElementById('heroFull');
            const infoItems = [
                document.getElementById('visionItem'),
                document.getElementById('missionItem'),
                document.getElementById('valuesItem')
            ];

            setTimeout(() => {
                heroInitial.style.display = 'none';
                heroFull.classList.add('active');

                infoItems.forEach((item, index) => {
                    setTimeout(() => item.classList.add('show'), 500 * (index + 1));
                });
            }, 2000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            initBackgroundSlider();
            initHeroAnimation();
        });
    </script>
</body>
</html>
