<?php

namespace Tests\Feature;

use App\Models\InvestmentPageSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InvestmentPageEditorTest extends TestCase
{
    use RefreshDatabase;

    public function test_investment_editor_is_admin_only(): void
    {
        $this->get(route('admin.investment.edit'))->assertRedirect(route('login'));

        $user = User::factory()->create();
        $this->actingAs($user)->get(route('admin.investment.edit'))->assertForbidden();

        $user->is_admin = true;
        $user->save();
        $this->actingAs($user)
            ->get(route('admin.investment.edit'))
            ->assertOk()
            ->assertSee('صور المقدمة المتحركة')
            ->assertSee('خدماتنا وتفاصيلها')
            ->assertSee('مجالات الاستثمار');
    }

    public function test_admin_can_save_investment_content_and_upload_images(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();
        $defaults = InvestmentPageSetting::defaults();

        $services = array_map(static fn(array $service): array => [
            'title' => $service['title'],
            'description' => $service['description'],
        ], $defaults['services']);
        $services[0]['title'] = 'تحليل فرص السوق';

        $areas = array_map(static fn(array $area): array => [
            'title' => $area['title'],
            'description' => $area['description'],
            'alt' => $area['alt'],
            'badge1' => $area['badge1'],
            'badge2' => $area['badge2'],
        ], $defaults['investment_areas']);
        $areas[0]['title'] = 'أبراج استثمارية';
        $areas[0]['image_upload'] = UploadedFile::fake()->image('commercial.jpg');

        $heroImages = array_fill(0, count($defaults['hero_images']), null);
        $heroImages[0] = UploadedFile::fake()->image('hero.jpg');

        $response = $this->actingAs($admin)->put(route('admin.investment.update'), [
            'services_heading' => 'خدمات الاستثمار المتميزة',
            'services' => $services,
            'areas_heading' => 'فرص ومجالات الاستثمار',
            'investment_areas' => $areas,
            'hero_images' => $heroImages,
        ]);

        $response->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.investment.edit'));
        $this->assertDatabaseHas('investment_page_settings', ['id' => 1]);

        $saved = InvestmentPageSetting::query()->firstOrFail();
        $this->assertSame('تحليل فرص السوق', $saved->services[0]['title']);
        $this->assertSame('أبراج استثمارية', $saved->investment_areas[0]['title']);
        Storage::disk('public')->assertExists($saved->hero_images[0]);
        Storage::disk('public')->assertExists($saved->investment_areas[0]['image']);

        $this->get(route('real-estate-investment'))
            ->assertOk()
            ->assertSee('خدمات الاستثمار المتميزة')
            ->assertSee('تحليل فرص السوق')
            ->assertSee('أبراج استثمارية');
    }
}
