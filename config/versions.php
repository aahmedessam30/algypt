<?php

return [
    'api' => [
        'v1' => [
            ['file' => 'api', 'middleware' => ['api', 'auth:sanctum', 'role:user|guest|admin']],
        ]
    ],
    'web' => [
        'v1' => [
            ['file' => 'auth'],
            ['file' => 'site'],
            ['file' => 'admin', 'prefix' => 'admin', 'middleware' => ['web', 'auth', 'role:admin']],
        ]
    ]
];
