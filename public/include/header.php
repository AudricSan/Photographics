<?php
session_start();

use photographics\Admin;
use photographics\env;

//Meta Var//
$autor = 'Audric Rosier';
$description = 'Un site pour tous les photographe';
$keyword = 'SEO, keyword';

if (isset($_SERVER['HTTPS'])) {
    if ($_SERVER['HTTPS'] === 'on') {
        $rootHost = 'https://' . $_SERVER['HTTP_HOST'];
    } else {
        $rootHost = 'http://' . $_SERVER['HTTP_HOST'];
    }
} else {
    $rootHost = 'http://' . $_SERVER['HTTP_HOST'];
}

$rootDoc = $_SERVER['DOCUMENT_ROOT'];
$_SESSION['root'] = $rootHost;
$_SESSION['rootDoc'] = $rootDoc;

//CSS link//
$anim_css = $rootHost   . '/public/css/anim.css';
$style_css = $rootHost   . '/public/css/index.css';
$globals_css = $rootHost   . '/public/css/globals.css';

$colors = $rootHost . '/public/css/colors.css';
$reset  = $rootHost . '/public/css/reset.css';
$header = $rootHost . '/public/css/header.css';
$footer = $rootHost . '/public/css/footer.css';
$index  = $rootHost . '/public/css/index.css';
$admin  = $rootHost . '/public/css/admin.css';
$check  = $rootHost . '/public/css/checkbox.css';
$anim  = $rootHost . '/public/css/animation.css';

$px500  = $rootHost . '/public/css/500px.css';

$imglink = $rootHost . '/public/images';
$_SESSION['imgroot'] = $imglink;

if (!isset($_COOKIE['rootimg'])) {
    setcookie('rootimg', $imglink);
}

//TITLE//
if (!isset($title)) {
    $title = 'Photographics';
    $subtitle = 'Photographics';
}

include_once('../model/class/BasicInfo.php');
include_once('../model/dao/BasicInfoDAO.php');
$basicinfoDAO = new BasicInfoDAO;

include_once('../model/class/Tag.php');
include_once('../model/dao/TagDAO.php');
$tagDAO = new TagDAO;

include_once("../model/class/Picture.php");
include_once("../model/dao/PictureDAO.php");
$pictureDAO = new PictureDAO;

include_once("../model/class/PictureTag.php");
include_once("../model/dao/PictureTagDAO.php");
$pictureTagDAO = new PictureTagDAO;

include_once("../model/class/Admin.php");
include_once("../model/dao/AdminDAO.php");
$adminDAO = new AdminDAO;

include_once("../model/class/Role.php");
include_once("../model/dao/RoleDAO.php");
$adminDAO = new RoleDAO;

$basicinfo = $basicinfoDAO->fetchAll();

foreach ($basicinfo as $key => $value) {
    $_SESSION['basicinfo'][$value->_name] = $value->_content;
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

        <link rel='apple-touch-icon' sizes='180x180' href='$imglink/ico/apple-touch-icon.png'>
        <link rel='icon' type='image/png' sizes='32x32' href='$imglink/ico/favicon-32x32.png'>
        <link rel='icon' type='image/png' sizes='16x16' href='$imglink/ico/favicon-16x16.png'>
        <link rel='manifest' href='$imglink/ico/site.webmanifest'>
        <link rel='mask-icon' href='$imglink/ico/safari-pinned-tab.svg' color='#5bbad5'>
        <meta name='apple-mobile-web-app-title' content='Photographics'>
        <meta name='application-name' content='Photographics'>
        <meta name='msapplication-TileColor' content='#ffffff'>
        <meta name='theme-color' content='#ffffff'>

        <link rel='stylesheet' type='text/css' href='$colors' />
        <link rel='stylesheet' type='text/css' href='$reset' />
        <link rel='stylesheet' type='text/css' href='$check' />
        <link rel='stylesheet' type='text/css' href='$anim' />

        <link rel='stylesheet' type='text/css' href='$header' />        
        <link rel='stylesheet' type='text/css' href='$footer' />        
        <link rel='stylesheet' type='text/css' href='$index' />

        <link rel='stylesheet' type='text/css' href='$admin' />

        <link rel='stylesheet' type='text/css' href='$px500' />

        <!--icones importées-->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons+Round' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css' />
        <script src='https://kit.fontawesome.com/eb747bd21c.js' crossorigin='anonymous'></script>
        <script src='../js/error.js'></script>
    </head>
";

//ANCHOR Nav html
$tag = $tagDAO->fetchAll();

echo "
    <header>
    <nav>
        <figure id='logo'>
            <a href='/'><img src='$imglink/logo.png' alt='Logo' title='Photographics Logo'></a>
        </figure>

        <ul>
            <li class='nava'> <a href='/'>Gallery</a> </li>";
foreach ($tag as $tag) {
    $pictureTag = $pictureTagDAO->fetch($tag->_id);
    $cpt = count($pictureTag);

    if ($cpt > 5) {
        echo "<li role='presentation'><a href='$tag->_id'>$tag->_name</a></li>";
    }
};

echo "
        <li class='nava'> <a href='/about'>About</a> </li>
        <li class='nava'> <a href='/contact'>Contact</a> </li>
    </ul>
</nav>";

echo "</header>";
