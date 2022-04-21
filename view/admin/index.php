
<?php
if (!isset($_SESSION['logged'])) {
    echo "<script language='Javascript'>document.location.replace('/admin/login');</script>";
    die;

} else {
    $adminDAO = new AdminDAO;
    $adminConnected = $adminDAO->fetch($_SESSION['logged']);

    if (!$adminConnected) {
        session_start();
        session_unset();
        echo "<script language='Javascript'>setTimeout(function(){document.location.replace('/');},200);</script>";
        header('location /');
        die;
    }
}

echo "<div class='dashboard'>";

$root = $_SESSION['root'];

$basicinfo = new BasicInfoDAO;
$basicinfo = $basicinfo->fetchAll();

$pictureDAO = new PictureDAO; 
$pictures = $pictureDAO->fetchAll();

foreach ($basicinfo as $key => $value) {
    echo "
    <div class='dash-content'>
        <h2>$value->_name</h2>
        <h3>";
            if (is_numeric($value->_content)) {
                $picture = $pictureDAO->fetch($value->_content);
                echo "\"$picture->_name\"";
            } else {
                echo "\"$value->_content\"";
            }   
        echo "</h3>

        <form method='POST' action='/basicinfo/$value->_id/edit/' target='_self'>
            <label for='content'>New data : </label>";

            switch ($value->_name) {
                case 'Photographer About':
                    echo " <textarea id='content' name='content' required >$value->_content</textarea> ";
                    break;

                case "About Picture":
                case 'Contact Picture':

                    echo "Select an Image :
                    <select name='content' id='pictureSelect'>";
                    foreach ($pictures as $picture){
                            echo "<option value='$picture->_id'";

                            if ($value->_content == $picture->_id) {
                                echo "selected";
                            }

                            echo">$picture->_name</option>";
                    }
                    break;

                default:
                    echo " <input type='text' id='content' name='content' required > ";
                    break;
            }

    echo "
            <input type='number' name='id' value='$value->_id' required style='display:none'>

            <div class='submit'>
                <input class='btn validate' type='submit' value='Submit'>
                <a class='btn error' href='/basicinfo/$value->_id/delete'> Delete</a>
            </div>
        </form>
    </div>";
}

echo "</div> </main>";
?>