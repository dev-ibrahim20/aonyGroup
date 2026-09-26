<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="شركة العوني العقارية - الاستثمار العقاري، التطوير العقاري، المقاولات، التسويق العقاري، ومكتب الاستشارات الهندسية. نقدم خدمات عقارية شاملة بأعلى معايير الجودة.">
    <meta name="keywords" content="شركة العوني العقارية, استثمار عقاري, تطوير عقاري, مقاولات, تسويق عقاري, استشارات هندسية, عقارات, مشاريع سكنية, مشاريع تجارية">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="شركة العوني العقارية - خدمات عقارية شاملة">
    <meta property="og:description" content="شركة العوني العقارية - الاستثمار العقاري، التطوير العقاري، المقاولات، التسويق العقاري، ومكتب الاستشارات الهندسية">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="شركة العوني العقارية - خدمات عقارية شاملة">
    <meta name="twitter:description" content="شركة العوني العقارية - الاستثمار العقاري، التطوير العقاري، المقاولات، التسويق العقاري، ومكتب الاستشارات الهندسية">
    <link rel="canonical" href="{{ url('/') }}">
    <title>شركة العوني العقارية | الاستثمار والتطوير والمقاولات والتسويق والاستشارات الهندسية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Dubai', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Hero Section with Background Slider */
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            filter: brightness(1.1) contrast(1.05) saturate(1.1);
        }

        .slide.active {
            opacity: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: transparent;
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
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
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
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .hero-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideToRight 1s ease-out;
        }

        @keyframes slideToRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-info {
            animation: slideToLeft 1s ease-out;
        }

        @keyframes slideToLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
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
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
        }

        @keyframes pulseLogo {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 20px 50px rgba(255, 193, 7, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 25px 60px rgba(255, 193, 7, 0.6);
            }
        }

        .main-title {
            font-size: 4.5rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
        }

        .main-title span {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-brand .main-title {
            font-size: 3rem;
            margin-top: 1rem;
        }

        /* Sections Section with Horizontal Animation */
        .sections-section {
            padding: 6rem 2rem;
            position: relative;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            overflow: hidden;
        }

        .sections-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 193, 7, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 50%, rgba(255, 152, 0, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .sections-section h2 {
            color: #ffffff;
            position: relative;
            z-index: 2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .sections-wrapper {
            position: relative;
            max-width: 1600px;
            margin: 0 auto;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 10;
        }

        .nav-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border: none;
            color: #1a1a2e;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.4);
            z-index: 10;
        }

        .nav-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(255, 193, 7, 0.6);
        }

        .nav-btn:active {
            transform: scale(0.95);
        }

        .sections-container {
            display: flex;
            gap: 2.5rem;
            overflow-x: auto;
            padding: 2rem 0;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            scroll-snap-type: x mandatory;
        }

        .sections-container::-webkit-scrollbar {
            display: none;
        }

        .section-card {
            flex: 0 0 450px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideInFromRight 1s ease-out forwards;
            opacity: 0;
            scroll-snap-align: start;
        }

        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(100px) rotateY(20deg);
            }
            to {
                opacity: 1;
                transform: translateX(0) rotateY(0deg);
            }
        }

        .section-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.15) 0%, rgba(255, 152, 0, 0.15) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .section-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 193, 7, 0.3) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .section-card:hover::before {
            opacity: 1;
        }

        .section-card:hover::after {
            opacity: 1;
        }

        .section-card:hover {
            transform: translateY(-20px) scale(1.08) rotateX(5deg);
            box-shadow: 0 40px 80px rgba(255, 193, 7, 0.4);
            border-color: rgba(255, 193, 7, 0.6);
        }

        .section-card:nth-child(1) { animation-delay: 0.2s; }
        .section-card:nth-child(2) { animation-delay: 0.4s; }
        .section-card:nth-child(3) { animation-delay: 0.6s; }
        .section-card:nth-child(4) { animation-delay: 0.8s; }
        .section-card:nth-child(5) { animation-delay: 1s; }

        .card-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            position: relative;
            z-index: 2;
            transition: transform 0.6s ease;
        }

        .section-card:hover .card-image {
            transform: scale(1.1);
        }

        .card-content {
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .icon-container {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -40px auto 1.5rem;
            font-size: 2.5rem;
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.5);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 3;
            border: 4px solid rgba(255, 255, 255, 0.1);
        }

        .section-card:hover .icon-container {
            transform: scale(1.3) rotate(360deg);
            box-shadow: 0 25px 50px rgba(255, 193, 7, 0.7);
        }

        .section-title {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .section-card:hover .section-title {
            color: #ffc107;
        }

        .section-description {
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            font-size: 1rem;
            line-height: 1.8;
            position: relative;
            z-index: 2;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: floatShape 20s infinite;
        }

        @keyframes floatShape {
            0%, 100% {
                transform: translateY(100vh) rotate(0deg) scale(1);
            }
            50% {
                transform: translateY(-100vh) rotate(360deg) scale(1.5);
            }
        }

        .shine-effect {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .section-card:hover .shine-effect {
            left: 100%;
        }



        .pulse-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 2px solid rgba(255, 193, 7, 0.3);
            border-radius: 50%;
            animation: pulseRing 2s infinite;
        }

        @keyframes pulseRing {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
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

            .section-card {
                flex: 0 0 380px;
            }

            .card-image {
                height: 240px;
            }

            .hero-full {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-brand {
                margin-bottom: 2rem;
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

            .section-card {
                flex: 0 0 320px;
            }

            .card-image {
                height: 200px;
            }

            .icon-container {
                width: 70px;
                height: 70px;
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 1.3rem;
            }

            .section-description {
                font-size: 0.9rem;
            }

            .hero-full {
                padding: 1rem;
            }

            .info-item {
                padding: 1rem;
            }

            .nav-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
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

            .section-card {
                flex: 0 0 280px;
            }

            .card-image {
                height: 180px;
            }

            .icon-container {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.2rem;
            }

            .hero-content {
                padding: 1rem;
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

            .nav-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes" id="shapes"></div>

    <!-- Hero Section with Background Slider -->
    <div class="hero-section">
        <div class="background-slider" id="backgroundSlider">
            <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
        </div>

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <!-- Initial View: Logo and Company Name -->
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container">
                    <div class="pulse-ring"></div>
                    🏢
                </div>
                <h1 class="main-title">شركة <span>العوني</span> العقارية</h1>
            </div>

            <!-- Full View: Brand on one side, Info on the other -->
            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container">
                        <div class="pulse-ring"></div>
                        🏢
                    </div>
                    <h1 class="main-title">شركة <span>العوني</span> العقارية</h1>
                </div>

                <div class="hero-info" id="about">
                    <div class="info-item" id="visionItem">
                        <h3>🎯 رؤيتنا</h3>
                        <p>أن نكون الخيار الأول والمفضل في السوق العقاري من خلال تقديم خدمات استثنائية تتجاوز توقعات عملائنا.</p>
                    </div>

                    <div class="info-item" id="missionItem">
                        <h3>🚀 رسالتنا</h3>
                        <p>نقدم حلولاً عقارية شاملة ومبتكرة تضمن لعملائنا أعلى عوائد الاستثمار مع الحفاظ على أعلى معايير الجودة.</p>
                    </div>

                    <div class="info-item" id="valuesItem">
                        <h3>💎 قيمنا</h3>
                        <p>النزاهة، الاحترافية، الابتكار، والالتزام بخدمة عملائنا بأعلى معايير الجودة والأمانة.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sections Section with Horizontal Animation -->
    <div class="sections-section">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">اختر القسم الذي تريد استكشافه</h2>

        <div class="sections-wrapper">
            <div class="nav-buttons">
                <button class="nav-btn" id="prevBtn" onclick="scrollSections('prev')">→</button>
                <button class="nav-btn" id="nextBtn" onclick="scrollSections('next')">←</button>
            </div>

            <div class="sections-container" id="sectionsContainer">
                <div class="section-card" onclick="navigateToSection('real-estate-investment')">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="الاستثمار العقاري" class="card-image">
                    <div class="card-content">
                        <div class="icon-container">
                            <div class="pulse-ring"></div>
                            🏢
                        </div>
                        <h3 class="section-title">الاستثمار العقاري</h3>
                        <p class="section-description">فرص استثمارية استراتيجية في العقارات بأعلى عوائد</p>
                    </div>
                </div>

                <div class="section-card" onclick="navigateToSection('real-estate-development')">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="التطوير العقاري" class="card-image">
                    <div class="card-content">
                        <div class="icon-container">
                            <div class="pulse-ring"></div>
                            🏗️
                        </div>
                        <h3 class="section-title">التطوير العقاري</h3>
                        <p class="section-description">تطوير مشاريع عقارية مبتكرة بمعايير عالمية</p>
                    </div>
                </div>

                <div class="section-card" onclick="navigateToSection('construction')">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="المقاولات" class="card-image">
                    <div class="card-content">
                        <div class="icon-container">
                            <div class="pulse-ring"></div>
                            🔨
                        </div>
                        <h3 class="section-title">المقاولات</h3>
                        <p class="section-description">تنفيذ مشاريع البناء بأعلى جودة وكفاءة</p>
                    </div>
                </div>

                <div class="section-card" onclick="navigateToSection('real-estate-marketing')">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="التسويق العقاري" class="card-image">
                    <div class="card-content">
                        <div class="icon-container">
                            <div class="pulse-ring"></div>
                            📊
                        </div>
                        <h3 class="section-title">التسويق العقاري</h3>
                        <p class="section-description">استراتيجيات تسويقية ذكية لبيع وتأجير العقارات</p>
                    </div>
                </div>

                <div class="section-card" onclick="navigateToSection('engineering-consultancy')">
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مكتب الاستشارات الهندسية" class="card-image">
                    <div class="card-content">
                        <div class="icon-container">
                            <div class="pulse-ring"></div>
                            📐
                        </div>
                        <h3 class="section-title">مكتب الاستشارات الهندسية</h3>
                        <p class="section-description">استشارات هندسية متخصصة ودراسات فنية دقيقة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Background Slider
        function initBackgroundSlider() {
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;

            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 4000); // Change slide every 4 seconds
        }

        // إنشاء أشكال عائمة في الخلفية
        function createFloatingShapes() {
            const shapesContainer = document.getElementById('shapes');
            const shapes = ['●', '■', '▲', '◆'];
            const colors = ['#ffc107', '#ff9800', '#ff6b6b', '#4ecdc4'];

            for (let i = 0; i < 30; i++) {
                const shape = document.createElement('div');
                shape.className = 'shape';
                shape.textContent = shapes[Math.floor(Math.random() * shapes.length)];
                shape.style.left = Math.random() * 100 + '%';
                shape.style.top = Math.random() * 100 + '%';
                shape.style.fontSize = (Math.random() * 40 + 20) + 'px';
                shape.style.color = colors[Math.floor(Math.random() * colors.length)];
                shape.style.animationDelay = Math.random() * 20 + 's';
                shape.style.animationDuration = (Math.random() * 15 + 15) + 's';
                shapesContainer.appendChild(shape);
            }
        }

        // التنقل بين الأقسام
        function scrollSections(direction) {
            const container = document.getElementById('sectionsContainer');
            const scrollAmount = 470; // card width + gap

            if (direction === 'next') {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            } else {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            }
        }

        // دعم السحب على الشاشات اللمسية
        function initTouchScroll() {
            const container = document.getElementById('sectionsContainer');
            let startX = 0;
            let scrollLeft = 0;

            container.addEventListener('touchstart', (e) => {
                startX = e.touches[0].pageX - container.offsetLeft;
                scrollLeft = container.scrollLeft;
            });

            container.addEventListener('touchmove', (e) => {
                const x = e.touches[0].pageX - container.offsetLeft;
                const walk = (x - startX) * 2;
                container.scrollLeft = scrollLeft - walk;
            });
        }

        // التنقل إلى القسم المختار
        function navigateToSection(section) {
            const card = event.currentTarget;
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
                window.location.href = '/' + section;
            }, 300);
        }

        // تأثيرات إضافية عند تحريك الماوس
        document.addEventListener('mousemove', function(e) {
            const cards = document.querySelectorAll('.section-card');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                card.style.setProperty('--mouse-x', x + 'px');
                card.style.setProperty('--mouse-y', y + 'px');
            });
        });

        // Hero Section Animation Sequence
        function initHeroAnimation() {
            const heroInitial = document.getElementById('heroInitial');
            const heroFull = document.getElementById('heroFull');
            const visionItem = document.getElementById('visionItem');
            const missionItem = document.getElementById('missionItem');
            const valuesItem = document.getElementById('valuesItem');

            // Wait 2 seconds, then transition to full view
            setTimeout(() => {
                heroInitial.style.display = 'none';
                heroFull.classList.add('active');

                // Show info items one by one with delay
                setTimeout(() => {
                    visionItem.classList.add('show');
                }, 500);

                setTimeout(() => {
                    missionItem.classList.add('show');
                }, 1000);

                setTimeout(() => {
                    valuesItem.classList.add('show');
                }, 1500);
            }, 2000);
        }

        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            createFloatingShapes();
            initBackgroundSlider();
            initTouchScroll();
            initHeroAnimation();
        });
    </script>

    @include('partials.footer')
</body>
</html>
