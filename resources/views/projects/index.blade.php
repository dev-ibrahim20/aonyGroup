<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="استكشف مجموعة مشاريعنا العقارية الفاخرة والاستثمارية في أفضل المواقع بمعايير بناء عالية">
    <meta name="keywords" content="مشاريع عقارية, عقارات فاخرة, استثمار عقاري, شقق سكنية, فيلات, مشاريع تجارية">
    <meta name="author" content="شركة العوني العقارية">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="مشاريعنا | شركة العوني العقارية">
    <meta property="og:description" content="استكشف مجموعة مشاريعنا العقارية الفاخرة والاستثمارية">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="مشاريعنا | شركة العوني العقارية">
    <meta name="twitter:description" content="استكشف مجموعة مشاريعنا العقارية الفاخرة والاستثمارية">
    <link rel="canonical" href="{{ url('/projects') }}">
    <title>مشاريعنا | شركة العوني العقارية</title>
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
            height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 50%, rgba(255, 193, 7, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .projects-section {
            padding: 4rem 2rem;
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
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image {
            transform: scale(1.1);
        }

        .project-content {
            padding: 2rem;
        }

        .project-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .badge-available {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .badge-sold-out {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .badge-coming-soon {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
        }

        .badge-featured {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
        }

        .project-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .project-location {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .project-description {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .project-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f2f4f7;
        }

        .project-units {
            color: #475467;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .view-details-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 7px 18px rgba(255, 193, 7, 0.3);
        }

        .view-details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(255, 193, 7, 0.4);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 1rem;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            color: #475467;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid #eaecf0;
        }

        .pagination-link:hover,
        .pagination-link.active {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #1a1a2e;
            border-color: transparent;
        }

        .pagination-link.disabled {
            opacity: 0.5;
            pointer-events: none;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 50vh;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .project-image {
                height: 220px;
            }

            .project-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .projects-grid {
                gap: 1.5rem;
            }

            .project-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">مشاريعنا العقارية</h1>
            <p class="hero-subtitle">استكشف مجموعة مشاريعنا الفاخرة والاستثمارية في أفضل المواقع</p>
        </div>
    </div>

    <div class="projects-section">
        @if ($projects->count() > 0)
            <div class="projects-grid">
                @foreach ($projects as $project)
                    <div class="project-card">
                        @if ($project->display_image)
                            <img src="{{ $project->display_image->url }}" alt="{{ $project->title }}" class="project-image" loading="lazy">
                        @else
                            <div class="project-image" style="background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%); display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: 3rem; color: #adb5bd;">🏢</span>
                            </div>
                        @endif
                        
                        <div class="project-content">
                            @if ($project->featured)
                                <span class="project-badge badge-featured">مشروع مميز</span>
                            @endif
                            
                            <span class="project-badge badge-{{ $project->status }}">
                                @if ($project->status === 'available') متاح
                                @elseif ($project->status === 'sold_out') مباع
                                @elseif ($project->status === 'coming_soon') قريبًا
                                @else {{ $project->status }}
                                @endif
                            </span>
                            
                            <h3 class="project-title">{{ $project->title }}</h3>
                            
                            <div class="project-location">
                                <span>📍</span>
                                <span>{{ $project->location }}</span>
                            </div>
                            
                            <p class="project-description">{{ $project->description }}</p>
                            
                            <div class="project-footer">
                                <span class="project-units">
                                    {{ $project->units->count() }} وحدة
                                </span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="view-details-btn">
                                    عرض التفاصيل
                                    <span>←</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($projects->hasPages())
                <div class="pagination">
                    {{ $projects->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🏗️</div>
                <h3>لا توجد مشاريع حالياً</h3>
                <p>نعمل على إضافة مشاريع جديدة قريباً</p>
            </div>
        @endif
    </div>

    @include('partials.footer')
</body>
</html>