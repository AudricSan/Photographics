<?php

use photographics\env;

$env = new env;

$imglink = $_SESSION['imgroot'];

$photographerName = $_SESSION['basicinfo']['Photographer Name'];

include_once('../model/class/Tag.php');
include_once('../model/dao/TagDAO.php');

include_once("../model/class/PictureTag.php");
include_once("../model/dao/PictureTagDAO.php");

$pictureTagDAO = new PictureTagDAO; 
$tagDAO = new TagDAO;
$tag = $tagDAO->fetchAll();

echo "
    <footer>
        <img class='divider 1' src='$imglink/divider.png'>

        <div class='footer'>
            <div class='footerleft'>
                <figure> <a href='/'> <img src='$imglink/logo.png' alt='Logo'> </a> </figure>
                <h3> <a href='/about'> $photographerName </a> </h3>
                <p>
                    Photographics is a free and open source project for photographers who want to swiftly submit their photos to the internet.
                    This project seeks to make managing your photographs as simple and quick as possible. </br>
                    It gives the photographer total control over his images by allowing him to tag and share them.
                    </br></br> Photographics is an open source project that is completely free!
                    </br> A site where you may save all of your images in one location. </p>
            </div>

            <img class='divider 2' src='$imglink/divider2.png'>

            <div class='footerright'>
                <div class='row'>
                    <div>
                        <h3> Photographics </h3>
                        <ul>
                            <li> <a href='/'>Gallery</a> </li>";
                            foreach ($tag as $tag) {
                                $pictureTag = $pictureTagDAO->fetch($tag->_id);
                                $cpt = count($pictureTag);
                
                                if ($cpt > 5) {
                                    echo "<li role='presentation'><a href='$tag->_id'>$tag->_name</a></li>";
                                }
                            };
                    echo "
                        </ul>
                    </div>

                    <div>
                        <h3> $photographerName </h3>
                        <ul>
                            <li><a href='/about'>About</a></li>
                            <li><a href='/contact'>Contact</a></li>";

                            if ($_SESSION['basicinfo']['facebook'] != 'NULL') {
                                echo "<li><a href='https://www.facebook.com/" . $_SESSION['basicinfo']['facebook']  . "' target='_BLANK'> Facebook </a></li>";
                            }
                            
                            if ($_SESSION['basicinfo']['instagram'] != 'NULL') {
                                echo "<li><a href='https://www.instagram.com/" . $_SESSION['basicinfo']['instagram']  . "' target='_BLANK'> Instagram </a></li>";
                            }
                            
                            if ($_SESSION['basicinfo']['twitch'] != 'NULL')  {
                                echo "<li><a href='https://www.twitch.tv/" . $_SESSION['basicinfo']['twitch']  . "' target='_BLANK'> Twitch </a></li>";
                            }
                            
                            if ($_SESSION['basicinfo']['twitter'] != 'NULL')  {
                                echo "<li><a href='https://twitter.com/" . $_SESSION['basicinfo']['twitter']  . "' target='_BLANK'> Twitter </a></li>";
                            }
                            
                            if ($_SESSION['basicinfo']['linkedin'] != 'NULL')  {
                                echo "<li><a href='https://twitter.com/" . $_SESSION['basicinfo']['linkedin']  . "' target='_BLANK'> Linkedin </a></li>";
                            }

            echo   "</ul>
                    </div>
                </div>

                <div class='copy'>
                    <p> <a href='https://github.com/AudricSan/Photographics' target='_blank'> &copy;Photographics Project - 2021 </a> </p>
                    <a href='/privacy'>Privacy-Terms</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src='js/nav.js'></script>
    <script src='js/love.js'></script>
    <script src='js/share.js'></script>
";
