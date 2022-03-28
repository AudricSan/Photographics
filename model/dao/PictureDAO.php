<?php

use photographics\Picture;
use photographics\Env;

class PictureDAO extends Env
{
    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct()
    {
        // Change the values according to your hosting.
        $this->username = parent::env('DB_USERNAME', 'root');     //The login to connect to the DB
        $this->password = parent::env('DB_PASSWORD', '');         //The password to connect to the DB
        $this->host =     parent::env('DB_HOST', 'localhost');    //The name of the server where my DB is located
        $this->dbname =   parent::env('DB_NAME');                 //The name of the DB you want to attack.
        $this->table =    "picture";                              // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $picture = array();

            foreach ($results as $result) {
                array_push($picture, $this->create($result));
            }

            return $picture;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE picture_id = ?");
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $this->create($result);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function create($result)
    {
        if (!$result) {
            return false;
        }

        // NOTE DUMP OF OBJECT CREATE
        // var_dump($result);
        return new Picture(
            $result['picture_id'],
            $result['picture_name'],
            $result['picture_description'],
            $result['picture_link'],
            $result['picture_tag'],
            $result['picture_sharable']
        );
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE picture_id = ?");
            $statement->execute([
                $id
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function store($data)
    {
        if (empty($data)) {
            return false;
        }

        $picture = $this->create([
            'picture_id' => 0,
            'picture_name' => $data['name'],
            'picture_description' => $data['desc'],
            'picture_link' => $data['link'],
            'picture_tag' => $data['tag'],
            'picture_sharable' => $data['share']
        ]);

        if ($picture) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (
                picture_name, picture_description, picture_link, picture_tag, picture_sharable) VALUES (?, ?, ?, ?, ?, ?)");
                $statement->execute([
                    $picture->_name,
                    $picture->_description,
                    $picture->_link,
                    $picture->_tag,
                    $picture->_sharable
                ]);

                $picture->id = $this->connection->lastInsertId();
                return $picture;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }

    public function update($id, $data)
    {
        if (empty($data)) {
            return false;
        }

        $picture = $this->create([
            "_id" => $id,
            '_name' => $data['name'],
            '_description' => $data['desc'],
            '_link' => $data['link'],
            '_tag' => $data['tag'],
            '_sharable' => $data['share'],
        ]);

        if ($picture) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET picture_name = ?, picture_description = ?, picture_link = ?, picture_tag = ?, picture_sharable = ? WHERE picture_id = ?");
                $statement->execute([
                    $picture->_name,
                    $picture->_description,
                    $picture->_link,
                    $picture->_tag,
                    $picture->_sharable,
                    $picture->_id
                ]);

                return $picture;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }
}
