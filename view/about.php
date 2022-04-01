<section class='about'>
    <?php

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
    
    if ($_SESSION['basicinfo']['twitch'] != 'NULL')  {
        echo "<a href='https://www.twitch.tv/" . $_SESSION['basicinfo']['twitch']  . "' target='_BLANK'> <i class='fa-brands fa-twitch'></i> </a>";
    }
    
    if ($_SESSION['basicinfo']['twitter'] != 'NULL')  {
        echo "<a href='https://twitter.com/" . $_SESSION['basicinfo']['twitter']  . "' target='_BLANK'> <i class='fa-brands fa-twitter'></i> </a>";
    }
    
    if ($_SESSION['basicinfo']['linkedin'] != 'NULL')  {
        echo "<a href='https://twitter.com/" . $_SESSION['basicinfo']['linkedin']  . "' target='_BLANK'> <i class='fa-brands fa-linkedin'></i> </a>";
    }

    echo "
        </div>
";
    ?>

</section>