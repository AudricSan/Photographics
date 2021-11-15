<?php
    //Include
        session_start();

        require('model/read.php');
        require('model/function.php');

        $serverRoot = $_SERVER['DOCUMENT_ROOT'];        
        $rootDir = __DIR__;
        $rootDir = str_ireplace("\\", '/', $rootDir );

        $_SESSION['ServerRoot'] = $serverRoot;
        $_SESSION['RootDir'] = $rootDir;
    //

    //Check if page of tags Exist, If not create new page with code
        $alltags  = takeNameTag();

        if ($alltags != false) {
            foreach ($alltags as $key => $value) {
                if (!file_exists("$rootDir/view/php/$value.php")) {

                    $newpage = fopen("$rootDir/view/php/$value.php", "w") or die("Unable to open file!");
                    $basiccode  = file_get_contents("$rootDir/model/basic.txt");

                    fwrite($newpage, $basiccode);
                    fclose($newpage);
                }
            }
        }
    //

    // If tag not Exist Remove files
        $existFile = scandir("$rootDir/view/php/", $sorting_order = SCANDIR_SORT_ASCENDING);
        $dir = "$rootDir/view/php/";

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
    //

    // Redirecto to Correct Index
        header('location: view/php/index.php');
    //
?>