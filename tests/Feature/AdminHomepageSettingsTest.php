<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminHomepageSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_settings_are_available_to_admins_only(): void
    {
        $this->get(route('admin.homepage.edit'))
            ->assertRedirect(route('login'));

        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $this->actingAs($admin)
            ->get(route('admin.homepage.edit'))
            ->assertOk()
            ->assertSee('إعدادات الصفحة الرئيسية')
            ->assertSee('معلومات التواصل');
    }

    public function test_admin_can_save_homepage_copy_and_images(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $defaults = SiteSetting::homepageDefaults();
        $sections = array_map(static function (array $section): array {
            return [
                'name' => $section['name'],
                'description' => $section['description'],
            ];
        }, $defaults['sections']);
        $sections[0]['name'] = 'فرص استثمارية مميزة';

        $response = $this->actingAs($admin)->put(route('admin.homepage.update'), [
            'company_name' => 'شركة العوني للاستثمار',
            'vision' => 'رؤية جديدة للشركة',
            'mission' => 'رسالة محدثة',
            'values' => 'الشفافية والجودة',
            'logo_upload' => UploadedFile::fake()->image('logo.png'),
            'hero_images' => [UploadedFile::fake()->image('hero.jpg')],
            'sections' => $sections,
            'contact' => [
                'address' => 'القاهرة',
                'phone' => '+20 2 5555555',
                'mobile' => '+20 10 5555555',
                'email' => 'contact@example.com',
                'hours' => 'الأحد إلى الخميس',
            ],
        ]);

        $response->assertRedirect(route('admin.homepage.edit'));
        $this->assertDatabaseHas('site_settings', ['key' => 'homepage_content']);
        $saved = SiteSetting::rawHomepage();
        $this->assertSame('شركة العوني للاستثمار', $saved['company_name']);
        $this->assertSame('فرص استثمارية مميزة', $saved['sections'][0]['name']);
        Storage::disk('public')->assertExists($saved['logo']);
        Storage::disk('public')->assertExists($saved['hero_images'][0]);

        $this->get(route('landing'))
            ->assertOk()
            ->assertSee('شركة العوني للاستثمار')
            ->assertSee('فرص استثمارية مميزة')
            ->assertSee('contact@example.com')
            ->assertSee('القاهرة');
    }
}
