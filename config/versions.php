<?php

return [
    'v1' => [
        'api' => [
            ['file' => 'api'],
        ],
        'web' => [
            ['file' => 'auth'],
            ['file' => 'site'],
            ['file' => 'admin', 'prefix' => 'admin', 'middleware' => ['web', 'auth', 'role:admin']],
        ]
    ]
];
