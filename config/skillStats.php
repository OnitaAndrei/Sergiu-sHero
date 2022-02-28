<?php
return [
    'hero' =>
        [
            'attack' =>
                [

                    [
                        'name' => 'Rapid Strike',
                        'chance' => 10,
                        'numberOfStrikes' => 2,
                        'buff' => 0
                    ],
                    [
                        'name' => 'Ultra Rapid Strike',
                        'chance' => 5,
                        'numberOfStrikes' => 4,
                        'buff' => 0
                    ],
                    [
                        'name' => 'Poop Attack',
                        'chance' => 0,
                        'numberOfStrikes' => 0,
                        'buff' => 0
                    ]
                ],
            'defence' =>
                [
                    [
                        'name' => 'Magic Shield',
                        'chance' => 20,
                        'reducedDamage' => 50
                    ],
                    [
                        'name' => 'Divine Shield',
                        'chance' => 10,
                        'reducedDamage' => 100
                    ]
                ]
        ],
    'enemy' =>
        [
            'attack' =>
                [
                    [
                        'name' => 'Rapid Strike',
                        'chance' => 0,
                        'numberOfStrikes' => 0,
                        'buff' => 0
                    ]
                ],
            'defence' =>
                [
                    [
                        'name' => 'Magic Shield',
                        'chance' => 0,
                        'reducedDamage' => 0
                    ],

                ]
        ]
];