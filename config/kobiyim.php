<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
 */

return [

    'name'      => env('KOBIYIM_NAME'),  

    'username'  => env('KOBIYIM_USERNAME'),

    'secret'    => env('KOBIYIM_SECRET'),

    'key'       => env('KOBIYIM_KEY'),

    'user_types' => [
        'admin' => 'Yönetici',
        'user'  => 'Kullanıcı'
    ]

];
