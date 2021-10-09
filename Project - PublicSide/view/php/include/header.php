<?php
require('../../model/read.php');
require('../../model/function.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Photographics - TFE</title>
    <meta charset="UTF-8">
    <meta name="description" content="A photo website for anyone">
    <meta name="author" content="Audric Rosier">

    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->

    <!-- Fav and touch icons -->

</head>

<body>
    <div class="navbar">
        <a class="brand" href="http://127.0.0.7/Project%20-%20PublicSide">Photographics</a>

        <?php
            $alltags  = takeNameTag();
        ?>


        <ul class="nav">
            <li class="active"><a href="#">Home</a></li>

            <li class="menu-deroulant">
                <a href="#">Gallerie</a>
                <ul class="sous-menu">

                <?php
                    foreach ($alltags as $key => $value){
                        echo("<li><a href=#>$value</a></li>");
                    }
                ?>

                </ul>
            </li>
            
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>

    <div id="container">