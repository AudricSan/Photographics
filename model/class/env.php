<?php

namespace photographics;

class env
{
    private $env = [
        //APP
        'APP_NAME' => 'Entremonde',
        'APP_KEY' => '',

        //DATABASE
        'DB_HOST' => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => 'root',
        'DB_NAME' => 'entremonde',
        'DB_PORT' => 3306,

        //SOCIAL
        'SOCIAL' => [
            'SOCIAL' => True,
            'Facebook' => 'https://www.facebook.com/ASBLEntremonde/',
            'Instagram' => 'https://www.facebook.com/ASBLEntremonde/photos/?ref=page_internal'
        ]

    ];

    public function env($key, $default = null)
    {
        if ($key) {
            return $this->env[$key];
        } else {
            return $default;
        }
    }
}
