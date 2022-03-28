<?php
namespace photographics;
class env
{
    private $env = [
        //APP
        'APP_NAME' => 'photographics',
        'APP_KEY' => '',

        //DATABASE
        'DB_HOST' => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => 'root',
        'DB_NAME' => 'photographics',
        'DB_PORT' => 3306,

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
