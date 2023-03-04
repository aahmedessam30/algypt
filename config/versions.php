<?php

/*
|--------------------------------------------------------------------------
| API Versions
|--------------------------------------------------------------------------
|
| Here the API versions are defined. The API version is the first part of the URL.
| For example, if the API version is v1, the URL will be http://example.com/api/v1/...
|
*/
return [
    'v1' => [
        'api' => [
            ['file' => 'api'],
        ],
        'web' => [
            ['file' => 'auth'],
            ['file' => 'site'],
            ['file' => 'admin', 'prefix' => 'admin', 'middleware' => ['web', 'auth:admin', 'role:admin']],
        ]
    ]
];
