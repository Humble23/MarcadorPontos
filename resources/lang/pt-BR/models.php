<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom Models Attributes
    |--------------------------------------------------------------------------
    */

    'App\\User' => [
        'attributes' => [
            'name' => 'nome',
            'email' => 'email',
            'role' => 'papel',
            'users' => 'usuarios',
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Default Model Attributes
    |--------------------------------------------------------------------------
    */

    'default' => [
        'attributes' => [
            'id'                  => 'id',
            'name'                => 'nome',
            'users'               => 'usuários',
            'dashboard'           => 'dashboard',
        ],
    ],
];