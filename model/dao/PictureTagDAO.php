<?php
use photographics\PictureTag;
use photographics\Env;

class PictureTagDAO extends Env
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
        $this->table =    "picturetag";                                // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $picturetag = array();

            foreach ($results as $result) {
                array_push($picturetag, $this->create($result));
            }

            return $picturetag;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE pt_id = ?");
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
        return new PictureTag(
            $result['pt_id'],
            $result['pt_picture'],
            $result['pt_tag']
        );
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE pt_id = ?");
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

        $picturetag = $this->create([
            "pt_id" => 0,
            'pt_picture'  => $data['picture'],
            'pt_tag'  => $data['tag']
        ]);

        if ($picturetag) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (pt_picture, pt_tag) VALUES (?, ?)");
                $statement->execute([
                    $picturetag->_picture,
                    $picturetag->_tag
                ]);

                $picturetag->_id = $this->connection->lastInsertId();
                return $picturetag;
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

        $picturetag = $this->create([
            "_id" => $id,
            '_picture' => $data['picture'],
            '_tag' => $data['tag']
        ]);

        if ($picturetag) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET pt_picture = ?, pt_tag = ?, WHERE pt_id = ?");
                $statement->execute([
                    $picturetag->_picture,
                    $picturetag->_tag,
                    $picturetag->_id
                ]);

                return $picturetag;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }
}
