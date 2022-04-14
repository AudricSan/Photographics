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
        'DB_PORT' => 3306

        // 'DB_HOST' => 'audricldatabase.mysql.db',
        // 'DB_USERNAME' => 'audricldatabase',
        // 'DB_PASSWORD' => '297Hne7Y77',
        // 'DB_NAME' => 'audricldatabase',
        // 'DB_PORT' => 3306,
    ];

    public function env($key, $default = null)
    {
        if ($key) {
            return $this->env[$key];
        } else {
            return $default;
        }
    }

    public function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
}
