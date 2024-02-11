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
            'title'   => 'Sistem',
            'root'    => true,
            'toggle'  => 'click',
            'can'     => 'system-menusu',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Aktiviteler',
                        'root'        => true,
                        'page'        => 'system/activity',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'activity',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Kullanıcılar',
                        'page'        => 'system/user',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'user',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'İzinler',
                        'page'        => 'system/permission',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'permission',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

];
