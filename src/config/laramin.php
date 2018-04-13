<?php

return [
    // You can also set project manager to null if you do not wish for it to show.
    'project_manager' => [
        'name' => 'John Smith',
        'email' => 'jsmith@example.com',
        'phone' => '555 55 555',
        'contact_finalised_message' => 'Thank you for contacting us, we will get back to you as soon as possible.',
        'modal_animation' => [
            'animation_in' => 'flipInX',
            'animation_out' => 'flipOutX',
        ],
    ],
    'sidebar_links' => [
        [
            'url' => '/dashboard',
            'name' => 'Dashboard',
            'icon' => 'fa-window-maximize',
        ],
        [
            'url' => '/dashboard/pages',
            'name' => 'Pages',
            'icon' => 'fa-file-text',
        ],
        [
            'url' => '/dashboard/posts',
            'name' => 'Posts',
            'icon' => 'fa-newspaper-o',
        ],
        [
            'url' => '/dashboard/faqs',
            'name' => 'FAQ\'s',
            'icon' => 'fa-question',
        ],
    ],
];
