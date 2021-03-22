<?php

namespace App\Tests;

class TreeGenerator
{
    public static function getTreeLeaf_Root(): array
    {
        return [
            'id' => 1,
            'children' => []
        ];
    }

    public static function getTreeLeaf_2_5_6_8_11_13(): array
    {
        return [
            'id' => 1,
            'children' => [
                ['id' => 2, 'children' => []],
                [
                    'id' => 3,
                    'children' => [
                        [
                            'id' => 4,
                            'children' => [
                                ['id' => 5, 'children' => []],
                                ['id' => 6, 'children' => []]
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 7,
                    'children' => [
                        ['id' => 8, 'children' => []],
                        [
                            'id' => 9,
                            'children' => [
                                [
                                    'id' => 10, 'children' => [
                                        ['id' => 11, 'children' => []],
                                        [
                                            'id' => 12,
                                            'children' => [
                                                ['id' => 13, 'children' => []]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public static function getTreeLeaf_11(): array
    {
        return [
            'id' => 1,
            'children' => [
                [
                    'id' => 3,
                    'children' => [
                        [
                            'id' => 4,
                            'children' => [
                                [
                                    'id' => 5,
                                    'children' => [
                                        [
                                            [
                                                'id' => 6,
                                                'children' => [
                                                    [
                                                        'id' => 7,
                                                        'children' => [
                                                            [
                                                                'id' => 8,
                                                                'children' => [
                                                                    [
                                                                        [
                                                                            'id' => 9,
                                                                            'children' => [
                                                                                [
                                                                                    'id' => 10,
                                                                                    'children' => [
                                                                                        ['id' => 11, 'children' => []],
                                                                                    ]
                                                                                ]
                                                                            ]
                                                                        ],
                                                                    ]
                                                                ]
                                                            ],
                                                        ]
                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
    }
}
