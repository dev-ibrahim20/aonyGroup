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
        
        .hero-section {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.8) 100%);
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
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .content-section {
                padding: 3rem 1.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                min-height: 50vh;
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
        }
        
        @media (max-width: 480px) {
            .feature-card {
                padding: 1.5rem;
            }
            
            .icon-wrapper {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-button">← العودة للرئيسية</a>
    
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="text-center relative z-10">
            <div class="text-7xl mb-4">🔨</div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">المقاولات</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير
            </p>
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
    
    @include('footer')
</body>
</html>
