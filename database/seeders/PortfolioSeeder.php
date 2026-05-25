<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('portfolios')->delete();

        $portfolios = [
            [
                'title_en' => 'Cairo Financial District Tower',
                'title_ar' => 'برج الحي المالي بالقاهرة',
                'slug' => 'cairo-financial-district-tower',
                'excerpt_en' => 'A 40-story commercial tower serving as the headquarters for major financial institutions.',
                'excerpt_ar' => 'برج تجاري من 40 طابقاً يخدم كمقر للمؤسسات المالية الكبرى.',
                'description_en' => '<p>The Cairo Financial District Tower represents the pinnacle of modern commercial architecture in Egypt. This 40-story tower houses some of the country\'s most prominent financial institutions.</p><h3>Project Highlights</h3><ul><li>40 floors of premium office space</li><li>State-of-the-art security systems</li><li>Smart building technology</li><li>Underground parking for 500 vehicles</li><li>Multiple conference and meeting facilities</li></ul><h3>Design Features</h3><p>The tower features a glass façade that maximizes natural light while reducing energy consumption. The interior design focuses on creating productive work environments with flexible spaces.</p>',
                'description_ar' => '<p>يمثل برج الحي المالي بالقاهرة قمة الهندسة المعمارية التجارية الحديثة في مصر. يضم هذا البرج المكون من 40 طابقاً بعضاً من أبرز المؤسسات المالية في البلاد.</p><h3>أبرز ميزات المشروع</h3><ul><li>40 طابقاً من مساحات المكاتب المتميزة</li><li>أنظمة أمنية متطورة</li><li>تكنولوجيا المباني الذكية</li><li>موقف سيارات تحت الأرض لـ 500 مركبة</li><li>قاعات ومؤتمرات متعددة</li></ul><h3>ميزات التصميم</h3><p>يتميز البرج بواجهة زجاجية تعظم الإضاءة الطبيعية مع تقليل استهلاك الطاقة. يركز التصميم الداخلي على خلق بيئات عمل منتجة مع مساحات مرنة.</p>',
                'category' => 'Commercial',
                'client_name' => 'Egyptian Financial Group',
                'project_date' => '2023-06-15',
                'technologies' => json_encode(['Smart Glass', 'HVAC Systems', 'Security Systems', 'Building Management']),
                'project_url' => 'https://example.com/cairo-financial',
                'meta_title' => 'Cairo Financial District Tower',
                'meta_description' => 'Premium commercial tower in Cairo\'s financial district.',
                'meta_keywords' => 'commercial tower, cairo, financial district',
                'status' => 'active',
                'featured' => true,
            ],
            [
                'title_en' => 'Nile View Residential Complex',
                'title_ar' => 'مجمع النيل السكني',
                'slug' => 'nile-view-residential-complex',
                'excerpt_en' => 'A luxury residential complex offering stunning views of the Nile River.',
                'excerpt_ar' => 'مجمع سكني فاخر يوفر إطلالات خلابة على نهر النيل.',
                'description_en' => '<p>The Nile View Residential Complex offers residents unparalleled views of the Nile River combined with luxury amenities and modern design.</p><h3>Features</h3><ul><li>200 luxury apartments</li><li>Infinity pool overlooking the Nile</li><li>Private marina access</li><li>Fitness center and spa</li><li>24/7 concierge service</li></ul><h3>Location Benefits</h3><p>Situated along the Nile Corniche, residents enjoy easy access to Cairo\'s cultural attractions, restaurants, and entertainment venues.</p>',
                'description_ar' => '<p>يقدم مجمع النيل السكني للسكان إطلالات لا مثيل لها على نهر النيل مع مرافق فاخرة وتصميم عصري.</p><h3>الميزات</h3><ul><li>200 شقة فاخرة</li><li>مسبح لا نهائي يطل على النيل</li><li>وصول خاص للمارينا</li><li>مركز لياقة وسبا</li><li>خدمة كونسيرج على مدار الساعة</li></ul><h3>مزايا الموقع</h3><p>يقع على كورنيش النيل، يتمتع السكان بوصول سهل إلى المعالم الثقافية والمطاعم وأماكن الترفيه في القاهرة.</p>',
                'category' => 'Residential',
                'client_name' => 'Nile Properties',
                'project_date' => '2023-03-20',
                'technologies' => json_encode(['Smart Home', 'Solar Panels', 'Water Treatment', 'Security']),
                'project_url' => 'https://example.com/nile-view',
                'meta_title' => 'Nile View Residential Complex',
                'meta_description' => 'Luxury residential complex with Nile views.',
                'meta_keywords' => 'residential, nile view, luxury apartments',
                'status' => 'active',
                'featured' => true,
            ],
            [
                'title_en' => 'Alexandria Port Mall',
                'title_ar' => 'مول ميناء الإسكندرية',
                'slug' => 'alexandria-port-mall',
                'excerpt_en' => 'A modern shopping and entertainment destination at Alexandria\'s historic port.',
                'excerpt_ar' => 'وجهة تسوق وترفيه حديثة في ميناء الإسكندرية التاريخي.',
                'description_en' => '<p>The Alexandria Port Mall transforms the historic port area into a vibrant shopping and entertainment destination while preserving the area\'s maritime heritage.</p><h3>Project Scope</h3><ul><li>250 retail stores</li><li>Cinema complex with 12 screens</li><li>Food court with international cuisine</li><li>Family entertainment center</li><li>Parking for 1000 vehicles</li></ul><h3>Architectural Design</h3><p>The design incorporates elements of Alexandria\'s rich maritime history while creating a modern, sustainable shopping environment.</p>',
                'description_ar' => '<p>يحول مول ميناء الإسكندرية منطقة الميناء التاريخي إلى وجهة تسوق وترفيه نابضة بالحياة مع الحفاظ على التراث البحري للمنطقة.</p><h3>نطاق المشروع</h3><ul><li>250 متجر تجزئة</li><li>مجمع سينمائي بـ 12 شاشة</li><li>ساحة طعام بمأكولات عالمية</li><li>مركز ترفيه عائلي</li><li>موقف سيارات لـ 1000 مركبة</li></ul><h3>التصميم المعماري</h3><p>يدمج التصميم عناصر التاريخ البحري الغني للإسكندرية مع خلق بيئة تسوق حديثة ومستدامة.</p>',
                'category' => 'Commercial',
                'client_name' => 'Alexandria Development Authority',
                'project_date' => '2022-11-10',
                'technologies' => json_encode(['Energy Management', 'Digital Signage', 'Parking Systems', 'Security']),
                'project_url' => 'https://example.com/alex-mall',
                'meta_title' => 'Alexandria Port Mall',
                'meta_description' => 'Modern shopping mall at Alexandria port.',
                'meta_keywords' => 'mall, alexandria, shopping, entertainment',
                'status' => 'active',
                'featured' => false,
            ],
            [
                'title_en' => 'Sahara Oasis Resort',
                'title_ar' => 'منتجع واحة الصحراء',
                'slug' => 'sahara-oasis-resort',
                'excerpt_en' => 'An eco-friendly desert resort combining luxury with sustainability.',
                'excerpt_ar' => 'منتجع صحراوي صديق للبيئة يجمع بين الفخامة والاستدامة.',
                'description_en' => '<p>The Sahara Oasis Resort demonstrates how luxury and sustainability can coexist in harmony in the desert environment.</p><h3>Sustainable Features</h3><ul><li>Solar power generation</li><li>Water recycling systems</li><li>Desert landscaping with native plants</li><li>Passive cooling design</li><li>Organic farm and restaurant</li></ul><h3>Guest Experience</h3><p>Guests enjoy luxury accommodations while learning about sustainable living practices and experiencing the beauty of the desert ecosystem.</p>',
                'description_ar' => '<p>يوضح منتجع واحة الصحراء كيف يمكن للفخامة والاستدامة أن تتعايشاً بانسجام في بيئة الصحراء.</p><h3>الميزات المستدامة</h3><ul><li>توليد الطاقة الشمسية</li><li>أنظمة إعادة تدوير المياه</li><li>تنسيق الصحراء بالنباتات المحلية</li><li>تصميم تبريد سلبي</li><li>مزرعة ومطعم عضوي</li></ul><h3>تجربة الضيوف</h3><p>يتمتع الضيوف بإقامة فاخرة مع التعرف على ممارسات العيش المستدام وتجربة جمال النظام البيئي الصحراوي.</p>',
                'category' => 'Hospitality',
                'client_name' => 'Eco Tourism Egypt',
                'project_date' => '2023-08-05',
                'technologies' => json_encode(['Solar Power', 'Water Recycling', 'Smart Irrigation', 'Energy Management']),
                'project_url' => 'https://example.com/sahara-oasis',
                'meta_title' => 'Sahara Oasis Resort',
                'meta_description' => 'Eco-friendly desert resort in Egypt.',
                'meta_keywords' => 'resort, eco-friendly, desert, sustainable',
                'status' => 'active',
                'featured' => true,
            ],
            [
                'title_en' => 'Cairo Tech Hub',
                'title_ar' => 'مركز القاهرة التقني',
                'slug' => 'cairo-tech-hub',
                'excerpt_en' => 'A state-of-the-art technology park fostering innovation and startup growth.',
                'excerpt_ar' => 'حديقة تقنية حديثة تعزز الابتكار ونمو الشركات الناشئة.',
                'description_en' => '<p>The Cairo Tech Hub is designed to be Egypt\'s premier destination for technology companies and startups, providing the infrastructure and community needed for innovation.</p><h3>Facilities</h3><ul><li>Coworking spaces</li><li>Private offices for tech companies</li><li>Meeting and conference rooms</li><li>Prototype lab</li><li>Networking event spaces</li></ul><h3>Services</h3><p>The hub offers mentoring programs, investment connections, and business support services to help startups grow and succeed.</p>',
                'description_ar' => '<p>تم تصميم مركز القاهرة التقني ليكون الوجهة الأولى في مصر لشركات التكنولوجيا والشركات الناشئة، مما يوفر البنية التحتية والمجتمع اللازمين للابتكار.</p><h3>المرافق</h3><ul><li>مساحات عمل مشتركة</li><li>مكاتب خاصة لشركات التكنولوجيا</li><li>قاعات اجتماع ومؤتمرات</li><li>مختبر نموذج أولي</li><li>مساحات أحداث التواصل</li></ul><h3>الخدمات</h3><p>يقدم المركز برامج الإرشاد واتصالات الاستثمار وخدمات دعم الأعمال لمساعدة الشركات الناشئة على النمو والنجاح.</p>',
                'category' => 'Commercial',
                'client_name' => 'Egypt Innovation Fund',
                'project_date' => '2023-01-15',
                'technologies' => json_encode(['High-Speed Internet', 'Video Conferencing', 'Security', 'Building Management']),
                'project_url' => 'https://example.com/cairo-tech',
                'meta_title' => 'Cairo Tech Hub',
                'meta_description' => 'Technology park for startups in Cairo.',
                'meta_keywords' => 'tech hub, startup, innovation, cairo',
                'status' => 'active',
                'featured' => false,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
