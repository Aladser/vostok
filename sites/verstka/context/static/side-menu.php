<?php

return [
    'menu' => collect([
        [
            'href' => '#',
            'text' => 'Как заказать',
            'active' => true,
            'menu' => collect([
                [
                    'href' => '#',
                    'text' => 'Доставка',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Оплата',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Гарантии',
                    'active' => true,
                    'menu' => collect([])
                ]
            ])
        ],
        [
            'href' => '#',
            'text' => 'Дополнительные услуги',
            'active' => false,
            'menu' => collect([
                [
                    'href' => '#',
                    'text' => 'Услуга 1',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Услуга 2',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Услуга 3',
                    'active' => false,
                    'menu' => collect([])
                ],
            ])
        ],
        [
            'href' => '#',
            'text' => 'Клиентам',
            'active' => false,
            'menu' => collect([
                [
                    'href' => '#',
                    'text' => 'Клиентам 1',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Клиентам 2',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Клиентам 3',
                    'active' => false,
                    'menu' => collect([])
                ],
            ])
        ],
        [
            'href' => '#',
            'text' => 'Дилерам',
            'active' => false,
            'menu' => collect([
                [
                    'href' => '#',
                    'text' => 'Дилерам 1',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Дилерам 2',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Дилерам 3',
                    'active' => false,
                    'menu' => collect([])
                ],
            ])
        ],
        [
            'href' => '#',
            'text' => 'Частые вопросы',
            'active' => false,
            'menu' => collect([])
        ]
    ])
];
