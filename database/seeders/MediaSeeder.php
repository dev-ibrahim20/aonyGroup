<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media')->delete();

        // Sample image URLs (using placeholder images for demo)
        $projectImages = [
            'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&h=600&fit=crop',
        ];

        $blogImages = [
            'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=600&fit=crop',
        ];

        $portfolioImages = [
            'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&h=600&fit=crop',
        ];

        // Add images to projects
        $projects = Project::all();
        foreach ($projects as $index => $project) {
            $imageUrl = $projectImages[$index % count($projectImages)];
            Media::create([
                'mediable_type' => Project::class,
                'mediable_id' => $project->id,
                'type' => 'image',
                'url' => $imageUrl,
                'title' => $project->title_en,
                'description' => 'Project image',
                'order' => 1,
            ]);
        }

        // Add images to blogs
        $blogs = Blog::all();
        foreach ($blogs as $index => $blog) {
            $imageUrl = $blogImages[$index % count($blogImages)];
            Media::create([
                'mediable_type' => Blog::class,
                'mediable_id' => $blog->id,
                'type' => 'image',
                'url' => $imageUrl,
                'title' => $blog->title_en,
                'description' => 'Blog image',
                'order' => 1,
            ]);
        }

        // Add images to portfolios
        $portfolios = Portfolio::all();
        foreach ($portfolios as $index => $portfolio) {
            $imageUrl = $portfolioImages[$index % count($portfolioImages)];
            Media::create([
                'mediable_type' => Portfolio::class,
                'mediable_id' => $portfolio->id,
                'type' => 'image',
                'url' => $imageUrl,
                'title' => $portfolio->title_en,
                'description' => 'Portfolio image',
                'order' => 1,
            ]);
        }
    }
}
