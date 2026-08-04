<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@hitecqe.com'],
            [
                'name' => 'Hitecqe Admin',
                'password' => Hash::make('Hitecqe@Admin1'),
            ]
        );

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
    }
}
