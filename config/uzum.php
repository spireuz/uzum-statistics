<?php

return [
    'base_url' => 'https://api.umarket.uz/api',
    'auth_type' => 'Basic',
    'auth_token' => env('UZUM_AUTH_TOKEN', ''),
    'x-iid' => env('UZUM_X_IID', ''),
    'lang' => [
        'current' => env('UZUM_LANG', 'uz-UZ'),
        'available' => [
            'uz' => 'uz-UZ',
            'ru' => 'ru-RU',
        ],
    ],
    'max-retry' => 2,
    'sleep' => 1000 // milliseconds
];
