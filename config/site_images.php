<?php

return [
    'placeholder' => 'images/placeholders/no-image.svg',
    'defaults' => [
        'brand.logo' => 'images/logo/hitecqe-mark.svg',
        'brand.favicon' => 'images/logo/hitecqe-mark.svg',
    ],
    'pages' => [
        'brand' => [
            'label' => 'Brand',
            'slots' => [
                'brand.logo' => [
                    'label' => 'Logo',
                    'hint' => 'Shown in the header, footer, and admin. PNG, JPG, WebP, or SVG. Falls back to the default mark if empty.',
                    'accept' => 'image/jpeg,image/png,image/webp,image/svg+xml',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
                ],
                'brand.favicon' => [
                    'label' => 'Favicon',
                    'hint' => 'Browser tab icon. PNG, SVG, ICO, JPG, or WebP. Falls back to the default mark if empty.',
                    'accept' => 'image/jpeg,image/png,image/webp,image/svg+xml,image/x-icon,.ico',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,svg,ico', 'max:1024'],
                ],
            ],
        ],
        'theme' => [
            'label' => 'Theme',
            'slots' => [
                'theme.dark_net' => [
                    'label' => 'Dark net background',
                    'hint' => 'Background image for the dark footer net theme. Use a dark abstract / net pattern. JPG, PNG, or WebP.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
                ],
                'theme.page_bg' => [
                    'label' => 'Default page background',
                    'hint' => 'Fallback hero background for any page without its own image. Dark tech / net style works best. JPG, PNG, or WebP.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
            ],
        ],
        'home' => [
            'label' => 'Home',
            'slots' => [
                'home.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Full-bleed dark hero background (tech / net style). Overlay keeps text readable.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
                'home.hero' => [
                    'label' => 'Hero visual',
                    'hint' => 'Product / workspace photo inside the hero frame.',
                ],
                'home.craft' => [
                    'label' => 'Approach photo',
                    'hint' => 'Image beside Discover / Design / Deliver.',
                ],
                'home.selected' => [
                    'label' => 'Selected work',
                    'hint' => 'Featured work preview on the homepage.',
                ],
            ],
        ],
        'about' => [
            'label' => 'About',
            'slots' => [
                'about.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Dark full-bleed background behind the About hero.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
                'about.studio' => [
                    'label' => 'Studio photo',
                    'hint' => 'Team or studio image in Our story.',
                ],
                'about.focus' => [
                    'label' => 'How we work',
                    'hint' => 'Photo beside the partnership section.',
                ],
            ],
        ],
        'services' => [
            'label' => 'Services',
            'slots' => [
                'services.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Dark full-bleed background behind the Services hero.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
                'services.engineering' => [
                    'label' => 'Engineering',
                    'hint' => 'Image for web application development.',
                ],
                'services.design' => [
                    'label' => 'Design',
                    'hint' => 'Image for product and UI design.',
                ],
            ],
        ],
        'portfolio' => [
            'label' => 'Portfolio',
            'slots' => [
                'portfolio.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Dark full-bleed background behind the Portfolio hero.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
            ],
        ],
        'blog' => [
            'label' => 'Blog',
            'slots' => [
                'blog.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Dark full-bleed background behind the Blog hero.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
            ],
        ],
        'contact' => [
            'label' => 'Contact',
            'slots' => [
                'contact.bg' => [
                    'label' => 'Page background',
                    'hint' => 'Dark full-bleed background behind the Contact hero.',
                    'accept' => 'image/jpeg,image/png,image/webp',
                    'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
                ],
            ],
        ],
    ],
];
