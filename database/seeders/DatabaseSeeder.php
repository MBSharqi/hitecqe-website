<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@hitecqe.com'],
            [
                'name' => 'Hitecqe Admin',
                'password' => 'Hitecqe@Admin1',
            ]
        );

        SiteSetting::current()->update(config('content.settings', []));

        $posts = [
            [
                'title' => 'Build with clarity, not clutter',
                'excerpt' => 'Why focused product decisions create software that feels calm, useful, and ready to grow.',
                'body' => "Great software starts before the first line of code.\n\nAt Hitecqe, we begin with clarity: who the product is for, what job it must do, and how success will be measured. That focus removes noise early — so design stays intentional and engineering stays efficient.\n\nWhen teams skip this step, products become crowded with features that look busy but rarely help users move forward. Clarity is not slower. It is the fastest path to something people trust.",
                'cover_image' => 'images/blog/clarity.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'How we ship Laravel products in focused cycles',
                'excerpt' => 'A practical look at our delivery rhythm — from discovery to launch without heavy process.',
                'body' => "Shipping well is a rhythm, not a scramble.\n\nWe work in focused cycles: discover the outcome, design the flow, build the core, then refine with real feedback. Each cycle has a clear demo point so stakeholders always know what is done and what comes next.\n\nLaravel gives us a strong foundation for this pace — clean structure, secure defaults, and room to grow. The goal is simple: visible progress, fewer surprises, and a product that is ready for production.",
                'cover_image' => 'images/blog/shipping.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Design systems that scale with your company',
                'excerpt' => 'Interfaces should feel distinctive on day one and stay consistent as your product expands.',
                'body' => "A strong interface system is more than visual style.\n\nIt is a shared language for layout, hierarchy, interaction, and brand presence. When that language is clear, new screens feel connected instead of improvised.\n\nWe design systems that support growth: reusable patterns, thoughtful spacing, and typography that carries the brand. The result is software that still feels intentional after the tenth feature — not just the first.",
                'cover_image' => 'images/blog/systems.jpg',
                'status' => 'published',
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($posts as $post) {
            $slug = Str::slug($post['title']);

            Post::query()->updateOrCreate(
                ['slug' => $slug],
                $post + ['slug' => $slug]
            );
        }

        $projects = [
            [
                'title' => 'Northline Analytics',
                'description' => 'A performance dashboard for a growing SaaS team — clearer reporting, faster decisions, and an interface that stays calm under daily use.',
                'tags' => 'Product design · Laravel app',
                'focus' => 'Product design · Laravel app',
                'outcome' => 'Faster insight workflows for operators',
                'cover_image' => null,
                'is_featured' => true,
                'sort_order' => 1,
                'status' => 'published',
            ],
            [
                'title' => 'Orbit Customer Hub',
                'description' => 'A responsive customer portal with clean account flows, support touchpoints, and a visual system built for trust.',
                'tags' => 'UI design · Web app · Responsive',
                'focus' => null,
                'outcome' => null,
                'cover_image' => null,
                'is_featured' => false,
                'sort_order' => 2,
                'status' => 'published',
            ],
            [
                'title' => 'Forge Operations Suite',
                'description' => 'Internal tooling for operations teams — structured workflows, role-based access, and a foundation ready for future modules.',
                'tags' => 'Laravel · MySQL · Admin systems',
                'focus' => null,
                'outcome' => null,
                'cover_image' => null,
                'is_featured' => false,
                'sort_order' => 3,
                'status' => 'published',
            ],
            [
                'title' => 'Meridian Company Site',
                'description' => 'A high-clarity marketing website for a software brand — strong first impression, fast pages, and a structure ready for content growth.',
                'tags' => 'Brand site · Performance · Frontend',
                'focus' => null,
                'outcome' => null,
                'cover_image' => null,
                'is_featured' => false,
                'sort_order' => 4,
                'status' => 'published',
            ],
        ];

        foreach ($projects as $project) {
            $slug = Str::slug($project['title']);

            Project::query()->updateOrCreate(
                ['slug' => $slug],
                $project + ['slug' => $slug]
            );
        }

        $testimonials = [
            [
                'quote' => 'Hitecqe Solutions brought clarity to a messy brief and delivered a Laravel platform our team could actually maintain. Communication stayed clear from kickoff to launch.',
                'author_name' => 'Amina Fernando',
                'author_role' => 'Founder, Northline Analytics',
                'sort_order' => 1,
                'status' => 'published',
            ],
            [
                'quote' => 'They treated design and engineering as one process. The result felt polished, fast, and ready for real users — without the usual handoff gaps.',
                'author_name' => 'Ravi Perera',
                'author_role' => 'Product Lead, Orbit Hub',
                'sort_order' => 2,
                'status' => 'published',
            ],
            [
                'quote' => 'Transparent timelines, careful craft, and a partner mindset. We knew what was shipping each week — and why.',
                'author_name' => 'Sasha Wijesinghe',
                'author_role' => 'Operations Director, Forge Suite',
                'sort_order' => 3,
                'status' => 'published',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                [
                    'author_name' => $testimonial['author_name'],
                    'quote' => $testimonial['quote'],
                ],
                $testimonial
            );
        }
    }
}
