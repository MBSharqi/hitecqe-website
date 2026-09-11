<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentCmsTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_settings_appear_on_contact_and_footer(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->put('/admin/settings', [
                'email' => 'studio@hitecqe.com',
                'phone' => '+94 711 000 111',
                'phone_link' => '+94711000111',
                'address' => 'Colombo 04, Sri Lanka',
                'hours' => 'Mon–Sat, 09:00–17:00 SLST',
                'response_note' => 'Within one business day',
            ])
            ->assertRedirect();

        $this->get('/contact')
            ->assertOk()
            ->assertSee('studio@hitecqe.com')
            ->assertSee('+94 711 000 111')
            ->assertSee('Colombo 04, Sri Lanka')
            ->assertSee('Mon–Sat, 09:00–17:00 SLST');
    }

    public function test_home_content_can_be_updated_from_admin(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->put('/admin/content/home', [
                'sections' => [
                    'hero' => [
                        'slides' => [
                            [
                                'title' => 'Custom hero title',
                                'accent' => 'accent text.',
                                'lead' => 'Custom hero lead copy.',
                            ],
                        ],
                        'trust' => ['Trust one', 'Trust two', 'Trust three'],
                    ],
                    'stats' => [
                        'items' => [
                            ['value' => 12, 'suffix' => '+', 'label' => 'Custom stat label'],
                        ],
                    ],
                    'advantages' => [
                        'eyebrow' => 'Why us',
                        'title' => 'Custom advantage title',
                        'lead' => 'Custom advantage lead',
                        'cards' => [
                            ['title' => 'Card One', 'body' => 'Card body one'],
                        ],
                    ],
                ],
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('page_contents', [
            'page' => 'home',
            'section' => 'hero',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Custom hero title')
            ->assertSee('accent text.')
            ->assertSee('Custom hero lead copy.')
            ->assertSee('Custom stat label')
            ->assertSee('Custom advantage title')
            ->assertSee('Card One');
    }

    public function test_about_and_services_content_can_be_updated(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->put('/admin/content/about', [
                'sections' => [
                    'hero' => [
                        'eyebrow' => 'About us',
                        'title' => 'About title from CMS',
                        'lead' => 'About lead from CMS',
                    ],
                    'story' => [
                        'eyebrow' => 'Story',
                        'title' => 'Story title',
                        'paragraphs' => ['Story paragraph one'],
                    ],
                    'beliefs' => [
                        'eyebrow' => 'Beliefs',
                        'title' => 'Beliefs title',
                        'items' => [
                            ['title' => 'Belief A', 'body' => 'Belief body'],
                        ],
                    ],
                    'focus' => [
                        'eyebrow' => 'Focus',
                        'title' => 'Focus title',
                        'lead' => 'Focus lead',
                        'points' => ['Focus point one'],
                    ],
                    'cta' => [
                        'eyebrow' => 'CTA',
                        'title' => 'About CTA title',
                        'lead' => 'About CTA lead',
                    ],
                ],
            ])
            ->assertRedirect();

        $this->actingAs($admin)
            ->put('/admin/content/services', [
                'sections' => [
                    'hero' => [
                        'eyebrow' => 'Services',
                        'title' => 'Services title from CMS',
                        'lead' => 'Services lead from CMS',
                    ],
                    'engineering' => [
                        'eyebrow' => 'Engineering',
                        'title' => 'Engineering title',
                        'lead' => 'Engineering lead',
                        'points' => ['Eng point'],
                    ],
                    'design' => [
                        'eyebrow' => 'Design',
                        'title' => 'Design title',
                        'lead' => 'Design lead',
                        'points' => ['Design point'],
                    ],
                    'offerings' => [
                        'eyebrow' => 'Offerings',
                        'title' => 'Offerings title',
                        'items' => [
                            ['title' => 'Offering A', 'body' => 'Offering body'],
                        ],
                    ],
                    'process' => [
                        'eyebrow' => 'Process',
                        'title' => 'Process title',
                        'lead' => 'Process lead',
                        'steps' => [
                            ['title' => 'Step A', 'body' => 'Step body'],
                        ],
                    ],
                    'cta' => [
                        'eyebrow' => 'CTA',
                        'title' => 'Services CTA title',
                        'lead' => 'Services CTA lead',
                    ],
                ],
            ])
            ->assertRedirect();

        $this->get('/about')
            ->assertOk()
            ->assertSee('About title from CMS')
            ->assertSee('Belief A');

        $this->get('/services')
            ->assertOk()
            ->assertSee('Services title from CMS')
            ->assertSee('Engineering title')
            ->assertSee('Offering A');
    }
}
