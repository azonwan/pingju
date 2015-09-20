<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => [
        'GitHub' => [
            'client_id'     => getenv('client_id'),
            'client_secret' => getenv('client_secret'),
            'scope'         => ['user:email'],
        ],
        'Douban' => [
            'client_id'     => getenv('client_id'),
            'client_secret' => getenv('client_secret'),
            'scope'         => ['user:email'],
        ],
        'Qq' => [
            'client_id'     => getenv('client_id'),
            'client_secret' => getenv('client_secret'),
            'scope'         => ['user:email'],
        ],
        'Weibo' => [
            'client_id'     => getenv('client_id'),
            'client_secret' => getenv('client_secret'),
            'scope'         => ['user:email'],
        ],
    ],

];
