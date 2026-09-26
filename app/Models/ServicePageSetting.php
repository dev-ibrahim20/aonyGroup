<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePageSetting extends Model
{
    protected $table = 'service_page_settings';

    protected $fillable = ['slug', 'content'];

    protected $casts = ['content' => 'array'];

    public static function labels(): array
    {
        return [
            'real-estate-development' => 'التطوير العقاري',
            'construction' => 'المقاولات',
            'real-estate-marketing' => 'التسويق العقاري',
            'engineering-consultancy' => 'الاستشارات الهندسية',
        ];
    }

    public static function defaults(string $slug): array
    {
        $slides = [
            'development' => [
                'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=2560&q=90',
            ],
            'construction' => [
                'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1590059403664-5ba9c9b83c0e?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=2560&q=90',
            ],
            'marketing' => [
                'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2560&q=90',
            ],
            'engineering' => [
                'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2560&q=90',
                'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2560&q=90',
            ],
        ];

        $pages = [
            'real-estate-development' => [
                'title' => 'التطوير العقاري',
                'hero_images' => $slides['development'],
                'vision' => 'تطوير وجهات ومشاريع عقارية تضيف قيمة مستدامة للمجتمعات.',
                'mission' => 'تحويل الأفكار والأراضي إلى مشاريع متكاملة مدروسة من التخطيط إلى التسليم.',
                'values' => 'الجودة، الابتكار، والتخطيط المسؤول في كل مرحلة من مراحل التطوير.',
                'services_heading' => 'خدماتنا في التطوير العقاري',
                'cta_text' => 'هل تملك أرضاً وتريد تطويرها؟',
                'cta_button' => 'استشرنا الآن',
                'services' => [
                    ['title' => 'المشاريع السكنية', 'description' => 'تطوير مجمعات سكنية فاخرة تلبي احتياجات جميع الأسر', 'icon' => 'buildings'],
                    ['title' => 'المشاريع التجارية', 'description' => 'بناء مجمعات تجارية ومكاتب إدارية بتصاميم عصرية', 'icon' => 'building'],
                    ['title' => 'الفنادق والمنتجعات', 'description' => 'تطوير فنادق ومنتجعات سياحية بمواصفات عالمية', 'icon' => 'hotel'],
                    ['title' => 'التجمعات العمرانية', 'description' => 'تخطيط وتنفيذ تجمعات عمرانية متكاملة بمرافق متعددة', 'icon' => 'city'],
                    ['title' => 'التصميم المعماري', 'description' => 'تصاميم معمارية مبتكرة تجمع بين الجمال والوظيفة', 'icon' => 'layers'],
                    ['title' => 'إدارة المشاريع', 'description' => 'إدارة شاملة لمشاريع التطوير من التخطيط حتى التسليم', 'icon' => 'tools'],
                ],
                'process_title' => 'مراحل التطوير العقاري',
                'steps' => ['دراسة الموقع والفرصة التطويرية', 'إعداد التصور ودراسة الجدوى', 'التخطيط والتصميم والتراخيص', 'تنفيذ الأعمال وإدارة الجودة', 'التسليم والتشغيل والمتابعة'],
                'projects_title' => 'أنواع المشاريع التي نطورها',
                'projects' => [
                    ['title' => 'المشاريع السكنية', 'description' => 'مجتمعات سكنية مخططة بعناية تجمع بين جودة الحياة وتكامل الخدمات.', 'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=85', 'alt' => 'مجمع سكني حديث', 'badge1' => 'سكني', 'badge2' => 'مجتمعات متكاملة'],
                    ['title' => 'المشاريع التجارية', 'description' => 'مراكز أعمال ومساحات تجارية مصممة لتلبية احتياجات الأنشطة المختلفة.', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85', 'alt' => 'مبنى تجاري وإداري حديث', 'badge1' => 'تجاري', 'badge2' => 'أعمال'],
                    ['title' => 'الضيافة والوجهات', 'description' => 'مشاريع ضيافة وترفيه ترتقي بتجربة الزوار وتستفيد من إمكانات الموقع.', 'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=900&q=85', 'alt' => 'فيلا عصرية ضمن تطوير عقاري', 'badge1' => 'ضيافة', 'badge2' => 'وجهات'],
                ],
                'highlights_heading' => 'مبادئ التطوير لدينا',
                'highlights' => [
                    ['text' => 'نبدأ بفهم الموقع واحتياجات المجتمع والسوق قبل اعتماد أي تصور تطويري.', 'title' => 'تخطيط مدروس', 'subtitle' => 'رؤية تبدأ من احتياج حقيقي'],
                    ['text' => 'تنسيق التصميم والبنية التحتية والخدمات لتقديم مشروع متكامل ومتناسق.', 'title' => 'تكامل التخصصات', 'subtitle' => 'تصميم وتنفيذ مترابط'],
                    ['text' => 'متابعة الجودة والتقدم في مراحل المشروع لضمان الالتزام بالمخطط والمعايير.', 'title' => 'جودة مستمرة', 'subtitle' => 'من التخطيط حتى التسليم'],
                ],
            ],
            'real-estate-marketing' => [
                'title' => 'التسويق العقاري',
                'hero_images' => $slides['marketing'],
                'vision' => 'أن نكون الخيار الموثوق لتسويق العقارات والوصول بها إلى جمهورها المناسب.',
                'mission' => 'نقدم استراتيجيات تسويقية مدروسة تعزز ظهور العقار وتدعم فرص بيعه أو تأجيره.',
                'values' => 'الاحترافية، الشفافية، وفهم احتياجات المالك والسوق في كل حملة تسويقية.',
                'services_heading' => 'خدماتنا في التسويق العقاري',
                'cta_text' => 'هل تريد بيع أو تأجير عقارك؟',
                'cta_button' => 'أدرجه معنا الآن',
                'services' => [
                    ['title' => 'بيع العقارات', 'description' => 'خدمات بيع احترافية مع تسعير سوقي دقيق وتسريع العملية', 'icon' => 'home'],
                    ['title' => 'تأجير العقارات', 'description' => 'إدارة وتأجير العقارات مع اختيار المستأجرين المناسبين', 'icon' => 'key'],
                    ['title' => 'التسويق الرقمي', 'description' => 'حملات تسويقية رقمية للوصول لأكبر شريحة من العملاء', 'icon' => 'mobile'],
                    ['title' => 'الاستهداف الدقيق', 'description' => 'تحديد الجمهور المستهدف بدقة لزيادة معدل التحويل', 'icon' => 'target'],
                    ['title' => 'التصوير الاحترافي', 'description' => 'تصوير عقاري احترافي مع فيديوهات وجولات افتراضية', 'icon' => 'camera'],
                    ['title' => 'تقارير الأداء', 'description' => 'تقارير دورية عن أداء الحملات التسويقية والنتائج', 'icon' => 'chart'],
                ],
                'process_title' => 'خطوات التسويق العقاري',
                'steps' => ['فهم العقار وتحديد أهداف المالك', 'تحليل السوق والجمهور المستهدف', 'إعداد المحتوى والتصوير الاحترافي', 'إطلاق الحملة عبر القنوات المناسبة', 'متابعة الاستفسارات وقياس النتائج'],
                'projects_title' => 'حلولنا التسويقية',
                'projects' => [
                    ['title' => 'تسويق العقارات السكنية', 'description' => 'عرض مميز للوحدات السكنية مع إبراز المزايا والموقع والخدمات المحيطة.', 'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=900&q=85', 'alt' => 'عقار سكني معروض للبيع', 'badge1' => 'سكني', 'badge2' => 'بيع وتأجير'],
                    ['title' => 'تسويق العقارات التجارية', 'description' => 'حملات موجهة للمكاتب والمحلات والمساحات التجارية بما يناسب طبيعة النشاط.', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85', 'alt' => 'مبنى أعمال ضمن محفظة عقارات تجارية', 'badge1' => 'تجاري', 'badge2' => 'استهداف متخصص'],
                    ['title' => 'تسويق المشاريع والمجمعات', 'description' => 'خطة إطلاق متكاملة للمشاريع العقارية من بناء الهوية إلى متابعة العملاء المحتملين.', 'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=85', 'alt' => 'مجمع سكني حديث للتسويق', 'badge1' => 'مشاريع', 'badge2' => 'حملات متكاملة'],
                ],
                'highlights_heading' => 'مرتكزات حملتنا التسويقية',
                'highlights' => [
                    ['text' => 'رسالة واضحة ومحتوى يبرز القيمة الحقيقية للعقار ويجيب عن أسئلة العملاء.', 'title' => 'محتوى احترافي', 'subtitle' => 'عرض جذاب وشفاف'],
                    ['text' => 'اختيار القنوات والجمهور وفق نوع العقار وموقعه وأهداف الحملة.', 'title' => 'استهداف مدروس', 'subtitle' => 'وصول إلى العملاء المناسبين'],
                    ['text' => 'مراجعة أداء الحملات والاستفادة من البيانات لتحسين الوصول وجودة الاستفسارات.', 'title' => 'قياس وتحسين', 'subtitle' => 'تقارير ومتابعة مستمرة'],
                ],
            ],
            'engineering-consultancy' => [
                'title' => 'مكتب الاستشارات الهندسية',
                'hero_images' => $slides['engineering'],
                'vision' => 'أن تكون استشاراتنا أساسًا لمشاريع آمنة، عملية، وجميلة التصميم.',
                'mission' => 'تقديم حلول هندسية متكاملة تستند إلى دراسة دقيقة وتنسيق بين التخصصات.',
                'values' => 'الدقة، السلامة، والالتزام بالمعايير في كل مخطط وقرار هندسي.',
                'services_heading' => 'خدماتنا الهندسية',
                'cta_text' => 'هل تحتاج استشارة هندسية لمشروعك؟',
                'cta_button' => 'احجز استشارة',
                'services' => [
                    ['title' => 'التصميم المعماري', 'description' => 'تصاميم معمارية مبتكرة تلبي احتياجاتك وتتجاوز توقعاتك', 'icon' => 'ruler'],
                    ['title' => 'التصميم الإنشائي', 'description' => 'تصاميم إنشائية آمنة ومستقرة بمواصفات عالمية', 'icon' => 'building'],
                    ['title' => 'التصميم الكهربائي', 'description' => 'تصاميم كهربائية حديثة مع أنظمة ذكية وفعالة', 'icon' => 'bolt'],
                    ['title' => 'التصميم الميكانيكي', 'description' => 'تصاميم ميكانيكية شاملة للتهوية والتكييف والسباكة', 'icon' => 'drop'],
                    ['title' => 'دراسات الجدوى', 'description' => 'دراسات جدوى فنية واقتصادية شاملة للمشاريع', 'icon' => 'chart'],
                    ['title' => 'الإشراف الهندسي', 'description' => 'إشراف هندسي شامل على جميع مراحل التنفيذ', 'icon' => 'search'],
                ],
                'process_title' => 'مراحل الاستشارة الهندسية',
                'steps' => ['فهم متطلبات المشروع واحتياجاته', 'رفع البيانات ودراسة الموقع', 'إعداد الحلول والمخططات الهندسية', 'مراجعة التخصصات واعتماد المستندات', 'الإشراف والمتابعة حسب نطاق العمل'],
                'projects_title' => 'التخصصات الهندسية',
                'projects' => [
                    ['title' => 'التصميم المعماري', 'description' => 'تخطيط المساحات والواجهات بما يوازن بين الوظيفة والجمال واحتياجات المستخدم.', 'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=900&q=85', 'alt' => 'مخططات وتصميم معماري لمشروع', 'badge1' => 'معماري', 'badge2' => 'تصميم'],
                    ['title' => 'التصميم الإنشائي', 'description' => 'حلول إنشائية تراعي سلامة المبنى ومتطلبات الاستخدام والاشتراطات الفنية.', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85', 'alt' => 'مبنى حديث للتصميم الإنشائي', 'badge1' => 'إنشائي', 'badge2' => 'سلامة'],
                    ['title' => 'أنظمة المباني والإشراف', 'description' => 'تنسيق الأنظمة الكهربائية والميكانيكية ودعم التنفيذ من خلال المتابعة الهندسية.', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=85', 'alt' => 'مساحة عمل وتجهيزات هندسية داخلية', 'badge1' => 'كهرباء وميكانيكا', 'badge2' => 'إشراف'],
                ],
                'highlights_heading' => 'معاييرنا الهندسية',
                'highlights' => [
                    ['text' => 'تنسيق متكامل بين المعماري والإنشائي والكهربائي والميكانيكي لتقليل التعارضات.', 'title' => 'تكامل التخصصات', 'subtitle' => 'مخططات مترابطة وواضحة'],
                    ['text' => 'مراجعة فنية دقيقة تراعي اشتراطات السلامة والمتطلبات والأنظمة ذات الصلة.', 'title' => 'السلامة والامتثال', 'subtitle' => 'اعتبارات أساسية في التصميم'],
                    ['text' => 'اختيار حلول عملية قابلة للتنفيذ وتخدم الاستخدام الفعلي للمبنى.', 'title' => 'حلول قابلة للتنفيذ', 'subtitle' => 'كفاءة في التصميم والتشغيل'],
                ],
            ],
            'construction' => [
                'title' => 'المقاولات',
                'hero_images' => $slides['construction'],
                'vision' => 'أن نكون الشريك الأول في مشاريع البناء والتشييد من خلال تقديم خدمات مقاولات استثنائية.',
                'mission' => 'ننفذ مشاريع البناء بأعلى جودة وكفاءة مع الالتزام بالمواعيد والمعايير العالمية.',
                'values' => 'الجودة، الدقة، الأمانة، والالتزام بمواصفات التسليم المتفق عليها.',
                'services_heading' => 'خدماتنا في المقاولات',
                'cta_text' => 'هل لديك مشروع بناء؟',
                'cta_button' => 'اطلب عرض سعر',
                'services' => [
                    ['title' => 'البناء العام', 'description' => 'تنفيذ جميع أعمال البناء من الأساسات حتى التشطيبات', 'icon' => 'buildings'],
                    ['title' => 'المباني التجارية', 'description' => 'بناء المباني التجارية والمكاتب بمعايير احترافية', 'icon' => 'building'],
                    ['title' => 'البناء السكني', 'description' => 'تنفيذ المشاريع السكنية الفاخرة والفيلا', 'icon' => 'home'],
                    ['title' => 'الترميم والصيانة', 'description' => 'أعمال الترميم والصيانة للمباني القائمة', 'icon' => 'tools'],
                    ['title' => 'الأعمال التأسيسية', 'description' => 'تنفيذ الأعمال التأسيسية والبنية التحتية', 'icon' => 'layers'],
                    ['title' => 'مراقبة الجودة', 'description' => 'نظام متكامل لمراقبة الجودة في جميع مراحل التنفيذ', 'icon' => 'check'],
                ],
                'process_title' => 'خطوات العمل',
                'steps' => ['الاستشارة والتخطيط', 'التصميم والهندسة', 'الحصول على التراخيص', 'التنفيذ والبناء', 'التسليم والضمان'],
                'projects_title' => 'مشاريعنا السابقة',
                'projects' => [
                    ['title' => 'برج الأعمال التجاري', 'description' => 'مبنى تجاري متعدد الطوابق بمساحة 5000 متر مربع، يضم مكاتب ومحلات تجارية', 'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع بناء تجاري', 'badge1' => 'تجاري', 'badge2' => '5000 م²'],
                    ['title' => 'المجمع السكني الفاخر', 'description' => 'مجمع سكني فاخر يضم 20 فيلا بتصاميم عصرية ومرافق متكاملة', 'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع سكني فاخر', 'badge1' => 'سكني', 'badge2' => '20 فيلا'],
                    ['title' => 'المصنع الصناعي', 'description' => 'مصنع متطور بمساحة 3000 متر مربع بمعايير الصناعة الحديثة', 'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع بناء صناعي', 'badge1' => 'صناعي', 'badge2' => '3000 م²'],
                    ['title' => 'مركز التسوق', 'description' => 'مركز تسوق عصري يضم 100 محل تجاري ومنطقة ترفيهية للعائلات', 'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع مركز تجاري', 'badge1' => 'تجاري', 'badge2' => '100 محل'],
                    ['title' => 'فندق الضيافة', 'description' => 'فندق 5 نجوم ب150 غرفة مع مرافق سبا ومطاعم ومؤتمرات', 'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع فندق فاخر', 'badge1' => 'فندقي', 'badge2' => '150 غرفة'],
                    ['title' => 'المبنى الإداري', 'description' => 'مبنى إداري حديث بمساحة 2000 متر مربع للشركات والمؤسسات', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80', 'alt' => 'مشروع مبنى إداري', 'badge1' => 'إداري', 'badge2' => '2000 م²'],
                ],
                'highlights_heading' => 'آراء عملائنا',
                'highlights' => [
                    ['text' => 'تجربة رائعة مع شركة العوني العقارية. نفذوا مشروع بناء فيلتي بجودة عالية وفي الوقت المحدد. أنصح الجميع بالتعامل معهم.', 'title' => 'أحمد محمد', 'subtitle' => 'صاحب مشروع سكني', 'rating' => 5],
                    ['text' => 'أفضل شركة مقاولات تعاملت معها. الاحترافية والدقة في العمل كانت مذهلة. المشروع سُلم بجودة تفوق التوقعات.', 'title' => 'سارة أحمد', 'subtitle' => 'مديرة شركة تجارية', 'rating' => 5],
                    ['text' => 'شركة رائعة في التنفيذ والمتابعة. الفريق محترف وملتزم بالمواعيد. سأتعامل معهم في جميع مشاريعي القادمة.', 'title' => 'خالد عبدالله', 'subtitle' => 'مستثمر عقاري', 'rating' => 5],
                    ['text' => 'الجودة في التنفيذ واضحة في كل تفاصيل المشروع. الشركة تستحق كل الثقة والتقدير على عملهم المتميز.', 'title' => 'فاطمة علي', 'subtitle' => 'صاحبة مشروع تجاري', 'rating' => 5],
                    ['text' => 'التزامهم بالمواعيد والجودة كان مذهلاً. المشروع سُلم بحالة مثالية وأنا سعيد جداً بالنتيجة.', 'title' => 'محمد سعيد', 'subtitle' => 'رائد أعمال', 'rating' => 5],
                    ['text' => 'احترافية عالية في جميع مراحل العمل. من التصميم إلى التنفيذ إلى التسليم، كل شيء كان مثالياً.', 'title' => 'نورة الحربي', 'subtitle' => 'مالكة فيلا فاخرة', 'rating' => 5],
                ],
            ],
        ];

        abort_unless(isset($pages[$slug]), 404);

        return $pages[$slug];
    }

    public static function content(string $slug): array
    {
        $defaults = self::defaults($slug);
        $record = self::query()->where('slug', $slug)->first();
        $content = $record && is_array($record->content)
            ? array_replace_recursive($defaults, $record->content)
            : $defaults;

        return self::resolveImages($content);
    }

    public static function rawContent(string $slug): array
    {
        $defaults = self::defaults($slug);
        $record = self::query()->where('slug', $slug)->first();

        return $record && is_array($record->content)
            ? array_replace_recursive($defaults, $record->content)
            : $defaults;
    }

    public static function saveContent(string $slug, array $content): self
    {
        return self::query()->updateOrCreate(
            ['slug' => $slug],
            ['content' => $content]
        );
    }

    private static function resolveImages(array $content): array
    {
        $resolve = static function (?string $image): string {
            if (!$image || preg_match('/^https?:\/\//i', $image) || str_starts_with($image, '/')) {
                return (string) $image;
            }

            return asset('storage/' . ltrim($image, '/'));
        };

        foreach ($content['hero_images'] as $index => $image) {
            $content['hero_images'][$index] = $resolve($image);
        }
        foreach ($content['projects'] as $index => $project) {
            $content['projects'][$index]['image'] = $resolve($project['image'] ?? '');
        }

        return $content;
    }
}
