<?php
// Take Only Name of Tags
    function takeNameTag(){
        $tags = takeTags();

        foreach ($tags as $key => $value){
            $tagsName[] = $value['Tags_Name'];
        }

        if(isset($tagsName)){
            return $tagsName;
        }else{
            return false;
        }
    }
//

// Check file Exist is not Create if
    function checkFilesExist(){
        $alltags  = takeNameTag();

        if ($alltags != false) {
            foreach ($alltags as $key => $value) {
                if (!file_exists("$value.php")) {

                    $newpage = fopen("$value.php", "w") or die("Unable to open file!");
                    $basiccode  = file_get_contents("../model/basic.txt");

                    fwrite($newpage, $basiccode);
                    fclose($newpage);
                }
            }
        }
    }
//

// If tag not Exist Remove files
    function removeOldTags(){
        $alltags  = takeNameTag();
        $existFile = scandir("view/php/", $sorting_order = SCANDIR_SORT_ASCENDING);
        $dir = "view/php/";

        foreach ($existFile as $key2 => $value2) {
            if ($value2 == "index.php" || $value2 == "include" || $value2 == "." || $value2 == "..") {
                echo "PAS TOUCHE" . '<br>';
            } else {
                $value2 = explode('.', $value2);
                $value2 = $value2[0];
                if (!in_array($value2, $alltags)) {
                    echo 'file delete cuz not exist in DB' . '<br>';
                    array_map('unlink', glob("{$dir}*$value2.php"));
                }
            }
        }
    }
//