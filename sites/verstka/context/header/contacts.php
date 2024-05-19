<?php

return [
    'phone' => [
        'href' => 'https://wa.me/79241422414',
        'text' => '+7 924 142-24-14'
    ],
    'popupContacts' => [
        'items' => collect([
            [
                'title' => 'Основой телефон',
                'text' => 'Написать в <a href="https://wa.me/79241422414">WhatsApp</a>',
                'phone' => [
                    'href' => 'https://wa.me/79241422414',
                    'text' => '+7 924 142-24-14'
                ],
            ],
            [
                'title' => 'Евгений - Дальний восток',
                'text' => 'Написать в <a href="https://wa.me/79244413737">WhatsApp</a>',
                'phone' => [
                    'href' => 'https://wa.me/79244413737',
                    'text' => '+7 924 441-37-37'
                ],
            ],
            [
                'title' => 'Елена- Забайкальский край',
                'text' => 'Написать в <a href="https://wa.me/79021729995">WhatsApp</a>',
                'phone' => [
                    'href' => 'https://wa.me/79021729995',
                    'text' => '+7 902 172-99-95'
                ],
            ],
            [
                'title' => 'Павел - Приморский край',
                'text' => 'Написать в <a href="https://wa.me/79245240207">WhatsApp</a>',
                'phone' => [
                    'href' => 'https://wa.me/79245240207',
                    'text' => '+7 924 524-02-07'
                ],
            ],
            [
                'title' => 'Евгений - Краснодарский край',
                'text' => 'Написать в <a href="https://wa.me/79180504452">WhatsApp</a>',
                'phone' => [
                    'href' => 'https://wa.me/79180504452',
                    'text' => '+7 918 050-44-52'
                ],
            ]
        ]),
        'button' => [
            'href' => '#callback-form',
            'text' => 'Заказать звонок'
        ]
    ]
];
