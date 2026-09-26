<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $post->meta_description ?: ($post->excerpt_ar ?: $post->title_ar) }}">
    <title>{{ $post->meta_title ?: $post->title_ar }} | شركة العوني العقارية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f4f6f8; color: #182230; font-family: 'Dubai', sans-serif; }
        .article-wrap { max-width: 920px; margin: 0 auto; padding: 3rem 1.25rem 5rem; }
        .article-back { display: inline-flex; align-items: center; gap: .5rem; color: #916400; text-decoration: none; font-weight: 800; margin-bottom: 1.5rem; }
        .article { overflow: hidden; border: 1px solid #eaecf0; border-radius: 24px; background: #fff; box-shadow: 0 15px 45px rgba(16,24,40,.08); }
        .article-image { display: block; width: 100%; max-height: 480px; object-fit: cover; background: #e4e7ec; }
        .article-content { padding: clamp(1.4rem, 5vw, 3.5rem); }
        .article-date { color: #9b6c00; font-weight: 700; }
        .article h1 { margin: .75rem 0 1.5rem; font-size: clamp(1.8rem, 5vw, 3rem); line-height: 1.4; }
        .article-excerpt { color: #667085; font-size: 1.15rem; line-height: 1.9; border-right: 3px solid #e7a900; padding-right: 1rem; margin-bottom: 2rem; }
        .article-text { color: #344054; font-size: 1.08rem; line-height: 2; white-space: pre-line; overflow-wrap: anywhere; }
        @media (max-width: 600px) { .article-wrap { padding-top: 2rem; } .article { border-radius: 18px; } }
    </style>
</head>
<body>
    @include('partials.navbar')
    <main class="article-wrap">
        <a class="article-back" href="{{ route('blog.index') }}"><span aria-hidden="true">→</span> العودة إلى الأخبار</a>
        <article class="article">
            @if ($post->featuredImage?->url)
                <img class="article-image" src="{{ $post->featuredImage->url }}" alt="{{ $post->title_ar }}">
            @endif
            <div class="article-content">
                @if ($post->published_at)<time class="article-date" datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('Y/m/d') }}</time>@endif
                <h1>{{ $post->title_ar ?: $post->title_en }}</h1>
                @if ($post->excerpt_ar ?: $post->excerpt_en)<p class="article-excerpt">{{ $post->excerpt_ar ?: $post->excerpt_en }}</p>@endif
                <div class="article-text">{{ $post->content_ar ?: $post->content_en }}</div>
            </div>
        </article>
    </main>
    @include('partials.footer')
</body>
</html>
