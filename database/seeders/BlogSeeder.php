<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('blogs')->delete();

        $admin = User::where('email', 'admin@admin.com')->first();

        $blogs = [
            [
                'title_en' => 'The Future of Real Estate in Egypt: Trends to Watch in 2024',
                'title_ar' => 'مستقبل العقارات في مصر: اتجاهات يجب مراقبتها في 2024',
                'slug' => 'future-of-real-estate-egypt-2024',
                'excerpt_en' => 'Explore the emerging trends shaping Egypt\'s real estate market and what investors should expect in the coming year.',
                'excerpt_ar' => 'استكشف الاتجاهات الناشئة التي تشكل سوق العقارات في مصر وما يجب أن يتوقعه المستثمرون في العام القادم.',
                'content_en' => '<p>The Egyptian real estate market is undergoing a significant transformation. With new developments springing up across the country, investors and homebuyers alike are taking notice of the opportunities available.</p><h3>Key Trends for 2024</h3><p><strong>1. Sustainable Development:</strong> Green building practices are becoming increasingly important, with developers focusing on energy-efficient designs and eco-friendly materials.</p><p><strong>2. Smart Homes:</strong> Integration of smart home technology is becoming standard in new developments, offering residents convenience and security.</p><p><strong>3. Mixed-Use Communities:</strong> Projects that combine residential, commercial, and recreational spaces are gaining popularity, offering residents a complete lifestyle experience.</p><p><strong>4. Affordable Housing:</strong> There\'s a growing focus on developing affordable housing options to meet the needs of middle-income families.</p><h3>Investment Opportunities</h3><p>For investors looking to capitalize on these trends, areas like New Cairo, the North Coast, and 6th of October City continue to show strong potential for growth.</p>',
                'content_ar' => '<p>سوق العقارات المصري يمر بتحول كبير. مع المشاريع الجديدة التي تنتشر في جميع أنحاء البلاد، بدأ المستثمرون والمشترون في الانتباه للفرص المتاحة.</p><h3>الاتجاهات الرئيسية لعام 2024</h3><p><strong>1. التنمية المستدامة:</strong> أصبحت ممارسات البناء الأخضر ذات أهمية متزايدة، مع تركيز المطورين على التصاميم الموفرة للطاقة والمواد الصديقة للبيئة.</p><p><strong>2. المنازل الذكية:</strong> أصبح دمج تكنولوجيا المنازل الذكية معياراً في المشاريع الجديدة، مما يوفر للسكان الراحة والأمان.</p><p><strong>3. المجتمعات متعددة الاستخدامات:</strong> المشاريع التي تجمع بين الاستخدامات السكنية والتجارية والترفيهية تكتسب شعبية، مما يوفر للسكان نمط حياة متكامل.</p><p><strong>4. الإسكان الميسور:</strong> هناك تركيز متزايد على تطوير خيارات الإسكان الميسور لتلبية احتياجات الأسر متوسطة الدخل.</p><h3>فرص الاستثمار</h3><p>للمستثمرين الذين يتطلعون إلى الاستفادة من هذه الاتجاهات، تظل مناطق مثل القاهرة الجديدة والساحل الشمالي ومدينة 6 أكتوبر تظهر إمكانات قوية للنمو.</p>',
                'meta_title' => 'The Future of Real Estate in Egypt 2024',
                'meta_description' => 'Discover the top real estate trends in Egypt for 2024 and investment opportunities.',
                'meta_keywords' => 'real estate egypt, property investment, egypt market 2024',
                'status' => 'published',
                'featured' => true,
                'published_at' => now(),
                'author_id' => $admin ? $admin->id : null,
            ],
            [
                'title_en' => '5 Tips for First-Time Homebuyers in Egypt',
                'title_ar' => '5 نصائح للمشترين لأول مرة في مصر',
                'slug' => 'tips-for-first-time-homebuyers-egypt',
                'excerpt_en' => 'Essential advice for anyone looking to buy their first home in Egypt, from financing to location selection.',
                'excerpt_ar' => 'نصائح أساسية لأي شخص يتطلع إلى شراء منزله الأول في مصر، من التمويل إلى اختيار الموقع.',
                'content_en' => '<p>Buying your first home is an exciting milestone, but it can also be overwhelming. Here are five essential tips to help you navigate the process in Egypt.</p><h3>1. Determine Your Budget</h3><p>Before you start looking at properties, get pre-approved for a mortgage and determine exactly how much you can afford. Consider all costs, including maintenance fees and utilities.</p><h3>2. Research Locations</h3><p>Egypt offers diverse neighborhoods, from bustling downtown areas to quiet suburban communities. Consider factors like proximity to work, schools, and amenities.</p><h3>3. Work with Reputable Developers</h3><p>Choose established developers with a track record of delivering quality projects on time. Research their previous developments and customer reviews.</p><h3>4. Understand the Legal Process</h3><p>Familiarize yourself with Egypt\'s property laws and registration process. Work with a reputable lawyer to ensure all documentation is correct.</p><h3>5. Plan for the Future</h3><p>Consider your long-term plans. Is this property a good investment? Will it meet your needs as your family grows?</p>',
                'content_ar' => '<p>شراء منزلك الأول هو معلم مثير، لكنه قد يكون أيضاً مرهقاً. إليك خمس نصائح أساسية لمساعدتك في التنقل في العملية في مصر.</p><h3>1. حدد ميزانيتك</h3><p>قبل البدء في البحث عن العقارات، احصل على موافقة مسبقة للرهن العقاري وحدد بالضبط المبلغ الذي يمكنك تحمله. ضع في اعتبارك جميع التكاليف، بما في ذلك رسوم الصيانة والمرافق.</p><h3>2. ابحث عن المواقع</h3><p>تقدم مصر أحياء متنوعة، من مناطق وسط المدينة الصاخبة إلى مجتمعات الضواحي الهادئة. ضع في اعتبارك عوامل مثل القرب من العمل والمدارس والمرافق.</p><h3>3. اعمل مع مطورين موثوقين</h3><p>اختر مطورين راسخين لديهم سجل في تسليم مشاريع عالية الجودة في الوقت المحدد. ابحث عن تطوراتهم السابقة ومراجعات العملاء.</p><h3>4. افهم العملية القانونية</h3><p>تعرف على قوانين الملكية في مصر وعملية التسجيل. اعمل مع محامٍ موثوق لضمان صحة جميع الوثائق.</p><h3>5. خطط للمستقبل</h3><p>ضع في اعتبارك خططك طويلة المدى. هل هذه العقارة استثمار جيد؟ هل ستلبي احتياجاتك مع نمو عائلتك؟</p>',
                'meta_title' => '5 Tips for First-Time Homebuyers in Egypt',
                'meta_description' => 'Essential tips for buying your first home in Egypt.',
                'meta_keywords' => 'home buying tips, egypt real estate, first home',
                'status' => 'published',
                'featured' => false,
                'published_at' => now()->subDays(7),
                'author_id' => $admin ? $admin->id : null,
            ],
            [
                'title_en' => 'Why New Cairo is the Perfect Place to Call Home',
                'title_ar' => 'لماذا القاهرة الجديدة هي المكان المثالي للإقامة',
                'slug' => 'why-new-cairo-perfect-place-home',
                'excerpt_en' => 'Discover the advantages of living in New Cairo, from modern infrastructure to excellent amenities.',
                'excerpt_ar' => 'اكتشف مزايا العيش في القاهرة الجديدة، من البنية التحتية الحديثة إلى المرافق الممتازة.',
                'content_en' => '<p>New Cairo has emerged as one of Egypt\'s most desirable residential areas, offering a perfect blend of modern living and traditional Egyptian hospitality.</p><h3>Modern Infrastructure</h3><p>The area features wide roads, modern utilities, and well-planned neighborhoods that make daily life convenient and comfortable.</p><h3>Excellent Educational Institutions</h3><p>New Cairo is home to some of Egypt\'s best international schools and universities, making it ideal for families with children.</p><h3>Shopping and Entertainment</h3><p>From luxury malls to local markets, residents have access to a wide range of shopping and entertainment options.</p><h3>Green Spaces</h3><p>Despite being a modern development, New Cairo maintains plenty of parks and green spaces for residents to enjoy.</p><h3>Investment Potential</h3><p>Property values in New Cairo have shown consistent growth, making it an excellent investment opportunity.</p>',
                'content_ar' => '<p>برزت القاهرة الجديدة كواحدة من أكثر المناطق السكنية المرغوبة في مصر، وتقدم مزيجاً مثالياً من الحياة العصرية والضيافة المصرية التقليدية.</p><h3>البنية التحتية الحديثة</h3><p>تتميز المنطقة بطرق واسعة ومرافق حديثة وأحياء مخططة بعناية تجعل الحياة اليومية مريحة ومريحة.</p><h3>مؤسسات تعليمية ممتازة</h3><p>تضم القاهرة الجديدة بعض أفضل المدارس والجامعات الدولية في مصر، مما يجعلها مثالية للأسر التي لديها أطفال.</p><h3>التسوق والترفيه</h3><p>من مراكز التسوق الفاخرة إلى الأسواق المحلية، يتمتع السكان بالوصول إلى مجموعة واسعة من خيارات التسوق والترفيه.</p><h3>المساحات الخضراء</h3><p>رغم أنها تطوير حديث، تحافظ القاهرة الجديدة على الكثير من الحدائق والمساحات الخضراء للاستمتاع بها السكان.</p><h3>إمكانات الاستثمار</h3><p>أظهرت قيم العقارات في القاهرة الجديدة نمواً ثابتاً، مما يجعلها فرصة استثمارية ممتازة.</p>',
                'meta_title' => 'Why New Cairo is Perfect for Living',
                'meta_description' => 'Learn why New Cairo is one of Egypt\'s best residential areas.',
                'meta_keywords' => 'new cairo, living in egypt, residential areas',
                'status' => 'published',
                'featured' => true,
                'published_at' => now()->subDays(14),
                'author_id' => $admin ? $admin->id : null,
            ],
            [
                'title_en' => 'Understanding Property Types in Egypt: Apartments vs Villas',
                'title_ar' => 'فهم أنواع العقارات في مصر: الشقق مقابل الفلل',
                'slug' => 'understanding-property-types-egypt-apartments-villas',
                'excerpt_en' => 'A comprehensive guide to help you choose between apartments and villas in Egypt.',
                'excerpt_ar' => 'دليل شامل لمساعدتك في الاختيار بين الشقق والفلل في مصر.',
                'content_en' => '<p>When searching for property in Egypt, one of the biggest decisions you\'ll face is choosing between an apartment and a villa. Both options have their advantages.</p><h3>Apartment Living</h3><p><strong>Pros:</strong></p><ul><li>Lower maintenance costs</li><li>Better security in many buildings</li><li>Often located in central areas</li><li>More affordable entry price</li></ul><p><strong>Cons:</strong></p><ul><li>Limited outdoor space</li><li>Less privacy</li><li>Building rules and restrictions</li></ul><h3>Villa Living</h3><p><strong>Pros:</strong></p><ul><li>More space and privacy</li><li>Private garden and outdoor areas</li><li>Freedom to modify</li><li>Better for families</li></ul><p><strong>Cons:</strong></p><ul><li>Higher maintenance costs</li><li>Higher purchase price</li><li>Often located further from city center</li></ul><h3>Making Your Decision</h3><p>Consider your lifestyle, budget, and long-term plans when making this important decision.</p>',
                'content_ar' => '<p>عند البحث عن عقار في مصر، أحد أكبر القرارات التي ستواجهها هو الاختيار بين شقة وفيلا. كلا الخيارين لهما مزاياهما.</p><h3>العيش في الشقة</h3><p><strong>المزايا:</strong></p><ul><li>تكاليف صيانة أقل</li><li>أمان أفضل في العديد من المباني</li><li>غالباً تقع في مناطق مركزية</li><li>سعر دخول أكثر بأسعار معقولة</li></ul><p><strong>العيوب:</strong></p><ul><li>مساحة خارجية محدودة</li><li>خصوصية أقل</li><li>قواعد وقيود المبنى</li></ul><h3>العيش في الفيلا</h3><p><strong>المزايا:</strong></p><ul><li>مساحة أكبر وخصوصية</li><li>حديقة خاصة ومناطق خارجية</li><li>حرية التعديل</li><li>أفضل للعائلات</li></ul><p><strong>العيوب:</strong></p><ul><li>تكاليف صيانة أعلى</li><li>سعر شراء أعلى</li><li>غالباً تقع أبعد من وسط المدينة</li></ul><h3>اتخاذ قرارك</h3><p>ضع في اعتبارك نمط حياتك وميزانيتك وخططك طويلة المدى عند اتخاذ هذا القرار المهم.</p>',
                'meta_title' => 'Apartments vs Villas in Egypt',
                'meta_description' => 'Compare apartments and villas to find the right property type for you.',
                'meta_keywords' => 'apartments, villas, egypt property, property types',
                'status' => 'published',
                'featured' => false,
                'published_at' => now()->subDays(21),
                'author_id' => $admin ? $admin->id : null,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
