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
        'home' => [
            'label' => 'Home',
            'slots' => [
                'home.hero' => [
                    'label' => 'Hero background',
                    'hint' => 'Full-width photo behind the homepage headline.',
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
    ],
];
