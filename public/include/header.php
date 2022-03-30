<?php
session_start();
use photographics\env;
$env = new env;

// var_dump($_SERVER);
$root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
$_SESSION['root'] = $root;

//CSS link//
$anim_css = $root   . 'public/css/anim.css';
$style_css = $root   . 'public/css/index.css';
$globals_css = $root   . 'public/css/globals.css';

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

        <link rel='stylesheet' type='text/css' href='css/reset.css' />
        <link rel='stylesheet' type='text/css' href='css/footer.css' />
        <link rel='stylesheet' type='text/css' href='css/header.css' />
        <link rel='stylesheet' type='text/css' href='css/index.css' />
        <link rel='stylesheet' type='text/css' href='css/gallery.css' />

        <!--icones importées-->
        <script src='https://kit.fontawesome.com/eb747bd21c.js' crossorigin='anonymous'></script>
    </head>
";

//ANCHOR Nav html
$nav = str_contains($title, "admin");

echo "
    <header>
    <nav>
        <figure id='logo'>
            <a href='#'><img src='img/logo.png' alt='Logo' title='Entremonde ASBL Logo'></a>
        </figure>

        <ul>
            <li class='nava'> <a href='#'>link1 </a> </li>
            <li class='nava'> <a href='#'>link2 </a> </li>
            <li class='nava'> <a href='#'>link3 </a> </li>
            <li class='nava'> <a href='#'>link4 </a> </li>
        </ul>
    </nav>
    </header>

    <div class='title'>
        <h2>$title</h2>
        <h3>$subtitle</h3>
    </div>
";