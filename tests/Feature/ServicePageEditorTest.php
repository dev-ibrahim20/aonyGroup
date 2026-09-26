<?php

namespace Tests\Feature;

use App\Models\ServicePageSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ServicePageEditorTest extends TestCase
{
    use RefreshDatabase;

    public function test_remaining_public_section_pages_render_default_content(): void
    {
        foreach (ServicePageSetting::labels() as $slug => $label) {
            $this->get(route($slug))
                ->assertOk()
                ->assertSee($label)
                ->assertSee('رؤيتنا')
                ->assertSee('خدماتنا');
        }
    }

    public function test_only_admins_can_open_a_section_editor(): void
    {
        $slug = 'real-estate-development';
        $this->get(route('admin.service-pages.edit', $slug))->assertRedirect(route('login'));

        $user = User::factory()->create();
        $this->actingAs($user)->get(route('admin.service-pages.edit', $slug))->assertForbidden();

        $user->is_admin = true;
        $user->save();
        $this->actingAs($user)
            ->get(route('admin.service-pages.edit', $slug))
            ->assertOk()
            ->assertSee('صور مقدمة الصفحة')
            ->assertSee('الخدمات')
            ->assertSee('معرض الصور')
            ->assertDontSee('خطوات العمل')
            ->assertDontSee('المعايير والركائز');
    }

    public function test_admin_can_save_a_service_page_and_upload_images(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $slug = 'real-estate-marketing';
        $defaults = ServicePageSetting::defaults($slug);
        $heroImages = array_fill(0, count($defaults['hero_images']), null);
        $heroImages[0] = UploadedFile::fake()->image('hero.jpg');

        $services = array_map(static fn(array $service): array => [
            'title' => $service['title'],
            'description' => $service['description'],
            'icon' => $service['icon'],
        ], $defaults['services']);
        $services[0]['title'] = 'تسويق رقمي متكامل';

        $projects = array_map(static fn(array $project): array => [
            'title' => $project['title'],
            'description' => $project['description'],
            'alt' => $project['alt'],
            'badge1' => $project['badge1'],
            'badge2' => $project['badge2'],
        ], $defaults['projects']);
        $projects[0]['title'] = 'حملة العقارات السكنية';
        $projects[0]['image_upload'] = UploadedFile::fake()->image('gallery.jpg');

        $response = $this->actingAs($admin)->put(route('admin.service-pages.update', $slug), [
            'title' => 'التسويق العقاري الاحترافي',
            'hero_images' => $heroImages,
            'vision' => $defaults['vision'],
            'mission' => $defaults['mission'],
            'values' => $defaults['values'],
            'services_heading' => $defaults['services_heading'],
            'cta_text' => $defaults['cta_text'],
            'cta_button' => $defaults['cta_button'],
            'services' => $services,
            'projects_title' => $defaults['projects_title'],
            'projects' => $projects,
        ]);

        $response->assertSessionHasNoErrors()->assertRedirect(route('admin.service-pages.edit', $slug));
        $this->assertDatabaseHas('service_page_settings', ['slug' => $slug]);
        $saved = ServicePageSetting::rawContent($slug);
        $this->assertSame('التسويق العقاري الاحترافي', $saved['title']);
        $this->assertSame('تسويق رقمي متكامل', $saved['services'][0]['title']);
        $this->assertSame('حملة العقارات السكنية', $saved['projects'][0]['title']);
        $this->assertSame($defaults['steps'], $saved['steps']);
        $this->assertSame($defaults['highlights'], $saved['highlights']);
        Storage::disk('public')->assertExists($saved['hero_images'][0]);
        Storage::disk('public')->assertExists($saved['projects'][0]['image']);

        $this->get(route($slug))
            ->assertOk()
            ->assertSee('التسويق العقاري الاحترافي')
            ->assertSee('تسويق رقمي متكامل')
            ->assertSee('حملة العقارات السكنية');
    }
}
