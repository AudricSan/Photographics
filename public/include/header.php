<?php
session_start();
use photographics\env;

//Meta Var//
$autor = 'Audric Rosier';
$description = 'Un site pour tous les photographe';
$keyword = 'SEO, keyword';


// var_dump($_SERVER);
$rootHost = 'http://' . $_SERVER['HTTP_HOST'];
$rootDoc = $_SERVER['DOCUMENT_ROOT'];
$_SESSION['root'] = $rootHost;
$_SESSION['rootDoc'] = $rootDoc;

// var_dump($root);
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

include('../model/class/BasicInfo.php');
include('../model/dao/BasicInfoDAO.php');
$basicinfoDAO = new BasicInfoDAO;

include('../model/class/Tag.php');
include('../model/dao/TagDAO.php');
$tagDAO = new TagDAO;

include("../model/class/Picture.php");
include("../model/dao/PictureDAO.php");

include("../model/class/PictureTag.php");
include("../model/dao/PictureTagDAO.php");
$pictureTagDAO = new PictureTagDAO; 

$basicinfo = $basicinfoDAO->fetchAll();

foreach($basicinfo as $key => $value){
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

        <!--icones importées-->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons+Round' rel='stylesheet'>
        <script src='https://kit.fontawesome.com/eb747bd21c.js' crossorigin='anonymous'></script>
        <script src='../js/error.js'></script>
    </head>
";

//ANCHOR Nav html

$title = explode($title, ' ');
$nav = in_array('admin', $title);

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

echo"</header>";