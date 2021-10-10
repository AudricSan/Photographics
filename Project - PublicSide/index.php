<?php
    //Include
        require('model/read.php');
        require('model/function.php');
    //

    //Check if page of tags Exist, If not create new page with code
        $alltags  = takeNameTag();
        foreach ($alltags as $key => $value){
            if(!file_exists("view/php/$value.php")){
                //Check Position
                    echo "File Not Exist";
                    var_dump($value);
                //

                $newpage = fopen("view/php/$value.php", "w") or die("Unable to open file!");
                $basiccode  = file_get_contents("model/basic.txt");

                fwrite($newpage, $basiccode);
                fclose($newpage);
            }
        }
    //

    // Redirecto to Correct Index
        header('location: view/php/index.php');
    //
?>