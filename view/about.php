<section class='about'>
    <?php

use photographics\BasicInfo;

    $root = $_SESSION['root'];

    $photographerName = $_SESSION['basicinfo']['Photographer Name'];
    $photographerDesc = $_SESSION['basicinfo']['Photographer About'];

    $photographerDesc = explode('.', $photographerDesc);

    echo "  <div class='about'>
        <h2>$photographerName</h2>";

    foreach ($photographerDesc as $key => $value) {
        if (!empty($value)) {
            echo "<p>$value" . ".</p>";
        }
    }

    if ($_SESSION['basicinfo']['facebook'] != 'NULL') {
        echo "<a href='https://www.facebook.com/" . $_SESSION['basicinfo']['facebook']  . "' target='_BLANK'> <i class='fa-brands fa-facebook'></i> </a>";
    }

    if ($_SESSION['basicinfo']['instagram'] != 'NULL') {
        echo "<a href='https://www.instagram.com/" . $_SESSION['basicinfo']['instagram']  . "' target='_BLANK'> <i class='fa-brands fa-instagram'></i> </a>";
    }

    if ($_SESSION['basicinfo']['twitch'] != 'NULL') {
        echo "<a href='https://www.twitch.tv/" . $_SESSION['basicinfo']['twitch']  . "' target='_BLANK'> <i class='fa-brands fa-twitch'></i> </a>";
    }

    if ($_SESSION['basicinfo']['twitter'] != 'NULL') {
        echo "<a href='https://twitter.com/" . $_SESSION['basicinfo']['twitter']  . "' target='_BLANK'> <i class='fa-brands fa-twitter'></i> </a>";
    }

    if ($_SESSION['basicinfo']['linkedin'] != 'NULL') {
        echo "<a href='https://twitter.com/" . $_SESSION['basicinfo']['linkedin']  . "' target='_BLANK'> <i class='fa-brands fa-linkedin'></i> </a>";
    }

    echo "</div>"; 

    $basicinfoDAO = new BasicInfoDAO;
    $basicInfo = $basicinfoDAO->fetchAll();
    // var_dump($basicInfo);
    
    foreach($basicInfo as $key => $value){        
        if ($value->_name === 'About Picture') {
            $pictureDAO = new PictureDAO; 
            $picture = $pictureDAO->fetch($value->_content);
        }
    }

    ?>
</section>

<script>
    var ImgRoot = "<?php echo $_SESSION['imgroot']; ?>";
    var img = "<?php echo $picture->_link; ?>";
    const section = document.getElementsByTagName('section');

    ImgRoot = ImgRoot + "/img/";
    link = ImgRoot + img;

    section[0].style.backgroundImage = 'url(' + link + ')';
    console.log(section)
    console.log(link)
</script>