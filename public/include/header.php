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

        <!-- <link rel='stylesheet' type='text/css' href='css/reset.css' /> -->
        <link rel='stylesheet' type='text/css' href='$globals_css' media='screen' />
        <link rel='stylesheet' type='text/css' href='$style_css' media='screen' />
        <link rel='stylesheet' type='text/css' href='$anim_css' media='screen' />

        <!--icones importées-->
        <script src='https://kit.fontawesome.com/3d76d9e733.js' crossorigin='anonymous'></script>
        <!--<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>-->
    </head>
";

//ANCHOR Nav html
$nav = str_contains($title, "admin");

if ($nav === false) {
    echo "
        <!-- ANCHOR NOT LOGGED NAV --> 
        <body>
        <div class='open'></div>
        <header id='header'>
            <nav>
                <figure id='logo'><a href='/'><img src='$imglink/logo.png' alt='Logo' title='Entremonde ASBL Logo''></a></figure>
                <ul class='navigation'>
                    <li><a href='/view/about'>About Us</a></li>
                    <li><a href='/view/activities'>Activities</a></li>
                    <li><a href='/view/contact'>Contact</a></li>
                    <li><a href='/view/gallery'>Gallery</a></li>";

                    foreach($slugs as $slug => $entry) {
                        echo '<li><a href="'.BASEPATH.'my-blog-articles/'.$slug.'">'.$entry.' (auto generated)</a></li>';
                    }
                
    echo        "</ul>

                <ul class='navigation'>
                    <li><a href='/user/login'> Connection </a></li>
                    <li><a href='/view/insciption'> Inscription </a></li>
                </ul>
            </nav>
        </header>
        <div class='container'>
    ";
} else {
    echo "
        <!-- ANCHOR ADMIN LOGGED NAV --> 
        <body>
        <div class='open'></div>
        <header id='header'>
            <nav>
            <figure id='logo'><a href='/admin'><img src='$imglink/logo.png' alt='Logo' title='Entremonde ASBL Logo''></a></figure>
                <ul class='navigation'>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                </ul>

                <ul class='navigation'>
                    <li><a href='/admin/disc'> Disconnect </a></li>
                    <li><a href='/admin/new'> Add new Admin </a></li>
                </ul>
            </nav>
        </header>
        <div class='container'>
    ";
}
