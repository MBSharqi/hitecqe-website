<?php

namespace Tests\Feature;

use App\Models\SiteImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteImageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_uses_placeholder_when_no_image_is_uploaded(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('images/placeholders/no-image.svg', false);
    }

    public function test_admin_can_upload_and_delete_a_page_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('hero.jpg', 1600, 900);

        $this->actingAs($user)
            ->put(route('admin.images.update', 'home.hero'), [
                'image' => $file,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('site_images', ['slot' => 'home.hero']);

        $path = SiteImage::query()->where('slot', 'home.hero')->value('path');
        Storage::disk('public')->assertExists($path);

        $this->actingAs($user)
            ->delete(route('admin.images.destroy', 'home.hero'))
            ->assertRedirect();

        $this->assertDatabaseMissing('site_images', ['slot' => 'home.hero']);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_unknown_image_slot_is_rejected(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('admin.images.update', 'unknown.slot'), [
                'image' => UploadedFile::fake()->image('x.jpg'),
            ])
            ->assertNotFound();
    }

    public function test_site_uses_default_brand_mark_when_no_logo_is_uploaded(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('images/logo/hitecqe-mark.svg', false);
    }

    public function test_admin_can_upload_and_delete_brand_logo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('logo.png', 256, 256);

        $this->actingAs($user)
            ->put(route('admin.images.update', 'brand.logo'), [
                'image' => $file,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('site_images', ['slot' => 'brand.logo']);

        $path = SiteImage::query()->where('slot', 'brand.logo')->value('path');
        Storage::disk('public')->assertExists($path);

        $this->actingAs($user)
            ->delete(route('admin.images.destroy', 'brand.logo'))
            ->assertRedirect();

        $this->assertDatabaseMissing('site_images', ['slot' => 'brand.logo']);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_admin_images_page_includes_brand_slots(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.images.index'))
            ->assertOk()
            ->assertSee('Brand')
            ->assertSee('Logo')
            ->assertSee('Favicon')
            ->assertSee('Theme')
            ->assertSee('Dark net background')
            ->assertDontSee('Featured project');
    }
}
