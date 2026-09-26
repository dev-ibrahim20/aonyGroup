<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="خدمات التسويق العقاري من شركة العوني العقارية - استراتيجيات تسويقية ذكية لبيع وتأجير العقارات بأعلى قيمة">
    <meta name="keywords" content="تسويق عقاري, بيع العقارات, تأجير العقارات, تسويق رقمي, استهداف دقيق, تصوير احترافي, تقارير الأداء">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="التسويق العقاري - شركة العوني العقارية">
    <meta property="og:description" content="استراتيجيات تسويقية ذكية لبيع وتأجير العقارات بأعلى قيمة">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="التسويق العقاري - شركة العوني العقارية">
    <meta name="twitter:description" content="استراتيجيات تسويقية ذكية لبيع وتأجير العقارات بأعلى قيمة">
    <link rel="canonical" href="{{ url('/real-estate-marketing') }}">
    <title>التسويق العقاري | شركة العوني العقارية</title>
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
            <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=2560&q=90')"></div>
            <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2560&q=90')"></div>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-initial" id="heroInitial">
                <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10.5 12 3l9 7.5"></path><path d="M5 9v11h14V9"></path><path d="M9 20v-6h6v6"></path><path d="m9 10 2 2 4-4"></path></svg></div>
                <h1 class="main-title">التسويق العقاري</h1>
            </div>
            <div class="hero-full" id="heroFull">
                <div class="hero-brand">
                    <div class="logo-container"><span class="pulse-ring"></span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10.5 12 3l9 7.5"></path><path d="M5 9v11h14V9"></path><path d="M9 20v-6h6v6"></path><path d="m4 5 3-2"></path></svg></div>
                    <h1 class="main-title">التسويق العقاري</h1>
                </div>
                <div class="hero-info">
                    <div class="info-item"><h3>رؤيتنا</h3><p>أن نكون الخيار الموثوق لتسويق العقارات والوصول بها إلى جمهورها المناسب.</p></div>
                    <div class="info-item"><h3>رسالتنا</h3><p>نقدم استراتيجيات تسويقية مدروسة تعزز ظهور العقار وتدعم فرص بيعه أو تأجيره.</p></div>
                    <div class="info-item"><h3>قيمنا</h3><p>الاحترافية، الشفافية، وفهم احتياجات المالك والسوق في كل حملة تسويقية.</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">خدماتنا في التسويق العقاري</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="m3 10 9-7 9 7"></path><path d="M5 9v12h14V9"></path><path d="M9 21v-7h6v7"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">بيع العقارات</h3>
                <p class="text-gray-600">خدمات بيع احترافية مع تسعير سوقي دقيق وتسريع العملية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="8" cy="15" r="5"></circle><path d="m11.5 11.5 9-9 2 2-2 2 2 2-3 3-2-2-2 2"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">تأجير العقارات</h3>
                <p class="text-gray-600">إدارة وتأجير العقارات مع اختيار المستأجرين المناسبين</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"></rect><path d="M9 18h6"></path><path d="m9 10 2 2 4-4"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التسويق الرقمي</h3>
                <p class="text-gray-600">حملات تسويقية رقمية للوصول لأكبر شريحة من العملاء</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="12" r="5"></circle><circle cx="12" cy="12" r="1"></circle><path d="m13 11 7-7"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">الاستهداف الدقيق</h3>
                <p class="text-gray-600">تحديد الجمهور المستهدف بدقة لزيادة معدل التحويل</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M14 4h-4L8 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4z"></path><circle cx="12" cy="13" r="4"></circle></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">التصوير الاحترافي</h3>
                <p class="text-gray-600">تصوير عقاري احترافي مع فيديوهات وجولات افتراضية</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 3v18h18"></path><path d="m7 14 4-4 3 3 6-7"></path><path d="M16 6h4v4"></path></svg></div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">تقارير الأداء</h3>
                <p class="text-gray-600">تقارير دورية عن أداء الحملات التسويقية والنتائج</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-500 mb-4">هل تريد بيع أو تأجير عقارك؟</p>
            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition-opacity shadow-lg">
                أدرجه معنا الآن
            </button>
        </div>
    </div>

    <div class="process-section">
        <h2 class="text-3xl font-bold text-center">خطوات التسويق العقاري</h2>
        <div class="process-container">
            <div class="process-line"></div>
            <div class="process-step"><div class="step-number">1</div><div class="step-content"><h3 class="step-title">فهم العقار وتحديد أهداف المالك</h3></div></div>
            <div class="process-step right-side"><div class="step-number">2</div><div class="step-content"><h3 class="step-title">تحليل السوق والجمهور المستهدف</h3></div></div>
            <div class="process-step"><div class="step-number">3</div><div class="step-content"><h3 class="step-title">إعداد المحتوى والتصوير الاحترافي</h3></div></div>
            <div class="process-step right-side"><div class="step-number">4</div><div class="step-content"><h3 class="step-title">إطلاق الحملة عبر القنوات المناسبة</h3></div></div>
            <div class="process-step"><div class="step-number">5</div><div class="step-content"><h3 class="step-title">متابعة الاستفسارات وقياس النتائج</h3></div></div>
        </div>
    </div>

    <div class="projects-section">
        <h2 class="text-3xl font-bold text-center">حلولنا التسويقية</h2>
        <div class="projects-grid">
            <article class="project-card"><img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=900&q=85" alt="عقار سكني معروض للبيع" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">تسويق العقارات السكنية</h3><p class="project-description">عرض مميز للوحدات السكنية مع إبراز المزايا والموقع والخدمات المحيطة.</p><div class="project-details"><span class="project-badge">سكني</span><span class="project-badge">بيع وتأجير</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85" alt="مبنى أعمال ضمن محفظة عقارات تجارية" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">تسويق العقارات التجارية</h3><p class="project-description">حملات موجهة للمكاتب والمحلات والمساحات التجارية بما يناسب طبيعة النشاط.</p><div class="project-details"><span class="project-badge">تجاري</span><span class="project-badge">استهداف متخصص</span></div></div></article>
            <article class="project-card"><img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=85" alt="مجمع سكني حديث للتسويق" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">تسويق المشاريع والمجمعات</h3><p class="project-description">خطة إطلاق متكاملة للمشاريع العقارية، من بناء الهوية إلى متابعة العملاء المحتملين.</p><div class="project-details"><span class="project-badge">مشاريع</span><span class="project-badge">حملات متكاملة</span></div></div></article>
        </div>
    </div>

    <div class="testimonials-section">
        <h2 class="text-3xl font-bold text-center">مرتكزات حملتنا التسويقية</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">01</div><p class="testimonial-text">رسالة واضحة ومحتوى يبرز القيمة الحقيقية للعقار ويجيب عن أسئلة العملاء.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19V5m0 14h17"></path><path d="m7 15 4-4 3 3 6-7"></path></svg></div><div class="author-info"><h4>محتوى احترافي</h4><p>عرض جذاب وشفاف</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">02</div><p class="testimonial-text">اختيار القنوات والجمهور وفق نوع العقار وموقعه وأهداف الحملة.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="12" r="4"></circle><path d="m13 11 6-6"></path></svg></div><div class="author-info"><h4>استهداف مدروس</h4><p>وصول إلى العملاء المناسبين</p></div></div></div>
            <div class="testimonial-card"><div class="testimonial-quote" aria-hidden="true">03</div><p class="testimonial-text">مراجعة أداء الحملات والاستفادة من البيانات لتحسين الوصول وجودة الاستفسارات.</p><div class="testimonial-author"><div class="author-avatar" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19V5m0 14h17"></path><path d="m7 15 4-4 3 3 6-7"></path></svg></div><div class="author-info"><h4>قياس وتحسين</h4><p>تقارير ومتابعة مستمرة</p></div></div></div>
        </div>
    </div>

    @include('partials.footer')
    @include('sections.partials.service-page-design-script')
</body>
</html>
