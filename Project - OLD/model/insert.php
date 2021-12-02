<?php
    /* Function to Insert Exemple */
        function insertuser ($userCoin){
            include("connection.php");
            
            $query = "INSERT INTO users (Users_Coins) VALUES (:coins)";
            $query_params = array(":coins" => $userCoin);
            
            try{
                $stmt = $db -> prepare($query);
                $result = $stmt -> execute($query_params);
            }
            
            catch(PDOException $ex){
                die("Failed query : " . $ex -> getMessage());
            }
        }
    /**/

    