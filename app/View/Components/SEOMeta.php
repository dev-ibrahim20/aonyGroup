<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\SEOService;

class SEOMeta extends Component
{
    public array $seoData;
    public string $title;
    public string $description;
    public string $canonicalUrl;
    public string $robots;
    public ?string $image;
    public array $openGraph;
    public array $twitterCard;
    public array $structuredData;
    public array $breadcrumbs;

    /**
     * Create a new component instance.
     */
    public function __construct($model = null, array $customSEO = [])
    {
        if ($model) {
            $this->seoData = SEOService::generateSEOData($model);
        } else {
            $this->seoData = array_merge([
                'title' => config('app.name'),
                'description' => config('app.description', 'Real estate website'),
                'canonical_url' => request()->url(),
                'robots' => 'index,follow',
                'image' => asset('images/default-og-image.jpg'),
                'open_graph' => [],
                'twitter_card' => [],
                'structured_data' => [],
                'breadcrumbs' => [],
            ], $customSEO);
        }

        $this->title = $this->seoData['title'];
        $this->description = $this->seoData['description'];
        $this->canonicalUrl = $this->seoData['canonical_url'];
        $this->robots = $this->seoData['robots'];
        $this->image = $this->seoData['image'] ?? null;
        $this->openGraph = $this->seoData['open_graph'] ?? [];
        $this->twitterCard = $this->seoData['twitter_card'] ?? [];
        $this->structuredData = $this->seoData['structured_data'] ?? [];
        $this->breadcrumbs = $this->seoData['breadcrumbs'] ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo-meta');
    }
}
