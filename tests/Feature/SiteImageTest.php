<?php

namespace Tests\Feature;

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

        $this->actingAs($user)
            ->delete(route('admin.images.destroy', 'home.hero'))
            ->assertRedirect();

        $this->assertDatabaseMissing('site_images', ['slot' => 'home.hero']);
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
}
