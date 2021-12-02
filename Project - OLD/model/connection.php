<?php
    // Change the values according to your hosting.
        $username = "root";     //The login to connect to the DB
        $password = "";         //The password to connect to the DB
        $host = "localhost";    //The name of the server where my DB is located
        $dbname = "photographics";    //The name of the DB you want to attack.

    //DON'T TOUCH IT YOU LITTLE PRICK
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
        }
        catch(PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>