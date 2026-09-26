<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function homepageDefaults(): array
    {
        return [
            'company_name' => 'شركة العوني العقارية',
            'vision' => 'أن نكون الخيار الأول والمفضل في السوق العقاري من خلال تقديم خدمات استثنائية تتجاوز توقعات عملائنا.',
            'mission' => 'نقدم حلولاً عقارية شاملة ومبتكرة تضمن لعملائنا أعلى عوائد الاستثمار مع الحفاظ على أعلى معايير الجودة.',
            'values' => 'النزاهة، الاحترافية، الابتكار، والالتزام بخدمة عملائنا بأعلى معايير الجودة والأمانة.',
            'logo' => '',
            'hero_images' => [
                'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
            ],
            'sections' => [
                ['name' => 'الاستثمار العقاري', 'description' => 'فرص استثمارية استراتيجية في العقارات بأعلى عوائد', 'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'route' => 'real-estate-investment', 'icon' => '🏢'],
                ['name' => 'التطوير العقاري', 'description' => 'تطوير مشاريع عقارية مبتكرة بمعايير عالمية', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'route' => 'real-estate-development', 'icon' => '🏗️'],
                ['name' => 'المقاولات', 'description' => 'تنفيذ مشاريع البناء بأعلى جودة وكفاءة', 'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'route' => 'construction', 'icon' => '🔨'],
                ['name' => 'التسويق العقاري', 'description' => 'استراتيجيات تسويقية ذكية لبيع وتأجير العقارات', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'route' => 'real-estate-marketing', 'icon' => '📊'],
                ['name' => 'مكتب الاستشارات الهندسية', 'description' => 'استشارات هندسية متخصصة ودراسات فنية دقيقة', 'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'route' => 'engineering-consultancy', 'icon' => '📐'],
            ],
            'contact' => [
                'address' => 'القاهرة، مصر - التجمع الخامس',
                'phone' => '+20 2 1234 5678',
                'mobile' => '+20 10 1234 5678',
                'email' => 'info@aonygroup.com',
                'hours' => 'الأحد - الخميس: 9 ص - 6 م',
            ],
        ];
    }

    public static function homepage(): array
    {
        return self::resolveImagePaths(self::rawHomepage());
    }

    public static function rawHomepage(): array
    {
        $defaults = self::homepageDefaults();
        $stored = self::query()->where('key', 'homepage_content')->value('value');
        $content = is_string($stored) ? json_decode($stored, true) : null;

        if (!is_array($content)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $content);
    }

    public static function saveHomepage(array $content): void
    {
        self::updateOrCreate(
            ['key' => 'homepage_content'],
            ['value' => json_encode($content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)]
        );
    }

    private static function resolveImagePaths(array $content): array
    {
        $resolve = static function (?string $image): string {
            if (!$image) {
                return '';
            }

            if (preg_match('/^https?:\/\//i', $image) || str_starts_with($image, '/')) {
                return $image;
            }

            return asset('storage/' . ltrim($image, '/'));
        };

        $content['logo'] = $resolve($content['logo'] ?? '');
        foreach ($content['hero_images'] as $index => $image) {
            $content['hero_images'][$index] = $resolve($image);
        }
        foreach ($content['sections'] as $index => $section) {
            $content['sections'][$index]['image'] = $resolve($section['image'] ?? '');
        }

        return $content;
    }
}
