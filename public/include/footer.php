<?php

use photographics\env;

$env = new env;

$imglink = $_SESSION['imgroot'];

$photographerName = $_SESSION['basicinfo']['Photographer Name'];
$photographerDesc = $_SESSION['basicinfo']['Photographer About'];

echo "
    <footer>
        <img class='divider' src='$imglink/divider.png'>

        <div class='footer'>
            <div class='footerleft'>
                <figure> <a href='/'> <img src='$imglink/logo.png' alt='Logo'> </a> </figure>
                <h3> <a href='/about'> $photographerName </a> </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. rovident fugit iure vel reprehenderit
                    laboriosam amet nihil non olestiae bcaecati ut. Similique istinctio, quibusdam nisi qui quaerat
                    oluptas! Pariatur, temporibus vel. </p>
            </div>

            <img class='divider' src='$imglink/divider2.png'>

            <div class='footerright'>
                <div class='row'>
                    <div>
                        <h3> Photographics </h3>
                        <ul>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
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
