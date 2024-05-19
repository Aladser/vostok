<?php

return [
    'menu' => collect([
        [
            'href' => '#',
            'text' => 'Каталог автомобилей',
            'active' => false,
            'menu' => collect([])
        ],
        [
            'href' => '#',
            'text' => 'Как купить',
            'active' => true,
            'menu' => collect([])
        ],
        [
            'href' => '#',
            'text' => 'Доставка и оплата',
            'active' => false,
            'menu' => collect([])
        ],
        [
            'href' => '#',
            'text' => 'Журнал',
            'active' => false,
            'menu' => collect([])
        ],
        [
            'href' => '#',
            'text' => 'Контакты',
            'active' => false,
            'menu' => collect([])
        ],
        [
            'href' => '#',
            'text' => 'О Компании',
            'active' => false,
            'menu' => collect([
                [
                    'href' => '#',
                    'text' => 'Документы',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Отзывы',
                    'active' => true,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Вопрос-ответ',
                    'active' => false,
                    'menu' => collect([])
                ],
                [
                    'href' => '#',
                    'text' => 'Связаться с менеджером',
                    'active' => false,
                    'menu' => collect([])
                ],
            ])
        ],
    ])
];
