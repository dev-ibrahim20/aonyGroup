<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentPageSetting extends Model
{
    protected $table = 'investment_page_settings';

    protected $fillable = [
        'hero_images',
        'services_heading',
        'services',
        'areas_heading',
        'investment_areas',
    ];

    protected $casts = [
        'hero_images' => 'array',
        'services' => 'array',
        'investment_areas' => 'array',
    ];

    public static function defaults(): array
    {
        return [
            'hero_images' => [
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=2560&q=90',
            ],
            'services_heading' => 'خدماتنا في الاستثمار العقاري',
            'services' => [
                ['title' => 'تحليل السوق', 'description' => 'دراسات شاملة لتحليل اتجاهات السوق وتحديد أفضل الفرص الاستثمارية', 'icon' => '📈'],
                ['title' => 'إدارة المحافظ', 'description' => 'إدارة احترافية لمحافظك العقارية لتحقيق أعلى عوائد الاستثمار', 'icon' => '🏘️'],
                ['title' => 'تمويل الاستثمار', 'description' => 'حلول تمويلية مبتكرة لدعم مشاريعك الاستثمارية العقارية', 'icon' => '💰'],
                ['title' => 'دراسات الجدوى', 'description' => 'إعداد دراسات جدوى اقتصادية وفنية دقيقة للمشاريع الاستثمارية', 'icon' => '🔍'],
                ['title' => 'استثمار دولي', 'description' => 'فرص استثمارية في أسواق عقارية عالمية واعدة ومربحة', 'icon' => '🌍'],
                ['title' => 'تقارير دورية', 'description' => 'تقارير دورية شاملة عن أداء استثماراتك وتطورات السوق', 'icon' => '📊'],
            ],
            'areas_heading' => 'مجالات الاستثمار العقاري',
            'investment_areas' => [
                ['title' => 'العقارات التجارية', 'description' => 'فرص في الأبراج والمكاتب والمساحات التجارية ضمن مواقع حيوية.', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'مبانٍ تجارية في مركز المدينة', 'badge1' => 'تجاري', 'badge2' => 'تحليل السوق'],
                ['title' => 'المجمعات السكنية', 'description' => 'دراسة فرص المجمعات والوحدات السكنية لتناسب أهداف المحفظة.', 'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'مجمع سكني حديث', 'badge1' => 'سكني', 'badge2' => 'إدارة الأصول'],
                ['title' => 'العقارات السكنية', 'description' => 'تقييم الوحدات السكنية ومقارنتها وفق الموقع والقيمة والطلب.', 'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'منزل معروض للبيع كفرصة عقارية', 'badge1' => 'وحدات', 'badge2' => 'دراسة جدوى'],
                ['title' => 'العقارات الفندقية', 'description' => 'استكشاف الأصول الفندقية والسياحية ودراسة ملاءمتها للاستثمار.', 'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'فيلا ضمن سوق العقارات الفاخرة', 'badge1' => 'ضيافة', 'badge2' => 'فرص متنوعة'],
                ['title' => 'الأصول متعددة الاستخدام', 'description' => 'تحليل الأصول التي تجمع بين الاستخدامات السكنية والتجارية والخدمية.', 'image' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'مساحة داخلية حديثة قابلة للاستثمار', 'badge1' => 'متعدد الاستخدام', 'badge2' => 'تنويع'],
                ['title' => 'الفرص العقارية الدولية', 'description' => 'دراسة أسواق عقارية متنوعة ومقارنة الفرص وفق معايير واضحة.', 'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'عقار حديث ضمن فرص الاستثمار', 'badge1' => 'دولي', 'badge2' => 'تحليل ومقارنة'],
            ],
        ];
    }

    public static function currentContent(): array
    {
        return self::resolveImages(self::rawContent());
    }

    public static function rawContent(): array
    {
        $defaults = self::defaults();
        $record = self::query()->first();

        if (!$record) {
            return $defaults;
        }

        $content = array_replace($defaults, $record->only(array_keys($defaults)));
        $content['hero_images'] = array_replace($defaults['hero_images'], $content['hero_images'] ?? []);
        $content['services'] = array_replace($defaults['services'], $content['services'] ?? []);
        $content['investment_areas'] = array_replace($defaults['investment_areas'], $content['investment_areas'] ?? []);

        return $content;
    }

    public static function saveContent(array $content): self
    {
        $record = self::query()->first() ?? new self();
        $record->fill($content);
        $record->save();

        return $record;
    }

    private static function resolveImages(array $content): array
    {
        $url = static function (?string $image): string {
            if (!$image || preg_match('/^https?:\/\//i', $image) || str_starts_with($image, '/')) {
                return (string) $image;
            }

            return asset('storage/' . ltrim($image, '/'));
        };

        foreach ($content['hero_images'] as $index => $image) {
            $content['hero_images'][$index] = $url($image);
        }
        foreach ($content['investment_areas'] as $index => $area) {
            $content['investment_areas'][$index]['image'] = $url($area['image'] ?? '');
        }

        return $content;
    }
}
