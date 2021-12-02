<?php
    // Function to Take all Tags
        function takeTags(){
            include('connection.php');
            $query = "SELECT * FROM tags ORDER BY tags_ID";

            try{
                $stmt = $db->prepare($query);
                $result = $stmt->execute();
            }

            catch(PDOException $ex){
                die("Failed query : " . $ex->getMessage());
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }
    //