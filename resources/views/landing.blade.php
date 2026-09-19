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
            min-height: 85vh;
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
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.65) 50%, rgba(255, 255, 255, 0.55) 100%);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            animation: fadeInUp 1.2s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            color: #2c3e50;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .main-title span {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            font-size: 1.4rem;
            color: #495057;
            margin-bottom: 2rem;
        }
        
        /* Sections Section with Horizontal Animation */
        .sections-section {
            padding: 4rem 2rem;
            position: relative;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .sections-container {
            display: flex;
            gap: 2rem;
            overflow-x: auto;
            padding: 2rem 0;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        
        .sections-container::-webkit-scrollbar {
            display: none;
        }
        
        .section-card {
            flex: 0 0 350px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            padding: 2.5rem;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            animation: slideInFromRight 1s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .section-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 152, 0, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .section-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 193, 7, 0.2) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .section-card:hover::before {
            opacity: 1;
        }
        
        .section-card:hover::after {
            opacity: 1;
        }
        
        .section-card:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 30px 60px rgba(255, 193, 7, 0.3);
            border-color: rgba(255, 193, 7, 0.5);
        }
        
        .section-card:nth-child(1) { animation-delay: 0.2s; }
        .section-card:nth-child(2) { animation-delay: 0.4s; }
        .section-card:nth-child(3) { animation-delay: 0.6s; }
        .section-card:nth-child(4) { animation-delay: 0.8s; }
        .section-card:nth-child(5) { animation-delay: 1s; }
        
        .icon-container {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.8rem;
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.4);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 2;
        }
        
        .section-card:hover .icon-container {
            transform: scale(1.2) rotate(360deg);
            box-shadow: 0 20px 50px rgba(255, 193, 7, 0.6);
        }
        
        .section-title {
            color: #2c3e50;
            font-size: 1.6rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }
        
        .section-card:hover .section-title {
            color: #ff9800;
        }
        
        .section-description {
            color: #6c757d;
            text-align: center;
            font-size: 0.95rem;
            line-height: 1.7;
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
        
        .scroll-indicator {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
        
        .scroll-dot {
            width: 12px;
            height: 12px;
            background: rgba(255, 193, 7, 0.3);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .scroll-dot.active {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            transform: scale(1.2);
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
            
            .logo-container {
                width: 160px;
                height: 160px;
                font-size: 4rem;
            }
            
            .section-card {
                flex: 0 0 300px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                min-height: 70vh;
            }
            
            .main-title {
                font-size: 2.8rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
            }
            
            .logo-container {
                width: 140px;
                height: 140px;
                font-size: 3.5rem;
            }
            
            .section-card {
                flex: 0 0 280px;
                padding: 2rem;
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
        }
        
        @media (max-width: 480px) {
            .main-title {
                font-size: 2.2rem;
            }
            
            .subtitle {
                font-size: 1rem;
            }
            
            .logo-container {
                width: 120px;
                height: 120px;
                font-size: 3rem;
            }
            
            .section-card {
                flex: 0 0 250px;
                padding: 1.5rem;
            }
            
            .icon-container {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .section-title {
                font-size: 1.2rem;
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
            <div class="logo-container">
                <div class="pulse-ring"></div>
                🏢
            </div>
            <h1 class="main-title">شركة <span>العوني</span> العقارية</h1>
            <p class="subtitle">شريكك الموثوق في عالم العقارات</p>
        </div>
    </div>
    
    <!-- Sections Section with Horizontal Animation -->
    <div class="sections-section">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">اختر القسم الذي تريد استكشافه</h2>
        
        <div class="sections-container" id="sectionsContainer">
            <div class="section-card" onclick="navigateToSection('real-estate-investment')">
                <div class="shine-effect"></div>
                <div class="icon-container">
                    <div class="pulse-ring"></div>
                    🏢
                </div>
                <h3 class="section-title">الاستثمار العقاري</h3>
                <p class="section-description">فرص استثمارية استراتيجية في العقارات بأعلى عوائد</p>
            </div>
            
            <div class="section-card" onclick="navigateToSection('real-estate-development')">
                <div class="shine-effect"></div>
                <div class="icon-container">
                    <div class="pulse-ring"></div>
                    🏗️
                </div>
                <h3 class="section-title">التطوير العقاري</h3>
                <p class="section-description">تطوير مشاريع عقارية مبتكرة بمعايير عالمية</p>
            </div>
            
            <div class="section-card" onclick="navigateToSection('construction')">
                <div class="shine-effect"></div>
                <div class="icon-container">
                    <div class="pulse-ring"></div>
                    🔨
                </div>
                <h3 class="section-title">المقاولات</h3>
                <p class="section-description">تنفيذ مشاريع البناء بأعلى جودة وكفاءة</p>
            </div>
            
            <div class="section-card" onclick="navigateToSection('real-estate-marketing')">
                <div class="shine-effect"></div>
                <div class="icon-container">
                    <div class="pulse-ring"></div>
                    📊
                </div>
                <h3 class="section-title">التسويق العقاري</h3>
                <p class="section-description">استراتيجيات تسويقية ذكية لبيع وتأجير العقارات</p>
            </div>
            
            <div class="section-card" onclick="navigateToSection('engineering-consultancy')">
                <div class="shine-effect"></div>
                <div class="icon-container">
                    <div class="pulse-ring"></div>
                    📐
                </div>
                <h3 class="section-title">مكتب الاستشارات الهندسية</h3>
                <p class="section-description">استشارات هندسية متخصصة ودراسات فنية دقيقة</p>
            </div>
        </div>
        
        <div class="scroll-indicator" id="scrollIndicator">
            <div class="scroll-dot active" data-index="0"></div>
            <div class="scroll-dot" data-index="1"></div>
            <div class="scroll-dot" data-index="2"></div>
            <div class="scroll-dot" data-index="3"></div>
            <div class="scroll-dot" data-index="4"></div>
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
        
        // التنقل إلى القسم المختار
        function navigateToSection(section) {
            const card = event.currentTarget;
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
                window.location.href = '/' + section;
            }, 300);
        }
        
        // Scroll Indicator functionality
        function initScrollIndicator() {
            const container = document.getElementById('sectionsContainer');
            const dots = document.querySelectorAll('.scroll-dot');
            
            container.addEventListener('scroll', () => {
                const scrollLeft = container.scrollLeft;
                const cardWidth = 350 + 32; // card width + gap
                const currentIndex = Math.round(scrollLeft / cardWidth);
                
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            });
            
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.dataset.index);
                    const cardWidth = 350 + 32;
                    container.scrollTo({
                        left: index * cardWidth,
                        behavior: 'smooth'
                    });
                });
            });
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
        
        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            createFloatingShapes();
            initBackgroundSlider();
            initScrollIndicator();
        });
    </script>
    
    @include('footer')
</body>
</html>
