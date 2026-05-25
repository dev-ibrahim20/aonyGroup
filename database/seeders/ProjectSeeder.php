<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->delete();

        $projects = [
            [
                'title_en' => 'Luxury Tower Cairo',
                'title_ar' => 'برج الفاخرة القاهرة',
                'slug' => 'luxury-tower-cairo',
                'description_en' => 'A prestigious residential tower located in the heart of Cairo, featuring modern architecture and premium amenities.',
                'description_ar' => 'برج سكني فاخر يقع في قلب القاهرة، يتميز بتصميم عصري ومرافق راقية.',
                'location' => 'New Cairo, Egypt',
                'status' => 'available',
                'featured' => true,
                'meta_title' => 'Luxury Tower Cairo - Premium Real Estate',
                'meta_description' => 'Discover luxury living in Cairo with our premium residential tower.',
            ],
            [
                'title_en' => 'Alexandria Coastal Resort',
                'title_ar' => 'منتجع الإسكندرية الساحلي',
                'slug' => 'alexandria-coastal-resort',
                'description_en' => 'A stunning beachfront resort offering breathtaking views of the Mediterranean Sea and world-class facilities.',
                'description_ar' => 'منتجع رائع على شاطئ البحر يوفر إطلالات خلابة على البحر المتوسط ومرافق عالمية.',
                'location' => 'Alexandria, Egypt',
                'status' => 'available',
                'featured' => true,
                'meta_title' => 'Alexandria Coastal Resort - Beachfront Living',
                'meta_description' => 'Experience beachfront luxury at our Alexandria resort.',
            ],
            [
                'title_en' => 'Garden City Villas',
                'title_ar' => 'فللات مدينة الحدائق',
                'slug' => 'garden-city-villas',
                'description_en' => 'Exclusive villas surrounded by lush gardens and green spaces, perfect for families seeking tranquility.',
                'description_ar' => 'فللات حصرية محاطة بحدائق غنّاء ومساحات خضراء، مثالية للعائلات التي تبحث عن الهدوء.',
                'location' => 'New Cairo, Egypt',
                'status' => 'available',
                'featured' => false,
                'meta_title' => 'Garden City Villas - Family Living',
                'meta_description' => 'Find your dream villa in our peaceful garden community.',
            ],
            [
                'title_en' => 'Downtown Business Center',
                'title_ar' => 'مركز الأعمال وسط المدينة',
                'slug' => 'downtown-business-center',
                'description_en' => 'A state-of-the-art commercial complex designed for modern businesses with premium office spaces.',
                'description_ar' => 'مجمع تجاري حديث مصمم للشركات الحديثة مع مساحات مكتبية راقية.',
                'location' => 'Cairo Downtown, Egypt',
                'status' => 'available',
                'featured' => false,
                'meta_title' => 'Downtown Business Center - Commercial Spaces',
                'meta_description' => 'Premium office spaces in the heart of Cairo.',
            ],
            [
                'title_en' => 'Marina Bay Apartments',
                'title_ar' => 'شقق خليج مارينا',
                'slug' => 'marina-bay-apartments',
                'description_en' => 'Modern apartments with stunning marina views, perfect for those seeking a luxurious waterfront lifestyle.',
                'description_ar' => 'شقق عصرية بإطلالات رائعة على المارينا، مثالية لمن يبحثون عن نمط حياة فاخر على الواجهة البحرية.',
                'location' => 'North Coast, Egypt',
                'status' => 'coming_soon',
                'featured' => true,
                'meta_title' => 'Marina Bay Apartments - Waterfront Living',
                'meta_description' => 'Luxury apartments with marina views at Egypt\'s North Coast.',
            ],
            [
                'title_en' => 'Palm Hills Compound',
                'title_ar' => 'كمبوند هضاب النخيل',
                'slug' => 'palm-hills-compound',
                'description_en' => 'A gated community offering a perfect blend of luxury, security, and natural beauty.',
                'description_ar' => 'مجتمع مغلق يوفر مزيجاً مثالياً من الفخامة والأمان والجمال الطبيعي.',
                'location' => '6th of October, Egypt',
                'status' => 'available',
                'featured' => false,
                'meta_title' => 'Palm Hills Compound - Gated Community',
                'meta_description' => 'Secure luxury living in our exclusive compound.',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
