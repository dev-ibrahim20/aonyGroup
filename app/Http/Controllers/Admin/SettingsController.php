<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = [
            'app_name' => config('app.name'),
            'app_description' => config('app.description', 'Real estate website showcasing premium properties'),
            'app_url' => config('app.url'),
            'contact_email' => config('mail.from.address'),
            'contact_phone' => config('app.contact_phone', '+1234567890'),
            'social_links' => [
                'facebook' => config('social.facebook', ''),
                'twitter' => config('social.twitter', ''),
                'instagram' => config('social.instagram', ''),
                'linkedin' => config('social.linkedin', ''),
                'youtube' => config('social.youtube', ''),
            ],
            'seo' => [
                'default_title' => config('seo.default_title', config('app.name')),
                'default_description' => config('seo.default_description', config('app.description')),
                'default_keywords' => config('seo.default_keywords', ''),
                'meta' => [
                    'title_max_length' => config('seo.meta.title_max_length', 60),
                    'description_max_length' => config('seo.meta.description_max_length', 160),
                ],
                'open_graph' => [
                    'type' => config('seo.open_graph.type'),
                    'site_name' => config('seo.open_graph.site_name'),
                    'locale' => config('seo.open_graph.locale'),
                    'image_width' => config('seo.open_graph.image_width'),
                    'image_height' => config('seo.open_graph.image_height'),
                ],
                'twitter' => [
                    'card' => config('seo.twitter.card'),
                    'site' => config('seo.twitter.site'),
                ],
                'cache' => [
                    'enabled' => config('seo.cache.enabled', true),
                    'duration' => config('seo.cache.duration', 86400),
                ],
                'performance' => [
                    'enable_dns_prefetch' => config('seo.performance.enable_dns_prefetch', true),
                    'enable_preconnect' => config('seo.performance.enable_preconnect', true),
                    'cache_headers' => config('seo.performance.cache_headers', true),
                    'cache_max_age' => config('seo.performance.cache_max_age', 3600),
                ],
                'security' => [
                    'enable_security_headers' => config('seo.security.enable_security_headers', true),
                    'content_security_policy' => config('seo.security.content_security_policy', []),
                ],
                'localization' => [
                    'supported_locales' => config('seo.localization.supported_locales', ['en', 'ar']),
                    'default_locale' => config('seo.localization.default_locale', 'en'),
                    'hreflang_enabled' => config('seo.localization.hreflang_enabled', true),
                ],
            ],
        ];

        return view('admin.settings.index', [
            'settings' => $settings,
            'pageTitle' => 'Settings'
        ]);
    }

    /**
     * Update the specified settings in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'nullable|string|max:500',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'seo_default_title' => 'nullable|string|max:255',
            'seo_default_description' => 'nullable|string|max:500',
            'seo_default_keywords' => 'nullable|string',
            'seo_meta_title_max_length' => 'nullable|integer|min:30|max:70',
            'seo_meta_description_max_length' => 'nullable|integer|min:50|max:200',
            'seo_open_graph_type' => 'nullable|string|max:50',
            'seo_open_graph_site_name' => 'nullable|string|max:100',
            'seo_open_graph_locale' => 'nullable|string|max:10',
            'seo_open_graph_image_width' => 'nullable|integer|min:1|max:9999',
            'seo_open_graph_image_height' => 'nullable|integer|min:1|max:9999',
            'seo_twitter_card' => 'nullable|string|max:20',
            'seo_twitter_site' => 'nullable|string|max:100',
            'seo_cache_enabled' => 'nullable|boolean',
            'seo_cache_duration' => 'nullable|integer|min:60|max:86400',
            'seo_performance_enable_dns_prefetch' => 'nullable|boolean',
            'seo_performance_enable_preconnect' => 'nullable|boolean',
            'seo_performance_cache_headers' => 'nullable|boolean',
            'seo_performance_cache_max_age' => 'nullable|integer|min:0|max:7200',
            'seo_security_enable_security_headers' => 'nullable|boolean',
            'seo_security_content_security_policy' => 'nullable|array',
            'seo_localization_supported_locales' => 'nullable|array',
            'seo_localization_default_locale' => 'nullable|string',
            'seo_localization_hreflang_enabled' => 'nullable|boolean',
        ]);

        // Update .env file
        $envContent = file_get_contents(base_path('.env'));
        
        $envContent = preg_replace('/^APP_NAME=.*/m', 'APP_NAME=' . $validated['app_name'], $envContent);
        $envContent = preg_replace('/^APP_DESCRIPTION=.*/m', 'APP_DESCRIPTION="' . addslashes($validated['app_description']) . '"', $envContent);
        $envContent = preg_replace('/^MAIL_FROM_ADDRESS=.*/m', 'MAIL_FROM_ADDRESS=' . $validated['contact_email'], $envContent);
        $envContent = preg_replace('/^CONTACT_PHONE=.*/m', 'CONTACT_PHONE=' . $validated['contact_phone'], $envContent);
        
        // Update social links
        $envContent = preg_replace('/^FACEBOOK=.*/m', 'FACEBOOK=' . ($validated['facebook'] ?? ''), $envContent);
        $envContent = preg_replace('/^TWITTER=.*/m', 'TWITTER=' . ($validated['twitter'] ?? ''), $envContent);
        $envContent = preg_replace('/^INSTAGRAM=.*/m', 'INSTAGRAM=' . ($validated['instagram'] ?? ''), $envContent);
        $envContent = preg_replace('/^YOUTUBE=.*/m', 'YOUTUBE=' . ($validated['youtube'] ?? ''), $envContent);
        
        file_put_contents(base_path('.env'), $envContent);

        // Update config files
        $this->updateConfigFile('app', [
            'name' => $validated['app_name'],
            'description' => $validated['app_description'],
        ]);

        $this->updateConfigFile('seo', [
            'default_title' => $validated['seo_default_title'],
            'default_description' => $validated['seo_default_description'],
            'default_keywords' => $validated['seo_default_keywords'],
            'meta' => [
                'title_max_length' => $validated['seo_meta_title_max_length'],
                'description_max_length' => $validated['seo_meta_description_max_length'],
            ],
            'open_graph' => [
                'type' => $validated['seo_open_graph_type'],
                'site_name' => $validated['seo_open_graph_site_name'],
                'locale' => $validated['seo_open_graph_locale'],
                'image_width' => $validated['seo_open_graph_image_width'],
                'image_height' => $validated['seo_open_graph_image_height'],
            ],
            'twitter' => [
                'card' => $validated['seo_twitter_card'],
                'site' => $validated['seo_twitter_site'],
            ],
            'cache' => [
                'enabled' => $validated['seo_cache_enabled'],
                'duration' => $validated['seo_cache_duration'],
            ],
            'performance' => [
                'enable_dns_prefetch' => $validated['seo_performance_enable_dns_prefetch'],
                'enable_preconnect' => $validated['seo_performance_enable_preconnect'],
                'cache_headers' => $validated['seo_performance_cache_headers'],
                'cache_max_age' => $validated['seo_performance_cache_max_age'],
            ],
            'security' => [
                'enable_security_headers' => $validated['seo_security_enable_security_headers'],
                'content_security_policy' => $validated['seo_security_content_security_policy'],
            ],
            'localization' => [
                'supported_locales' => $validated['seo_localization_supported_locales'],
                'default_locale' => $validated['seo_localization_default_locale'],
                'hreflang_enabled' => $validated['seo_localization_hreflang_enabled'],
            ],
        ]);

        return redirect()
            ->route('admin.settings')
            ->with('success', 'Settings updated successfully!');
    }

    }
