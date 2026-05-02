{{-- Basic Meta Tags --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

{{-- Open Graph Meta Tags --}}
@foreach ($openGraph as $property => $content)
    <meta property="{{ $property }}" content="{{ $content }}">
@endforeach

{{-- Twitter Card Meta Tags --}}
@foreach ($twitterCard as $name => $content)
    <meta name="{{ $name }}" content="{{ $content }}">
@endforeach

{{-- Additional Meta Tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="{{ config('app.name') }}">
<meta name="keywords" content="{{ config('app.keywords', 'real estate, property, apartments, houses') }}">

{{-- Hreflang for multilingual support --}}
@if (app()->getLocale() === 'en')
    <link rel="alternate" hreflang="en" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="ar" href="{{ str_replace('/en/', '/ar/', $canonicalUrl) }}">
    <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">
@else
    <link rel="alternate" hreflang="ar" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="en" href="{{ str_replace('/ar/', '/en/', $canonicalUrl) }}">
    <link rel="alternate" hreflang="x-default" href="{{ str_replace('/ar/', '/en/', $canonicalUrl) }}">
@endif

{{-- Structured Data (JSON-LD) --}}
@if (!empty($structuredData))
    <script type="application/ld+json">
        {!! json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endif

{{-- Breadcrumbs Structured Data --}}
@if (!empty($breadcrumbs))
    <script type="application/ld+json">
        {!! json_encode($breadcrumbs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endif

{{-- DNS Prefetch for performance --}}
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//www.googletagmanager.com">

{{-- Preconnect for critical resources --}}
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://www.google-analytics.com" crossorigin>

{{-- Favicon and App Icons --}}
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
