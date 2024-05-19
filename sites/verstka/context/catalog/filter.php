<?php

return [
    'controls' => [
        [
            'id' => '1000',
            'index' => 0,
            'type' => 'checkboxList',
            'isToggle' => true,
            'label' => 'Тип',
            'isChanged' => false,
            'name' => 'type',
            'options' => [
                'chooseAll' => true,
                'multiple' => true,
                'hasSearch' => false,
            ],
            'values' => [
                [
                    'id' => '1000_2',
                    'index' => 0,
                    'label' => 'Легковые',
                    'disabled' => false,
                    'value' => 'lightweight',
                    'name' => 'arrMainProductsFilter_1000_2',
                    'checked' => false
                ],
                [
                    'id' => '1000_3',
                    'index' => 1,
                    'label' => 'Кроссоверы',
                    'disabled' => false,
                    'value' => 'crossovers',
                    'name' => 'arrMainProductsFilter_2000_3',
                    'checked' => false
                ],
                [
                    'id' => '1000_4',
                    'index' => 2,
                    'label' => 'Пикапы',
                    'disabled' => false,
                    'value' => 'pickups',
                    'name' => 'arrMainProductsFilter_1000_4',
                    'checked' => false
                ],
                [
                    'id' => '1000_5',
                    'index' => 3,
                    'label' => 'Электромобили',
                    'disabled' => false,
                    'value' => 'electrocars',
                    'name' => 'arrMainProductsFilter_1000_5',
                    'checked' => false
                ],
            ]
        ],
        [
            'id' => '2000',
            'index' => 1,
            'type' => 'checkboxList',
            'isToggle' => false,
            'label' => 'Марка',
            'isChanged' => false,
            'name' => 'brand',
            'options' => [
                'multiple' => true,
                'hasSearch' => false,
            ],
            'values' => [
                [
                    'id' => '2000_1',
                    'index' => 0,
                    'label' => 'EXEED',
                    'disabled' => false,
                    'value' => 'EXEED',
                    'name' => 'arrMainProductsFilter_2000_1',
                    'checked' => false
                ],
                [
                    'id' => '2000_2',
                    'index' => 1,
                    'label' => 'CHERY',
                    'disabled' => false,
                    'value' => 'CHERY',
                    'name' => 'arrMainProductsFilter_2000_2',
                    'checked' => false
                ],
                [
                    'id' => '2000_3',
                    'index' => 2,
                    'label' => 'Geely Tugella',
                    'disabled' => false,
                    'value' => 'GeelyTugella',
                    'name' => 'arrMainProductsFilter_2000_3',
                    'checked' => false
                ],
                [
                    'id' => '2000_4',
                    'index' => 3,
                    'label' => 'Haval Jolion',
                    'disabled' => false,
                    'value' => 'HavalJolion',
                    'name' => 'arrMainProductsFilter_2000_4',
                    'checked' => false
                ],
                [
                    'id' => '2000_5',
                    'index' => 4,
                    'label' => 'Voyah Free',
                    'disabled' => false,
                    'value' => 'VoyahFree',
                    'name' => 'arrMainProductsFilter_2000_5',
                    'checked' => false
                ],
                [
                    'id' => '2000_6',
                    'index' => 5,
                    'label' => 'Geely Tugella',
                    'disabled' => false,
                    'value' => 'GeelyTugella',
                    'name' => 'arrMainProductsFilter_2000_6',
                    'checked' => false
                ],
            ]
        ],
        [
            'id' => '3000',
            'index' => 2,
            'type' => 'checkboxList',
            'isToggle' => false,
            'label' => 'Модель',
            'isChanged' => false,
            'name' => 'model',
            'options' => [
                'multiple' => true,
                'hasSearch' => false,
            ],
            'values' => [
                [
                    'id' => '3000_1',
                    'index' => 0,
                    'label' => 'EXEED',
                    'disabled' => false,
                    'value' => 'EXEED',
                    'name' => 'arrMainProductsFilter_3000_1',
                    'checked' => false
                ],
                [
                    'id' => '3000_2',
                    'index' => 1,
                    'label' => 'CHERY',
                    'disabled' => false,
                    'value' => 'CHERY',
                    'name' => 'arrMainProductsFilter_3000_2',
                    'checked' => false
                ],
                [
                    'id' => '3000_3',
                    'index' => 2,
                    'label' => 'Geely Tugella',
                    'disabled' => false,
                    'value' => 'GeelyTugella',
                    'name' => 'arrMainProductsFilter_3000_3',
                    'checked' => false
                ],
                [
                    'id' => '3000_4',
                    'index' => 3,
                    'label' => 'Haval Jolion',
                    'disabled' => false,
                    'value' => 'HavalJolion',
                    'name' => 'arrMainProductsFilter_3000_4',
                    'checked' => false
                ],
                [
                    'id' => '3000_5',
                    'index' => 4,
                    'label' => 'Voyah Free',
                    'disabled' => false,
                    'value' => 'VoyahFree',
                    'name' => 'arrMainProductsFilter_3000_5',
                    'checked' => false
                ],
                [
                    'id' => '3000_6',
                    'index' => 5,
                    'label' => 'Geely Tugella',
                    'disabled' => false,
                    'value' => 'GeelyTugella',
                    'name' => 'arrMainProductsFilter_3000_6',
                    'checked' => false
                ],
            ]
        ],
        [
            'id' => '4000',
            'index' => 3,
            'type' => 'range',
            'label' => 'Стоимость, млн ₽',
            'name' => 'price',
            'isChanged' => false, // применено ли значение в контроле,
            'options' => [
                'interval' => 0.1
            ],
            'values' => [
                [
                    'type' => 'min',
                    "name" => "NEXT_SMART_FILTER_P1_MIN_VUE",
                    'value' => 2.5, // конкретное значение (минимально возможное значение)
                    'baseValue' => 2.5, // базовое значение ()
                    'placeholder' => 2.5, // левая граница (положение ползунка)
                ],
                [
                    'type' => 'max',
                    "name" => "NEXT_SMART_FILTER_P1_MAX_VUE",
                    'value' => 13.1, // конкретное значение
                    'baseValue' => 13.1, // базовое значение
                    'placeholder' => 13.1, // правая граница (положение ползунка)
                ]
            ],
        ],
        [
            'id' => '5000',
            'index' => 4,
            'type' => 'range',
            'label' => 'Год',
            'name' => 'year',
            'isChanged' => false, // применено ли значение в контроле,
            'options' => [
                'interval' => 1
            ],
            'values' => [
                [
                    'type' => 'min',
                    "name" => "NEXT_SMART_FILTER_P2_MIN_VUE",
                    'value' => 1993, // конкретное значение (минимально возможное значение)
                    'baseValue' => 1993, // базовое значение ()
                    'placeholder' => 1993, // левая граница (положение ползунка)
                ],
                [
                    'type' => 'max',
                    "name" => "NEXT_SMART_FILTER_P2_MAX_VUE",
                    'value' => 2023, // конкретное значение
                    'baseValue' => 2023, // базовое значение
                    'placeholder' => 2023, // правая граница (положение ползунка)
                ]
            ],
        ],
        [
            'id' => '6000',
            'index' => 5,
            'type' => 'range',
            'label' => 'Пробег, тыс. км.',
            'name' => 'run',
            'isChanged' => false, // применено ли значение в контроле,
            'options' => [
                'interval' => 1
            ],
            'values' => [
                [
                    'type' => 'min',
                    "name" => "NEXT_SMART_FILTER_P3_MIN_VUE",
                    'value' => 0, // конкретное значение (минимально возможное значение)
                    'baseValue' => 0, // базовое значение ()
                    'placeholder' => 0, // левая граница (положение ползунка)
                ],
                [
                    'type' => 'max',
                    "name" => "NEXT_SMART_FILTER_P3_MAX_VUE",
                    'value' => 214, // конкретное значение
                    'baseValue' => 214, // базовое значение
                    'placeholder' => 214, // правая граница (положение ползунка)
                ]
            ],
        ],
        [
            'id' => '7000',
            'index' => 6,
            'type' => 'range',
            'label' => 'Объем, лит.',
            'name' => 'capacity',
            'isChanged' => false, // применено ли значение в контроле,
            'options' => [
                'interval' => 1
            ],
            'values' => [
                [
                    'type' => 'min',
                    "name" => "NEXT_SMART_FILTER_P4_MIN_VUE",
                    'value' => 1300, // конкретное значение (минимально возможное значение)
                    'baseValue' => 1300, // базовое значение ()
                    'placeholder' => 1300, // левая граница (положение ползунка)
                ],
                [
                    'type' => 'max',
                    "name" => "NEXT_SMART_FILTER_P4_MAX_VUE",
                    'value' => 1500, // конкретное значение
                    'baseValue' => 1500, // базовое значение
                    'placeholder' => 1500, // правая граница (положение ползунка)
                ]
            ],
        ],
    ],
];
