<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="آخر أخبار ومقالات شركة العوني العقارية حول العقارات والاستثمار والتطوير.">
    <title>أخبارنا | شركة العوني العقارية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f4f6f8; color: #182230; font-family: 'Dubai', sans-serif; }
        .news-hero { padding: 5rem 1.5rem 4rem; text-align: center; background: linear-gradient(135deg, #182238, #263b57); color: #fff; }
        .news-hero span { color: #f2b916; font-weight: 700; }
        .news-hero h1 { margin: .5rem 0; font-size: clamp(2rem, 5vw, 3.4rem); }
        .news-hero p { max-width: 650px; margin: 0 auto; color: #d0d5dd; font-size: 1.1rem; line-height: 1.8; }
        .news-wrap { max-width: 1200px; margin: 0 auto; padding: 3.5rem 1.25rem 5rem; }
        .news-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 310px), 1fr)); gap: 1.5rem; }
        .news-card { display: flex; flex-direction: column; min-height: 100%; overflow: hidden; border: 1px solid #eaecf0; border-radius: 20px; background: #fff; box-shadow: 0 12px 35px rgba(16,24,40,.07); transition: transform .25s ease, box-shadow .25s ease; }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 20px 45px rgba(16,24,40,.12); }
        .news-image { width: 100%; height: 220px; object-fit: cover; background: #e4e7ec; }
        .news-body { display: flex; flex: 1; flex-direction: column; padding: 1.5rem; }
        .news-date { color: #9b6c00; font-size: .85rem; font-weight: 700; }
        .news-title { margin: .55rem 0; font-size: 1.3rem; line-height: 1.5; }
        .news-title a { color: #182230; text-decoration: none; }
        .news-title a:hover { color: #a87300; }
        .news-excerpt { color: #667085; line-height: 1.8; margin: 0 0 1.25rem; }
        .news-more { margin-top: auto; color: #9b6c00; font-weight: 800; text-decoration: none; }
        .news-empty { padding: 3rem 1rem; text-align: center; border: 1px dashed #d0d5dd; border-radius: 20px; color: #667085; background: #fff; }
        .news-pagination { margin-top: 2rem; }
        @media (prefers-reduced-motion: reduce) { .news-card { transition: none; } }
    </style>
</head>
<body>
    @include('partials.navbar')
    <header class="news-hero">
        <span>العوني العقارية</span>
        <h1>أخبارنا ومقالاتنا</h1>
        <p>تابعوا آخر المستجدات والأفكار حول العقارات والاستثمار والتطوير.</p>
    </header>
    <main class="news-wrap">
        @if ($posts->count())
            <div class="news-grid">
                @foreach ($posts as $post)
                    <article class="news-card">
                        <img class="news-image" src="{{ $post->featuredImage?->url ?: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $post->title_ar ?: $post->title_en }}" loading="lazy">
                        <div class="news-body">
                            @if ($post->published_at)<time class="news-date" datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('Y/m/d') }}</time>@endif
                            <h2 class="news-title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title_ar ?: $post->title_en }}</a></h2>
                            @if ($post->excerpt_ar ?: $post->excerpt_en)<p class="news-excerpt">{{ $post->excerpt_ar ?: $post->excerpt_en }}</p>@endif
                            <a class="news-more" href="{{ route('blog.show', $post->slug) }}">اقرأ المقال <span aria-hidden="true">←</span></a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="news-pagination">{{ $posts->links() }}</div>
        @else
            <div class="news-empty">لا توجد أخبار منشورة حاليًا. نعمل على إعداد محتوى جديد لكم.</div>
        @endif
    </main>
    @include('partials.footer')
</body>
</html>
