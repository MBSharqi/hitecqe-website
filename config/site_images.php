<?php

return [
    'placeholder' => 'images/placeholders/no-image.svg',
    'pages' => [
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
        'portfolio' => [
            'label' => 'Portfolio',
            'slots' => [
                'portfolio.featured' => [
                    'label' => 'Featured project',
                    'hint' => 'Large image for the first case study.',
                ],
                'portfolio.work_1' => [
                    'label' => 'Project 02',
                    'hint' => 'Orbit Customer Hub image.',
                ],
                'portfolio.work_2' => [
                    'label' => 'Project 03',
                    'hint' => 'Forge Operations Suite image.',
                ],
                'portfolio.work_3' => [
                    'label' => 'Project 04',
                    'hint' => 'Meridian Company Site image.',
                ],
            ],
        ],
    ],
];
