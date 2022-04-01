
<?php
echo "<div class='dashboard'>";

$root = $_SESSION['root'];
include("../model/class/BasicInfo.php");
include("../model/dao/BasicInfoDAO.php");

$basicinfo = new BasicInfoDAO;
$basicinfo = $basicinfo->fetchAll();
// var_dump($basicinfo);

foreach ($basicinfo as $key => $value) {
echo "
    <div class='dash-content'>
        <h2>$value->_name</h2>
        <h3>\"$value->_content\"</h3>

        <form method='POST' action='/basicinfo/$value->_id/edit/' target='_self'>
            <label for='content'>New data : </label>
            <input type='text' id='content' name='content' required >
            <input class='btn validate' type='submit' value='Submit'>
        </form>
    </div>";
}

echo "</div> </main>";
?>