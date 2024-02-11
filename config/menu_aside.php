<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.18
 */

// Header menu
return [

    'items' => [
        [
            'title'   => 'Muhasebe',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Cari Hesaplar',
                        'page'        => 'company',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'company',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Fişler',
                        'page'        => 'fiche',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'fiche',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Stoklar',
                        'page'        => 'stock',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'stock',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Birimler',
                        'page'        => 'unit',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'unit',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'   => 'Üretim',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Emirler',
                        'page'        => 'production',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'production-order',
                            ],
                        ],
                    ],
                    [
                        'title'   => 'Listeler',
                        'bullet'  => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Üretim Listeleri',
                                'page'  => 'production/list',
                            ],
                            [
                                'title' => 'Üretim Listeleri (Listesiz)',
                                'page'  => 'production/list/without-listing',
                            ],
                            [
                                'title' => 'Laminoks',
                                'page'  => 'production/laminoks',
                            ],
                            [
                                'title' => 'Kağıt Kesim',
                                'page'  => 'production/paper',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'   => 'Satışlar',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Siparişler',
                        'page'        => 'order',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'order',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'   => 'İnsan Kaynakları',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Personeller',
                        'page'        => 'human-resource',
                        'bullet'      => 'dot',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'human-resource',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Medya',
            'root'  => true,
            'page'  => 'medya',
        ],

    ],

];
