<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="خدمات التطوير العقاري من شركة العوني العقارية - نطور مشاريع عقارية مبتكرة بمعايير عالمية وجودة استثنائية">
    <meta name="keywords" content="تطوير عقاري, مشاريع سكنية, مشاريع تجارية, فنادق ومنتجعات, تجمعات عمرانية, تصميم معماري, إدارة المشاريع">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="التطوير العقاري - شركة العوني العقارية">
    <meta property="og:description" content="نطور مشاريع عقارية مبتكرة بمعايير عالمية وجودة استثنائية">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="التطوير العقاري - شركة العوني العقارية">
    <meta name="twitter:description" content="نطور مشاريع عقارية مبتكرة بمعايير عالمية وجودة استثنائية">
    <link rel="canonical" href="{{ url('/real-estate-development') }}">
    <title>التطوير العقاري | شركة العوني العقارية</title>
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
        @include('sections.partials.service-page-design-styles')
    </style>
</head>
<body>
    <a href="/" class="back-button"><svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" style="display:inline-block;vertical-align:middle;margin-left:.4rem;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round"><path d="m15 18-6-6 6-6"></path><path d="M9 12h12"></path></svg>العودة للرئيسية</a>

    <div class="hero-section">
        <div class="background-slider" aria-hidden="true">
            <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=2560&q=90')"></div>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M13 10h6v11"></path><path d="M8 9h2M8 13h2M8 17h2M16 14h1M16 18h1"></path></svg></div>
                <h1 class="main-title">التطوير العقاري</h1>
            </div>
            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M13 10h6v11"></path><path d="M8 9h2M8 13h2M8 17h2M16 14h1M16 18h1"></path></svg></div>
                    <h1 class="main-title">التطوير العقاري</h1>
                </div>
                <div class="hero-info">
                    <div class="info-item"><h3>رؤيتنا</h3><p>تطوير وجهات ومشاريع عقارية تضيف قيمة مستدامة للمجتمعات.</p></div>
                    <div class="info-item"><h3>رسالتنا</h3><p>تحويل الأفكار والأراضي إلى مشاريع متكاملة مدروسة من التخطيط إلى التسليم.</p></div>
                    <div class="info-item"><h3>قيمنا</h3><p>الجودة، الابتكار، والتخطيط المسؤول في كل مرحلة من مراحل التطوير.</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">خدماتنا في التطوير العقاري</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M13 10h6v11"></path><path d="M8 9h2M8 13h2M8 17h2"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">المشاريع السكنية</h3>
                <p class="text-gray-600">تطوير مجمعات سكنية فاخرة تلبي احتياجات جميع الأسر</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="18" rx="1"></rect><path d="M8 7h2M14 7h2M8 11h2M14 11h2M8 15h2M14 15h2M10 21v-3h4v3"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">المشاريع التجارية</h3>
                <p class="text-gray-600">بناء مجمعات تجارية ومكاتب إدارية بتصاميم عصرية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 21V7l9-4 9 4v14"></path><path d="M3 11h18M7 11v10M17 11v10M10 15h4M10 18h4"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">الفنادق والمنتجعات</h3>
                <p class="text-gray-600">تطوير فنادق ومنتجعات سياحية بمواصفات عالمية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 21V9h6v12M9 21V4h7v17M16 21v-9h5v9"></path><path d="M5 12h2M5 16h2M12 8h1M12 12h1M12 16h1M18 15h1M18 18h1"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التجمعات العمرانية</h3>
                <p class="text-gray-600">تخطيط وتنفيذ تجمعات عمرانية متكاملة بمرافق متعددة</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5Z"></path><path d="m3 12 9 5 9-5M3 16l9 5 9-5"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصميم المعماري</h3>
                <p class="text-gray-600">تصاميم معمارية مبتكرة تجمع بين الجمال والوظيفة</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M14.7 6.3a5 5 0 0 0-6.4 6.4L3 18l3 3 5.3-5.3a5 5 0 0 0 6.4-6.4L14 13l-3-3 3.7-3.7Z"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">إدارة المشاريع</h3>
                <p class="text-gray-600">إدارة شاملة لمشاريع التطوير من التخطيط حتى التسليم</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-500 mb-4">هل تملك أرضاً وتريد تطويرها؟</p>
            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition-opacity shadow-lg">
                استشرنا الآن
            </button>
        </div>
    </div>

    <div class="process-section">
        <h2 class="text-3xl font-bold text-center">مراحل التطوير العقاري</h2>
        <div class="process-container">
            <div class="process-line"></div>
            <div class="process-step"><div class="step-number">1</div><div class="step-content"><h3 class="step-title">دراسة الموقع والفرصة التطويرية</h3></div></div>
            <div class="process-step right-side"><div class="step-number">2</div><div class="step-content"><h3 class="step-title">إعداد التصور ودراسة الجدوى</h3></div></div>
            <div class="process-step"><div class="step-number">3</div><div class="step-content"><h3 class="step-title">التخطيط والتصميم والتراخيص</h3></div></div>
            <div class="process-step right-side"><div class="step-number">4</div><div class="step-content"><h3 class="step-title">تنفيذ الأعمال وإدارة الجودة</h3></div></div>
            <div class="process-step"><div class="step-number">5</div><div class="step-content"><h3 class="step-title">التسليم والتشغيل والمتابعة</h3></div></div>
        </div>
    </div>

    <div class="projects-section">
        <h2 class="text-3xl font-bold text-center">أنواع المشاريع التي نطورها</h2>
        <div class="projects-grid">
            <article class="project-card"><img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=85" alt="مجمع سكني حديث" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">المشاريع السكنية</h3><p class="project-description">مجتمعات سكنية مخططة بعناية، تجمع بين جودة الحياة وتكامل الخدمات.</p><div class="project-details"><span class="project-badge">سكني</span><span class="project-badge">مجتمعات متكاملة</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85" alt="مبنى تجاري وإداري حديث" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">المشاريع التجارية</h3><p class="project-description">مراكز أعمال ومساحات تجارية مصممة لتلبية احتياجات الأنشطة المختلفة.</p><div class="project-details"><span class="project-badge">تجاري</span><span class="project-badge">أعمال</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=900&q=85" alt="فيلا عصرية ضمن تطوير عقاري" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">الضيافة والوجهات</h3><p class="project-description">مشاريع ضيافة وترفيه ترتقي بتجربة الزوار وتستفيد من إمكانات الموقع.</p><div class="project-details"><span class="project-badge">ضيافة</span><span class="project-badge">وجهات</span></div></div></article>
        </div>
    </div>

    <div class="testimonials-section">
        <h2 class="text-3xl font-bold text-center">مبادئ التطوير لدينا</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">01</div><p class="testimonial-text">نبدأ بفهم الموقع واحتياجات المجتمع والسوق قبل اعتماد أي تصور تطويري.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11"></path></svg></div><div class="author-info"><h4>تخطيط مدروس</h4><p>رؤية تبدأ من احتياج حقيقي</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">02</div><p class="testimonial-text">تنسيق التصميم والبنية التحتية والخدمات لتقديم مشروع متكامل ومتناسق.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5ZM3 12l9 5 9-5M3 16l9 5 9-5"></path></svg></div><div class="author-info"><h4>تكامل التخصصات</h4><p>تصميم وتنفيذ مترابط</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">03</div><p class="testimonial-text">متابعة الجودة والتقدم في مراحل المشروع لضمان الالتزام بالمخطط والمعايير.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m9 12 2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="author-info"><h4>جودة مستمرة</h4><p>من التخطيط حتى التسليم</p></div></div></div>
        </div>
    </div>

    @include('footer')
    @include('sections.partials.service-page-design-script')
</body>
</html>
