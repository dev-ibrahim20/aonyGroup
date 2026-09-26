<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SocialLinksSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_social_links_editor_is_admin_only(): void
    {
        $this->get(route('admin.social-links.edit'))->assertRedirect(route('login'));

        $user = User::factory()->create();
        $this->actingAs($user)->get(route('admin.social-links.edit'))->assertForbidden();

        $user->is_admin = true;
        $user->save();
        $this->actingAs($user)
            ->get(route('admin.social-links.edit'))
            ->assertOk()
            ->assertSee('فيسبوك')
            ->assertSee('واتساب')
            ->assertSee('إنستغرام')
            ->assertSee('تيك توك');
    }

    public function test_admin_can_save_social_links_and_the_footer_uses_them(): void
    {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $links = [
            'facebook' => 'https://facebook.com/aony-real-estate',
            'whatsapp' => 'https://wa.me/201055555555',
            'instagram' => 'https://instagram.com/aony-real-estate',
            'x' => 'https://x.com/aony-real-estate',
            'tiktok' => 'https://tiktok.com/@aony-real-estate',
        ];

        $response = $this->actingAs($admin)
            ->put(route('admin.social-links.update'), $links);

        $response->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.social-links.edit'));
        $this->assertDatabaseHas('site_settings', ['key' => 'social_links']);
        $this->assertSame($links, SiteSetting::socialLinks());

        $this->get(route('landing'))
            ->assertOk()
            ->assertSee($links['facebook'])
            ->assertSee($links['whatsapp'])
            ->assertSee($links['instagram'])
            ->assertSee($links['x'])
            ->assertSee($links['tiktok']);
    }

    public function test_blank_social_link_hides_its_icon(): void
    {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $this->actingAs($admin)->put(route('admin.social-links.update'), [
            'facebook' => '',
            'whatsapp' => '',
            'instagram' => '',
            'x' => '',
            'tiktok' => '',
        ])->assertSessionHasNoErrors();

        $this->get(route('landing'))
            ->assertOk()
            ->assertDontSee('https://www.facebook.com/')
            ->assertDontSee('https://www.instagram.com/');
    }
}
