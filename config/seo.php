<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SEO Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration settings for the SEO system.
    |
    */

    'default_title' => env('APP_NAME', 'Real Estate Website'),
    'default_description' => env('APP_DESCRIPTION', 'Find your dream property with our premium real estate listings'),
    'default_keywords' => 'real estate, property, apartments, houses, luxury homes, villas, condos',
    
    'meta' => [
        'title_max_length' => 60,
        'description_max_length' => 160,
        'keywords_max_length' => 255,
    ],
    
    'open_graph' => [
        'type' => 'website',
        'site_name' => env('APP_NAME', 'Real Estate Website'),
        'locale' => 'en_US',
        'image_width' => 1200,
        'image_height' => 630,
        'image_type' => 'image/jpeg',
    ],
    
    'twitter' => [
        'card' => 'summary_large_image',
        'site' => env('TWITTER_HANDLE', '@realestate'),
        'creator' => env('TWITTER_CREATOR', '@realestate'),
    ],
    
    'structured_data' => [
        'organization' => [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => env('APP_NAME', 'Real Estate Website'),
            'url' => env('APP_URL'),
            'logo' => env('APP_URL') . '/images/logo.png',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => env('COMPANY_PHONE', '+1234567890'),
                'contactType' => 'sales',
                'availableLanguage' => ['English', 'Arabic'],
            ],
        ],
        'website' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => env('APP_NAME', 'Real Estate Website'),
            'url' => env('APP_URL'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => env('APP_URL') . '/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ],
    ],
    
    'sitemap' => [
        'enabled' => true,
        'frequency' => 'daily',
        'priority' => '1.0',
        'exclude_patterns' => [
            'admin/*',
            'auth/*',
            'profile/*',
        ],
    ],
    
    'robots' => [
        'enabled' => true,
        'user_agent' => '*',
        'disallow' => [
            '/admin',
            '/auth',
            '/profile',
            '/storage',
        ],
        'allow' => [
            '/',
            '/projects',
            '/units',
            '/blog',
        ],
    ],
    
    'performance' => [
        'enable_dns_prefetch' => true,
        'enable_preconnect' => true,
        'cache_headers' => true,
        'cache_max_age' => 3600, // 1 hour
    ],
    
    'security' => [
        'enable_security_headers' => true,
        'content_security_policy' => [
            'default-src' => "'self'",
            'script-src' => "'self' 'unsafe-inline' https://www.google-analytics.com",
            'style-src' => "'self' 'unsafe-inline' https://fonts.googleapis.com",
            'font-src' => "'self' https://fonts.gstatic.com",
            'img-src' => "'self' data: https:",
            'connect-src' => "'self' https://www.google-analytics.com",
        ],
    ],
    
    'localization' => [
        'supported_locales' => ['en', 'ar'],
        'default_locale' => 'en',
        'hreflang_enabled' => true,
    ],
    
    'analytics' => [
        'google_analytics_id' => env('GA_TRACKING_ID'),
        'google_tag_manager_id' => env('GTM_ID'),
        'facebook_pixel_id' => env('FACEBOOK_PIXEL_ID'),
    ],
    
    'cache' => [
        'enabled' => env('SEO_CACHE_ENABLED', true),
        'duration' => env('SEO_CACHE_DURATION', 86400), // 24 hours
        'prefix' => 'seo_',
        'redis_connection' => env('REDIS_CACHE_CONNECTION', 'default'),
    ],
    
    'sitemap' => [
        'enabled' => true,
        'frequency' => 'daily',
        'priority' => '1.0',
        'exclude_patterns' => [
            'admin/*',
            'auth/*',
            'profile/*',
        ],
    ],
];
