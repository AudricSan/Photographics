<?php
session_start();
use photographics\env;
$env = new env;

//Meta Var//
$autor = 'Audric Rosier';
$description = 'Un site pour tous les photographe';
$keyword = 'SEO, keyword';

$imglink = $_SESSION['root'] . 'public/img';
if (!isset($_COOKIE['rootimg'])) {
    setcookie("rootimg", $imglink);
}

//TITLE//
if (!isset($title)) {
    $title = 'Photographics';
    $subtitle = 'Photographics';
}

//ANCHOR Meta html
echo "
<!DOCTYPE HTML>
    <html lang='en/us'>

    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>

        <title>$title</title>

        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <meta name='keywords' content='$keyword'>
        <meta name='description' content='$description'>
        <meta name='auteur' content='$autor'>

        <link rel='apple-touch-icon' sizes='180x180' href='img/ico/apple-touch-icon.png'>
        <link rel='icon' type='image/png' sizes='32x32' href='img/ico/favicon-32x32.png'>
        <link rel='icon' type='image/png' sizes='16x16' href='img/ico/favicon-16x16.png'>
        <link rel='manifest' href='img/ico/site.webmanifest'>
        <link rel='mask-icon' href='img/ico/safari-pinned-tab.svg' color='#5bbad5'>
        <meta name='apple-mobile-web-app-title' content='Photographics'>
        <meta name='application-name' content='Photographics'>
        <meta name='msapplication-TileColor' content='#ffffff'>
        <meta name='theme-color' content='#ffffff'>

        <link rel='stylesheet' type='text/css' href='css/colors.css' />
        <link rel='stylesheet' type='text/css' href='css/reset.css' />

        <link rel='stylesheet' type='text/css' href='css/header.css' />        
        <link rel='stylesheet' type='text/css' href='css/footer.css' />        
        <link rel='stylesheet' type='text/css' href='css/index.css' />

        <link rel='stylesheet' type='text/css' href='css/admin.css' />

        <!--icones importées-->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons+Round' rel='stylesheet'>
        <script src='https://kit.fontawesome.com/eb747bd21c.js' crossorigin='anonymous'></script>


    </head>
";

//ANCHOR Nav html
$nav = str_contains($title, "admin");

echo "
    <header>
    <nav>
        <figure id='logo'>
            <a href='/'><img src='img/logo.png' alt='Logo' title='Photographics Logo'></a>
        </figure>

        <ul>
            <li class='nava'> <a href='/'>Gallery</a> </li>
            <li class='nava'> <a href='/about'>About</a> </li>
            <li class='nava'> <a href='/contact'>Contact</a> </li>
        </ul>
    </nav>
    </header>
";