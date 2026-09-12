<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioAndTestimonialsTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_projects_appear_on_portfolio_page(): void
    {
        Project::query()->create([
            'title' => 'Northline Analytics',
            'slug' => 'northline-analytics',
            'description' => 'A performance dashboard for operators.',
            'tags' => 'Laravel · Dashboard',
            'focus' => 'Product design',
            'outcome' => 'Faster workflows',
            'is_featured' => true,
            'sort_order' => 1,
            'status' => 'published',
        ]);

        Project::query()->create([
            'title' => 'Draft Only',
            'slug' => 'draft-only',
            'description' => 'Should stay hidden.',
            'status' => 'draft',
            'sort_order' => 2,
        ]);

        $this->get('/portfolio')
            ->assertOk()
            ->assertSee('Northline Analytics')
            ->assertDontSee('Draft Only');
    }

    public function test_published_testimonials_appear_on_home(): void
    {
        Testimonial::query()->create([
            'quote' => 'Clear delivery from kickoff to launch.',
            'author_name' => 'Amina Fernando',
            'author_role' => 'Founder, Northline',
            'sort_order' => 1,
            'status' => 'published',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Clear delivery from kickoff to launch.')
            ->assertSee('Amina Fernando');
    }

    public function test_blog_shows_placeholder_when_cover_is_missing(): void
    {
        $post = Post::query()->create([
            'title' => 'No cover post',
            'slug' => 'no-cover-post',
            'excerpt' => 'A short excerpt for testing.',
            'body' => 'Body content for the post.',
            'status' => 'published',
            'published_at' => now()->subHour(),
            'cover_image' => null,
        ]);

        $this->get('/blog')
            ->assertOk()
            ->assertSee('No cover post')
            ->assertSee(asset('images/placeholders/no-image.svg'), false);

        $this->get('/blog/'.$post->slug)
            ->assertOk()
            ->assertSee(asset('images/placeholders/no-image.svg'), false);
    }

    public function test_admin_can_manage_projects_and_testimonials(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->post('/admin/projects', [
                'title' => 'Meridian Site',
                'description' => 'A high-clarity marketing website.',
                'tags' => 'Brand site · Frontend',
                'status' => 'published',
                'sort_order' => 1,
                'is_featured' => '1',
            ])
            ->assertRedirect(route('admin.projects.index'));

        $this->assertDatabaseHas('projects', [
            'title' => 'Meridian Site',
            'status' => 'published',
            'is_featured' => 1,
        ]);

        $this->actingAs($admin)
            ->post('/admin/testimonials', [
                'quote' => 'Outstanding partnership and craft.',
                'author_name' => 'Ravi Perera',
                'author_role' => 'Product Lead',
                'status' => 'published',
                'sort_order' => 1,
            ])
            ->assertRedirect(route('admin.testimonials.index'));

        $this->assertDatabaseHas('testimonials', [
            'author_name' => 'Ravi Perera',
            'status' => 'published',
        ]);
    }
}
