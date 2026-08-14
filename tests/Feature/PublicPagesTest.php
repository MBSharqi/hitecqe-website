<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_return_ok(): void
    {
        foreach (['/', '/about', '/services', '/portfolio', '/blog', '/contact'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_unknown_page_returns_not_found(): void
    {
        $this->get('/this-page-does-not-exist')->assertNotFound();
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->post('/contact', [])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_contact_form_stores_a_message(): void
    {
        $this->post('/contact', [
            'name' => 'Amina Khan',
            'email' => 'amina@example.com',
            'company' => 'Northline',
            'phone' => '03001234567',
            'subject' => 'New product',
            'message' => 'We want to build a Laravel application for our team.',
        ])->assertRedirect(route('contact'));

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'amina@example.com',
            'subject' => 'New product',
            'status' => 'new',
        ]);

        $this->assertSame(1, ContactMessage::count());
    }

    public function test_published_blog_post_is_visible(): void
    {
        $post = Post::query()->create([
            'title' => 'Clarity in software',
            'slug' => 'clarity-in-software',
            'excerpt' => 'A short note on building with focus.',
            'body' => 'Great software starts with a clear outcome.',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        $this->get('/blog/'.$post->slug)
            ->assertOk()
            ->assertSee('Clarity in software');
    }

    public function test_draft_blog_post_is_hidden(): void
    {
        $post = Post::query()->create([
            'title' => 'Hidden draft',
            'slug' => 'hidden-draft',
            'excerpt' => 'This should stay private.',
            'body' => 'Draft body.',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $this->get('/blog/'.$post->slug)->assertNotFound();
    }
}
