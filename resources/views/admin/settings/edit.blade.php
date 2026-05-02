@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Edit Settings</h1>
        <p class="page-subtitle">Update website and SEO settings</p>
    </div>
    <div>
        <a href="{{ route('admin.settings') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Settings
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">General Settings</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Application Name *</label>
                            <input type="text" name="app_name" class="form-control" value="{{ old('app_name', $settings['app_name']) }}" required>
                            @error('app_name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Application Description</label>
                            <textarea name="app_description" class="form-control" rows="3">{{ old('app_description', $settings['app_description']) }}</textarea>
                            @error('app_description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Contact Email *</label>
                            <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email']) }}" required>
                            @error('contact_email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Phone</label>
                            <input type="tel" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone']) }}">
                            @error('contact_phone')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Facebook</label>
                            <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings['social_links']['facebook']) }}" placeholder="https://facebook.com/yourpage">
                            @error('facebook')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Twitter</label>
                            <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $settings['social_links']['twitter']) }}" placeholder="https://twitter.com/yourhandle">
                            @error('twitter')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Instagram</label>
                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $settings['social_links']['instagram']) }}" placeholder="https://instagram.com/yourhandle">
                            @error('instagram')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">LinkedIn</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $settings['social_links']['linkedin']) }}" placeholder="https://linkedin.com/company/your-page">
                            @error('linkedin')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">YouTube</label>
                            <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $settings['social_links']['youtube']) }}" placeholder="https://youtube.com/channel/yourchannel">
                            @error('youtube')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.settings') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Reset
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">SEO Settings</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Default Meta Title</label>
                            <input type="text" name="seo_default_title" class="form-control" value="{{ old('seo_default_title', $settings['seo']['default_title']) }}" maxlength="60">
                                <small class="text-muted">Maximum 60 characters</small>
                                @error('seo_default_title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Default Description</label>
                            <textarea name="seo_default_description" class="form-control" rows="3" maxlength="160">{{ old('seo_default_description', $settings['seo']['default_description']) }}</textarea>
                                <small class="text-muted">Maximum 160 characters</small>
                                @error('seo_default_description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Default Keywords</label>
                            <input type="text" name="seo_default_keywords" class="form-control" value="{{ old('seo_default_keywords', $settings['seo']['default_keywords']) }}">
                            @error('seo_default_keywords')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Meta Title Max Length</label>
                            <input type="number" name="seo_meta_title_max_length" class="form-control" value="{{ old('seo_meta_title_max_length', $settings['seo']['meta']['title_max_length']) }}" min="30" max="70">
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @error('seo_meta_title_max_length')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Meta Description Max Length</label>
                            <input type="number" name="seo_meta_description_max_length" class="form-control" value="{{ old('seo_meta_description_max_length', $settings['seo']['meta']['description_max_length']) }}" min="50" max="200">
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @error('seo_meta_description_max_length')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Open Graph Type</label>
                            <select name="seo_open_graph_type" class="form-select">
                                <option value="website">Website</option>
                                <option value="article">Article</option>
                                <option value="product">Product</option>
                                <option value="service">Service</option>
                            </select>
                            @error('seo_open_graph_type')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Open Graph Site Name</label>
                            <input type="text" name="seo_open_graph_site_name" class="form-control" value="{{ old('seo_open_graph_site_name', $settings['seo']['open_graph']['site_name']) }}">
                                @error('seo_open_graph_site_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Open Graph Locale</label>
                            <select name="seo_open_graph_locale" class="form-select">
                                <option value="en_US">English (US)</option>
                                <option value="ar_AR">Arabic (AR)</option>
                            </select>
                            @error('seo_open_graph_locale')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">OG Image Width</label>
                            <input type="number" name="seo_open_graph_image_width" class="form-control" value="{{ old('seo_open_graph_image_width', $settings['seo']['open_graph']['image_width']) }}" min="1" max="9999">
                                @error('seo_open_graph_image_width')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">OG Image Height</label>
                            <input type="number" name="seo_open_graph_image_height" class="form-control" value="{{ old('seo_open_graph_image_height', $settings['seo']['open_graph']['image_height']) }}" min="1" max="9999">
                                @error('seo_open_graph_image_height')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Twitter Card Type</label>
                            <select name="seo_twitter_card" class="form-select">
                                <option value="summary_large_image">Summary with large image</option>
                                <option value="summary">Summary</option>
                                <option value="article">Article</option>
                            </select>
                            @error('seo_twitter_card')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter Site</label>
                            <input type="text" name="seo_twitter_site" class="form-control" value="{{ old('seo_twitter_site', $settings['seo']['twitter']['site']) }}">
                                @error('seo_twitter_site')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Cache Enabled</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="seo_cache_enabled" {{ old('seo_cache_enabled', $settings['seo']['cache']['enabled']) ? 'checked' : '' }}">
                                <label class="form-check-label">Enable SEO caching</label>
                            </div>
                            @error('seo_cache_enabled')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cache Duration (seconds)</label>
                            <input type="number" name="seo_cache_duration" class="form-control" value="{{ old('seo_cache_duration', $settings['seo']['cache']['duration']) }}" min="60" max="86400">
                                @error('seo_cache_duration')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cache Headers</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="seo_performance_cache_headers" {{ old('seo_performance_cache_headers', $settings['seo']['performance']['cache_headers']) ? 'checked' : '' }}">
                                <label class="form-check-label">Enable cache headers</label>
                            </div>
                            @error('seo_performance_cache_headers')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cache Max Age (seconds)</label>
                            <input type="number" name="seo_performance_cache_max_age" class="form-control" value="{{ old('seo_performance_cache_max_age', $settings['seo']['performance']['cache_max_age']) }}" min="0" max="7200">
                                @error('seo_performance_cache_max_age')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Security Headers</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="seo_security_enable_security_headers" {{ old('seo_security_enable_security_headers', $settings['seo']['security']['enable_security_headers']) ? 'checked' : '' }}">
                                <label class="form-check-label">Enable security headers</label>
                            </div>
                            @error('seo_security_enable_security_headers')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">CSP Policy</label>
                            <textarea name="seo_security_content_security_policy" class="form-control" rows="3">{{ old('seo_security_content_security_policy') }}</textarea>
                            <small class="text-muted">Enter CSP directives</small>
                            @error('seo_security_content_security_policy')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Supported Locales</label>
                        <div class="form-check">
                            @foreach($settings['seo']['localization']['supported_locales'] as $locale)
                                <div class="form-check">
                                    <input type="checkbox" name="seo_localization_supported_locales[]" value="{{ $locale }}" @if(in_array($locale, $settings['seo']['localization']['supported_locales'])) checked @endif>
                                    <label for="seo_localization_supported_locales[]">{{ ucfirst($locale) }}</label>
                                </div>
                            </div>
                            <small class="text-muted">Select all that apply</small>
                            @error('seo_localization_supported_locales')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Default Locale</label>
                            <select name="seo_localization_default_locale" class="form-select">
                                @foreach($settings['seo']['localization']['supported_locales'] as $locale)
                                    <option value="{{ $locale }}" {{ $locale === $settings['seo']['localization']['default_locale'] ? 'selected' : '' }}>{{ ucfirst($locale) }}</option>
                                </select>
                            </select>
                            @error('seo_localization_default_locale')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hreflang Enabled</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="seo_localization_hreflang_enabled" {{ old('seo_localization_hreflang_enabled', $settings['seo']['localization']['hreflang_enabled']) ? 'checked' : '' }}">
                                <label class="form-check-label">Enable hreflang tags</label>
                            </div>
                            @error('seo_localization_hreflang_enabled')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.settings') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Save Settings
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Performance Settings</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Image Optimization</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="image_optimization" checked>
                            <label class="form-check-label">Enable image optimization</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lazy Loading</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="lazy_loading" checked>
                            <label class="form-check-label">Enable lazy loading</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button onclick="window.open('{{ route('sitemap.xml') }}', '_blank')" class="btn btn-outline-success">
                        <i class="fas fa-sitemap me-2"></i> View Sitemap
                    </button>
                    <button onclick="window.open('{{ route('robots.txt') }}', '_blank')" class="btn btn-outline-info">
                        <i class="fas fa-robot me-2"></i> View Robots.txt
                    </button>
                    <button onclick="window.open('https://developers.google.com/search-console/', '_blank')" class="btn btn-outline-warning">
                        <i class="fas fa-google me-2"></i> Google Console
                    </button>
                    <button onclick="window.open('https://search.google.com/search-console/', '_blank')" class="btn btn-outline-primary">
                        <i class="fas fa-search me-2"></i> URL Inspector
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
