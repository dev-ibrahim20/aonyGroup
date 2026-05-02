<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Unit;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap.
     */
    public function index(): Response
    {
        $sitemap = $this->generateSitemap();
        
        return response($sitemap)
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    /**
     * Generate sitemap XML content.
     */
    private function generateSitemap(): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $xml .= $this->generateUrlEntry(
            url(route('home')),
            lastmod: now()->format('Y-m-d'),
            changefreq: 'weekly',
            priority: '1.0'
        );

        // Projects listing
        $xml .= $this->generateUrlEntry(
            url(route('projects.index')),
            lastmod: now()->format('Y-m-d'),
            changefreq: 'daily',
            priority: '0.9'
        );

        // Individual projects
        Project::chunk(100, function ($projects) use (&$xml) {
            foreach ($projects as $project) {
                $xml .= $this->generateUrlEntry(
                    url($project->full_canonical_url),
                    lastmod: $project->updated_at->format('Y-m-d'),
                    changefreq: $project->isAvailable() ? 'weekly' : 'monthly',
                    priority: $project->featured ? '0.8' : '0.7'
                );
            }
        });

        // Units (only available ones)
        Unit::where('status', 'available')->chunk(200, function ($units) use (&$xml) {
            foreach ($units as $unit) {
                $xml .= $this->generateUrlEntry(
                    url($unit->url ?? ''),
                    lastmod: $unit->updated_at->format('Y-m-d'),
                    changefreq: 'weekly',
                    priority: '0.6'
                );
            }
        });

        // Blog (if exists)
        if (class_exists('App\Models\Blog')) {
            $xml .= $this->generateUrlEntry(
                url(route('blog.index')),
                lastmod: now()->format('Y-m-d'),
                changefreq: 'daily',
                priority: '0.8'
            );

            \App\Models\Blog::published()->chunk(100, function ($posts) use (&$xml) {
                foreach ($posts as $post) {
                    $xml .= $this->generateUrlEntry(
                        url(route('blog.show', $post->slug)),
                        lastmod: $post->updated_at->format('Y-m-d'),
                        changefreq: 'monthly',
                        priority: '0.7'
                    );
                }
            });
        }

        // Contact page
        $xml .= $this->generateUrlEntry(
            url(route('contact')),
            lastmod: now()->format('Y-m-d'),
            changefreq: 'monthly',
            priority: '0.5'
        );

        // About page
        $xml .= $this->generateUrlEntry(
            url(route('about')),
            lastmod: now()->format('Y-m-d'),
            changefreq: 'monthly',
            priority: '0.5'
        );

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Generate individual URL entry for sitemap.
     */
    private function generateUrlEntry(string $url, string $lastmod, string $changefreq, string $priority): string
    {
        return <<<XML
        <url>
            <loc>{$url}</loc>
            <lastmod>{$lastmod}</lastmod>
            <changefreq>{$changefreq}</changefreq>
            <priority>{$priority}</priority>
        </url>
        XML;
    }

    /**
     * Generate robots.txt file.
     */
    public function robots(): Response
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n";
        $robots .= "Allow: /sitemap.xml\n";
        $robots .= "Disallow: /admin/\n";
        $robots .= "Disallow: /api/\n";
        $robots .= "Disallow: /storage/\n";
        $robots .= "Disallow: /vendor/\n";
        $robots .= "Disallow: /.env\n";
        $robots .= "Disallow: /artisan\n";
        $robots .= "\n";
        $robots .= "Sitemap: " . url('/sitemap.xml') . "\n";
        $robots .= "\n";
        $robots .= "# Crawl-delay: 1\n";
        $robots .= "# Allow: 10 requests per second\n";

        return response($robots)
            ->header('Content-Type', 'text/plain')
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
