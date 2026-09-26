<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="خدمات مكتب الاستشارات الهندسية من شركة العوني العقارية - نقدم استشارات هندسية متخصصة ودراسات فنية دقيقة لمشاريعك">
    <meta name="keywords" content="استشارات هندسية, تصميم معماري, تصميم إنشائي, تصميم كهربائي, تصميم ميكانيكي, دراسات الجدوى, إشراف هندسي">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="مكتب الاستشارات الهندسية - شركة العوني العقارية">
    <meta property="og:description" content="نقدم استشارات هندسية متخصصة ودراسات فنية دقيقة لمشاريعك">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="مكتب الاستشارات الهندسية - شركة العوني العقارية">
    <meta name="twitter:description" content="نقدم استشارات هندسية متخصصة ودراسات فنية دقيقة لمشاريعك">
    <link rel="canonical" href="{{ url('/engineering-consultancy') }}">
    <title>مكتب الاستشارات الهندسية | شركة العوني العقارية</title>
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
            @include('sections.partials.service-page-design-styles');
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="hero-section">
        <div class="background-slider" aria-hidden="true">
            <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2560&q=90')"></div>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 21V5l8-3 8 3v16"></path><path d="M8 9h2M14 9h2M8 13h2M14 13h2M10 21v-4h4v4"></path><path d="M2 21h20"></path></svg></div>
                <h1 class="main-title">مكتب الاستشارات الهندسية</h1>
            </div>
            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 21V5l8-3 8 3v16"></path><path d="M8 9h2M14 9h2M8 13h2M14 13h2M10 21v-4h4v4"></path><path d="M2 21h20"></path></svg></div>
                    <h1 class="main-title">الاستشارات الهندسية</h1>
                </div>
                <div class="hero-info">
                    <div class="info-item"><h3>رؤيتنا</h3><p>أن تكون استشاراتنا أساسًا لمشاريع آمنة، عملية، وجميلة التصميم.</p></div>
                    <div class="info-item"><h3>رسالتنا</h3><p>تقديم حلول هندسية متكاملة تستند إلى دراسة دقيقة وتنسيق بين التخصصات.</p></div>
                    <div class="info-item"><h3>قيمنا</h3><p>الدقة، السلامة، والالتزام بالمعايير في كل مخطط وقرار هندسي.</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">خدماتنا الهندسية</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 21 21 3l-2-2L1 19l2 2Z"></path><path d="m14 4 3 3M11 7l2 2M8 10l2 2M5 13l2 2"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصميم المعماري</h3>
                <p class="text-gray-600">تصاميم معمارية مبتكرة تلبي احتياجاتك وتتجاوز توقعاتك</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M2 21h20M5 21V8l7-4 7 4v13"></path><path d="M8 11h2M14 11h2M8 15h2M14 15h2M10 21v-3h4v3"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصميم الإنشائي</h3>
                <p class="text-gray-600">تصاميم إنشائية آمنة ومستقرة بمواصفات عالمية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="m13 2-3 8h7L9 22l2-9H5l8-11Z"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصميم الكهربائي</h3>
                <p class="text-gray-600">تصاميم كهربائية حديثة مع أنظمة ذكية وفعالة</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M12 3s7 7.2 7 12a7 7 0 0 1-14 0c0-4.8 7-12 7-12Z"></path><path d="M9 16a3 3 0 0 0 3 3"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصميم الميكانيكي</h3>
                <p class="text-gray-600">تصاميم ميكانيكية شاملة للتهوية والتكييف والسباكة</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 3v18h18"></path><path d="M7 16v-4M12 16V7M17 16v-7M21 16V5"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">دراسات الجدوى</h3>
                <p class="text-gray-600">دراسات جدوى فنية واقتصادية شاملة للمشاريع</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4M8 11l2 2 4-4"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">الإشراف الهندسي</h3>
                <p class="text-gray-600">إشراف هندسي شامل على جميع مراحل التنفيذ</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-500 mb-4">هل تحتاج استشارة هندسية لمشروعك؟</p>
            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition-opacity shadow-lg">
                احجز استشارة
            </button>
        </div>
    </div>

    <div class="process-section">
        <h2 class="text-3xl font-bold text-center">مراحل الاستشارة الهندسية</h2>
        <div class="process-container">
            <div class="process-line"></div>
            <div class="process-step"><div class="step-number">1</div><div class="step-content"><h3 class="step-title">فهم متطلبات المشروع واحتياجاته</h3></div></div>
            <div class="process-step right-side"><div class="step-number">2</div><div class="step-content"><h3 class="step-title">رفع البيانات ودراسة الموقع</h3></div></div>
            <div class="process-step"><div class="step-number">3</div><div class="step-content"><h3 class="step-title">إعداد الحلول والمخططات الهندسية</h3></div></div>
            <div class="process-step right-side"><div class="step-number">4</div><div class="step-content"><h3 class="step-title">مراجعة التخصصات واعتماد المستندات</h3></div></div>
            <div class="process-step"><div class="step-number">5</div><div class="step-content"><h3 class="step-title">الإشراف والمتابعة حسب نطاق العمل</h3></div></div>
        </div>
    </div>

    <div class="projects-section">
        <h2 class="text-3xl font-bold text-center">التخصصات الهندسية</h2>
        <div class="projects-grid">
            <article class="project-card"><img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=900&q=85" alt="مخططات وتصميم معماري لمشروع" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">التصميم المعماري</h3><p class="project-description">تخطيط المساحات والواجهات بما يوازن بين الوظيفة والجمال واحتياجات المستخدم.</p><div class="project-details"><span class="project-badge">معماري</span><span class="project-badge">تصميم</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85" alt="مبنى حديث للتصميم الإنشائي" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">التصميم الإنشائي</h3><p class="project-description">حلول إنشائية تراعي سلامة المبنى ومتطلبات الاستخدام والاشتراطات الفنية.</p><div class="project-details"><span class="project-badge">إنشائي</span><span class="project-badge">سلامة</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=85" alt="مساحة عمل وتجهيزات هندسية داخلية" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">أنظمة المباني والإشراف</h3><p class="project-description">تنسيق الأنظمة الكهربائية والميكانيكية ودعم التنفيذ من خلال المتابعة الهندسية.</p><div class="project-details"><span class="project-badge">كهرباء وميكانيكا</span><span class="project-badge">إشراف</span></div></div></article>
        </div>
    </div>

    <div class="testimonials-section">
        <h2 class="text-3xl font-bold text-center">معاييرنا الهندسية</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">01</div><p class="testimonial-text">تنسيق متكامل بين المعماري والإنشائي والكهربائي والميكانيكي لتقليل التعارضات.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4zM4 9h16M9 4v16"></path></svg></div><div class="author-info"><h4>تكامل التخصصات</h4><p>مخططات مترابطة وواضحة</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">02</div><p class="testimonial-text">مراجعة فنية دقيقة تراعي اشتراطات السلامة والمتطلبات والأنظمة ذات الصلة.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 8 4v5c0 5-3.5 8-8 10-4.5-2-8-5-8-10V7l8-4Z"></path><path d="m9 12 2 2 4-4"></path></svg></div><div class="author-info"><h4>السلامة والامتثال</h4><p>اعتبارات أساسية في التصميم</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">03</div><p class="testimonial-text">اختيار حلول عملية قابلة للتنفيذ وتخدم الاستخدام الفعلي للمبنى.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11"></path><path d="M8 9h2M8 13h2M8 17h2"></path></svg></div><div class="author-info"><h4>حلول قابلة للتنفيذ</h4><p>كفاءة في التصميم والتشغيل</p></div></div></div>
        </div>
    </div>

    @include('partials.footer')
    @include('sections.partials.service-page-design-script')
</body>
</html>
