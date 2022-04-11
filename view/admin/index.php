
<?php
if(!isset($_SESSION['loggin'])){
    echo "<script language='Javascript'>document.location.replace('/admin/login');</script>";}
else{

    echo 'CONNECTED';
}

echo "<div class='dashboard'>";

$root = $_SESSION['root'];

$basicinfo = new BasicInfoDAO;
$basicinfo = $basicinfo->fetchAll();
// var_dump($basicinfo);

foreach ($basicinfo as $key => $value) {
    echo "
    <div class='dash-content'>
        <h2>$value->_name</h2>
        <h3>\"$value->_content\"</h3>

        <form method='POST' action='/basicinfo/$value->_id/edit/' target='_self'>
            <label for='content'>New data : </label>";

    if ($value->_name === 'Photographer About') {
        echo " <textarea id='content' name='content' required >$value->_content</textarea> ";
    } else {
        echo " <input type='text' id='content' name='content' required > ";
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