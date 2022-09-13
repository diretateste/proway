<?php

return [
    'administrador' => [
        'type' => 1,
        'children' => [
            'create',
            'update',
            'delete',
            'index',
        ],
    ],
    'super' => [
        'type' => 1,
        'children' => [
            'create',
            'update',
            'index',
        ],
    ],
    'usuario' => [
        'type' => 1,
        'children' => [
            'create',
            'index',
        ],
    ],
    'create' => [
        'type' => 2,
    ],
    'update' => [
        'type' => 2,
    ],
    'delete' => [
        'type' => 2,
    ],
    'index' => [
        'type' => 2,
    ],
];
