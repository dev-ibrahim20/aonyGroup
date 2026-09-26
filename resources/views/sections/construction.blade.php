<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="خدمات المقاولات من شركة العوني العقارية - ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير">
    <meta name="keywords" content="مقاولات, بناء عام, مباني تجارية, بناء سكني, ترميم وصيانة, أعمال تأسيسية, مراقبة الجودة">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="المقاولات - شركة العوني العقارية">
    <meta property="og:description" content="ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="المقاولات - شركة العوني العقارية">
    <meta name="twitter:description" content="ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير">
    <link rel="canonical" href="{{ url('/construction') }}">
    <title>المقاولات | شركة العوني العقارية</title>
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

        /* Process Section */
        .process-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
            position: relative;
            overflow: hidden;
        }

        .process-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
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
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1a2e;
            box-shadow: 0 8px 20px rgba(255, 193, 7, 0.3);
            border: 3px solid rgba(255, 255, 255, 0.15);
            flex-shrink: 0;
            z-index: 3;
        }

        .step-title {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
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

        /* Projects Gallery Section */
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

        /* Testimonials Section */
        .testimonials-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
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
            font-style: italic;
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

        .rating {
            color: #ffc107;
            font-size: 1.2rem;
            margin-top: 0.5rem;
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
                margin-bottom: 2rem;
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

            .hero-full {
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

            .projects-grid {
                grid-template-columns: 1fr;
            }

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

            .projects-grid {
                grid-template-columns: 1fr;
            }

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
    <a href="/" class="back-button">← العودة للرئيسية</a>

    <!-- Hero Section with Background Slider -->
    <div class="hero-section">
        <div class="background-slider" id="backgroundSlider">
            <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1590059403664-5ba9c9b83c0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90');"></div>
        </div>

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <!-- Initial View: Logo and Section Name -->
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container">
                    <div class="pulse-ring"></div>
                    🔨
                </div>
                <h1 class="main-title">المقاولات</h1>
            </div>

            <!-- Full View: Brand on one side, Info on the other -->
            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container">
                        <div class="pulse-ring"></div>
                        🔨
                    </div>
                    <h1 class="main-title">المقاولات</h1>
                </div>

                <div class="hero-info">
                    <div class="info-item" id="visionItem">
                        <h3>🎯 رؤيتنا</h3>
                        <p>أن نكون الشريك الأول في مشاريع البناء والتشييد من خلال تقديم خدمات مقاولات استثنائية.</p>
                    </div>

                    <div class="info-item" id="missionItem">
                        <h3>🚀 رسالتنا</h3>
                        <p>ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير العالمية.</p>
                    </div>

                    <div class="info-item" id="valuesItem">
                        <h3>💎 قيمنا</h3>
                        <p>الجودة، الدقة، الأمانة، والالتزام بمواصفات التسليم المتفق عليها.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-section max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">خدماتنا في المقاولات</h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="icon-wrapper">🏗️</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">البناء العام</h3>
                <p class="text-gray-600">تنفيذ جميع أعمال البناء من الأساسات حتى التشطيبات</p>
            </div>
            
            <div class="feature-card">
                <div class="icon-wrapper">🏢</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">المباني التجارية</h3>
                <p class="text-gray-600">بناء المباني التجارية والمكاتب بمعايير احترافية</p>
            </div>
            
            <div class="feature-card">
                <div class="icon-wrapper">🏠</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">البناء السكني</h3>
                <p class="text-gray-600">تنفيذ المشاريع السكنية الفاخرة والفيلا</p>
            </div>
            
            <div class="feature-card">
                <div class="icon-wrapper">🛠️</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">الترميم والصيانة</h3>
                <p class="text-gray-600">أعمال الترميم والصيانة للمباني القائمة</p>
            </div>
            
            <div class="feature-card">
                <div class="icon-wrapper">🚧</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">الأعمال التأسيسية</h3>
                <p class="text-gray-600">تنفيذ الأعمال التأسيسية والبنية التحتية</p>
            </div>
            
            <div class="feature-card">
                <div class="icon-wrapper">✅</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">مراقبة الجودة</h3>
                <p class="text-gray-600">نظام متكامل لمراقبة الجودة في جميع مراحل التنفيذ</p>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <p class="text-gray-500 mb-4">هل لديك مشروع بناء؟</p>
            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition-opacity shadow-lg">
                اطلب عرض سعر
            </button>
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <h2 class="text-3xl font-bold text-center mb-8">خطوات العمل</h2>

        <div class="process-container">
            <div class="process-line"></div>

            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">الاستشارة والتخطيط</h3>
                </div>
            </div>

            <div class="process-step right-side">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">التصميم والهندسة</h3>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">الحصول على التراخيص</h3>
                </div>
            </div>

            <div class="process-step right-side">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">التنفيذ والبناء</h3>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3 class="step-title">التسليم والضمان</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Gallery Section -->
    <div class="projects-section">
        <h2 class="text-3xl font-bold text-center">مشاريعنا السابقة</h2>

        <div class="projects-grid">
            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع بناء تجاري" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">برج الأعمال التجاري</h3>
                    <p class="project-description">مبنى تجاري متعدد الطوابق بمساحة 5000 متر مربع، يضم مكاتب ومحلات تجارية</p>
                    <div class="project-details">
                        <span class="project-badge">تجاري</span>
                        <span class="project-badge">5000 م²</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع سكني فاخر" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">مجمع السكني الفاخر</h3>
                    <p class="project-description">مجمع سكني فاخر يضم 20 فيلا بتصاميم عصرية ومرافق متكاملة</p>
                    <div class="project-details">
                        <span class="project-badge">سكني</span>
                        <span class="project-badge">20 فيلا</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع بناء صناعي" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">المصنع الصناعي</h3>
                    <p class="project-description">مصنع متطور بمساحة 3000 متر مربع بمعايير الصناعة الحديثة</p>
                    <div class="project-details">
                        <span class="project-badge">صناعي</span>
                        <span class="project-badge">3000 م²</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع مركز تجاري" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">مركز التسوق</h3>
                    <p class="project-description">مركز تسوق عصري يضم 100 محل تجاري ومنطقة ترفيهية للعائلات</p>
                    <div class="project-details">
                        <span class="project-badge">تجاري</span>
                        <span class="project-badge">100 محل</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع فندق فاخر" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">فندق الضيافة</h3>
                    <p class="project-description">فندق 5 نجوم ب150 غرفة مع مرافق سبا ومطاعم ومؤتمرات</p>
                    <div class="project-details">
                        <span class="project-badge">فندقي</span>
                        <span class="project-badge">150 غرفة</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="مشروع مبنى إداري" class="project-image">
                <div class="project-content">
                    <h3 class="project-title">المبنى الإداري</h3>
                    <p class="project-description">مبنى إداري حديث بمساحة 2000 متر مربع للشركات والمؤسسات</p>
                    <div class="project-details">
                        <span class="project-badge">إداري</span>
                        <span class="project-badge">2000 م²</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials-section">
        <h2 class="text-3xl font-bold text-center">آراء عملائنا</h2>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">تجربة رائعة مع شركة العوني العقارية. نفذوا مشروع بناء فيلتي بجودة عالية وفي الوقت المحدد. أنصح الجميع بالتعامل معهم.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👨</div>
                    <div class="author-info">
                        <h4>أحمد محمد</h4>
                        <p>صاحب مشروع سكني</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">أفضل شركة مقاولات تعاملت معها. الاحترافية والدقة في العمل كانت مذهلة. المشروع سُلم بجودة تفوق التوقعات.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👩</div>
                    <div class="author-info">
                        <h4>سارة أحمد</h4>
                        <p>مديرة شركة تجارية</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">شركة رائعة في التنفيذ والمتابعة. الفريق محترف وملتزم بالمواعيد. سأتعامل معهم في جميع مشاريعي القادمة.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👨</div>
                    <div class="author-info">
                        <h4>خالد عبدالله</h4>
                        <p>مستثمر عقاري</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">الجودة في التنفيذ واضحة في كل تفاصيل المشروع. الشركة تستحق كل الثقة والتقدير على عملهم المتميز.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👩</div>
                    <div class="author-info">
                        <h4>فاطمة علي</h4>
                        <p>صاحبة مشروع تجاري</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">التزامهم بالمواعيد والجودة كان مذهلاً. المشروع سُلم بحالة مثالية وأنا سعيد جداً بالنتيجة.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👨</div>
                    <div class="author-info">
                        <h4>محمد سعيد</h4>
                        <p>رائد أعمال</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">احترافية عالية في جميع مراحل العمل. من التصميم إلى التنفيذ إلى التسليم، كل شيء كان مثالياً.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👩</div>
                    <div class="author-info">
                        <h4>نورة الحربي</h4>
                        <p>مالكة فيلا فاخرة</p>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

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
            initBackgroundSlider();
            initHeroAnimation();
        });
    </script>
</body>
</html>
