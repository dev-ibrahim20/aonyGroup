<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $content['mission'] }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route($section) }}">
    <title>{{ $content['title'] }} | شركة العوني العقارية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family:'Dubai',sans-serif; }
        body { margin:0; overflow-x:hidden; background:linear-gradient(135deg,#f8f9fa 0%,#e9ecef 100%); }
        @include('sections.partials.service-page-design-styles')
        .logo-container > svg { width:76px; height:76px; }
        .content-section { padding:5rem 2rem; }
        .content-section h2 { margin-bottom:2.5rem; color:#243247; }
        .managed-services { display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1.5rem; }
        .managed-feature { padding:2rem; border:1px solid rgba(15,23,42,.06); border-radius:22px; background:rgba(255,255,255,.96); box-shadow:0 12px 34px rgba(16,24,40,.07); transition:transform .3s ease,box-shadow .3s ease; }
        .managed-feature:hover { transform:translateY(-7px); box-shadow:0 20px 44px rgba(16,24,40,.12); }
        .managed-icon { display:grid; width:62px; height:62px; place-items:center; margin-bottom:1.2rem; border-radius:18px; color:#253247; background:linear-gradient(135deg,#ffe7a3,#ffc83d); }
        .managed-icon svg { width:30px; height:30px; }
        .managed-feature h3 { margin:0 0 .55rem; color:#243247; font-size:1.15rem; }
        .managed-feature p { margin:0; color:#667085; line-height:1.8; }
        .managed-cta { margin-top:3rem; text-align:center; }
        .managed-cta p { margin:0 0 1rem; color:#667085; }
        .managed-cta a { display:inline-flex; align-items:center; gap:.5rem; padding:.85rem 1.7rem; border-radius:30px; color:#fff; background:linear-gradient(135deg,#d99a00,#f2b916); font-weight:800; box-shadow:0 9px 23px rgba(217,154,0,.22); }
        .highlight-number { width:42px; height:42px; display:grid; place-items:center; margin-bottom:14px; border-radius:13px; color:#ffd15a; background:rgba(255,193,7,.13); font-weight:800; }
        .managed-reviewer { display:flex; align-items:center; gap:1rem; }
        .managed-reviewer .author-avatar svg { width:26px; height:26px; }
        .managed-rating { margin-top:.5rem; color:#ffc107; letter-spacing:.12em; }
        @media(max-width:768px) { .content-section { padding:3rem 1rem; } }
        @media(prefers-reduced-motion:reduce) { .managed-feature { transition:none; } }
    </style>
</head>
<body>
    @include('partials.navbar')
    <main>
        <section class="hero-section" aria-label="{{ $content['title'] }}">
            <div class="background-slider" aria-hidden="true">
                @foreach($content['hero_images'] as $index => $image)
                    <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image:url('{{ $image }}')"></div>
                @endforeach
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-initial" id="heroInitial">
                    <div class="logo-container"><span class="pulse-ring"></span>@include('sections.partials.service-icon', ['icon' => $content['services'][0]['icon']])</div>
                    <h1 class="main-title">{{ $content['title'] }}</h1>
                </div>
                <div class="hero-full" id="heroFull">
                    <div class="hero-brand"><div class="logo-container"><span class="pulse-ring"></span>@include('sections.partials.service-icon', ['icon' => $content['services'][0]['icon']])</div><h1 class="main-title">{{ $content['title'] }}</h1></div>
                    <div class="hero-info">
                        <div class="info-item"><h3>رؤيتنا</h3><p>{{ $content['vision'] }}</p></div>
                        <div class="info-item"><h3>رسالتنا</h3><p>{{ $content['mission'] }}</p></div>
                        <div class="info-item"><h3>قيمنا</h3><p>{{ $content['values'] }}</p></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center">{{ $content['services_heading'] }}</h2>
            <div class="managed-services">
                @foreach($content['services'] as $service)
                    <article class="managed-feature"><div class="managed-icon">@include('sections.partials.service-icon', ['icon' => $service['icon']])</div><h3>{{ $service['title'] }}</h3><p>{{ $service['description'] }}</p></article>
                @endforeach
            </div>
            <div class="managed-cta"><p>{{ $content['cta_text'] }}</p><a href="{{ route('landing') }}#contact">{{ $content['cta_button'] }}<span aria-hidden="true">←</span></a></div>
        </section>

        <section class="process-section">
            <h2 class="text-3xl font-bold text-center">{{ $content['process_title'] }}</h2>
            <div class="process-container">
                @foreach($content['steps'] as $index => $step)
                    <div class="process-step {{ $index % 2 ? 'right-side' : '' }}"><div class="step-number">{{ $index + 1 }}</div><div class="step-content"><h3 class="step-title">{{ $step }}</h3></div></div>
                @endforeach
            </div>
        </section>

        <section class="projects-section">
            <h2 class="text-3xl font-bold text-center">{{ $content['projects_title'] }}</h2>
            <div class="projects-grid">
                @foreach($content['projects'] as $project)
                    <article class="project-card"><img src="{{ $project['image'] }}" alt="{{ $project['alt'] }}" class="project-image" loading="lazy"><div class="project-content"><h3 class="project-title">{{ $project['title'] }}</h3><p class="project-description">{{ $project['description'] }}</p><div class="project-details"><span class="project-badge">{{ $project['badge1'] }}</span><span class="project-badge">{{ $project['badge2'] }}</span></div></div></article>
                @endforeach
            </div>
        </section>

        <section class="testimonials-section">
            <h2 class="text-3xl font-bold text-center">{{ $content['highlights_heading'] }}</h2>
            <div class="testimonials-grid">
                @foreach($content['highlights'] as $index => $highlight)
                    <article class="testimonial-card"><div class="highlight-number">{{ $section === 'construction' ? '“' : str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div><p class="testimonial-text">{{ $highlight['text'] }}</p><div class="managed-reviewer"><div class="author-avatar">@include('sections.partials.service-icon', ['icon' => $content['services'][$index % count($content['services'])]['icon']])</div><div class="author-info"><h4>{{ $highlight['title'] }}</h4><p>{{ $highlight['subtitle'] }}</p>@if(!empty($highlight['rating']))<div class="managed-rating" aria-label="التقييم {{ $highlight['rating'] }} من 5">{{ str_repeat('★', (int) $highlight['rating']) }}</div>@endif</div></div></article>
                @endforeach
            </div>
        </section>
    </main>
    @include('partials.footer')
    @include('sections.partials.service-page-design-script')
</body>
</html>
