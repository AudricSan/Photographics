<?php

if (!isset($_SESSION['logged'])) {
    echo "<script language='Javascript'>document.location.replace('/admin/login');</script>";
} else {
    $adminDAO = new AdminDAO;
    $adminConnected = $adminDAO->fetch($_SESSION['logged']);

    if (!$adminConnected) {
        echo "<script language='Javascript'>document.location.replace('/');</script>";
    }
}

if(isset($id)){
    $tagDao = new TagDAO;
    $tag = $tagDao->fetch($id);
}
echo "
    <div class='dashboard'>
        <form method='POST' action='";

        if(isset($tag)){
            echo"/admin/tag/edit";
        }else{
            echo"/admin/tag/create";
        }

        echo"'enctype='multipart/form-data' target='_self'>
            <label for='title'>Tag Title :</label>
            <input type='text' id='title' name='title'"; if (isset($tag)) {echo "value = '$tag->_name'";} echo"required>

            <label for='desc'>Tag Description :</label>
            <input type='text' id='desc' name='desc'"; if (isset($tag)) { echo "value = '$tag->_description'";} echo"required>";
        
            if (isset($tag)) {
               echo "<input type='number' name='tag_id' value='$tag->_id' style='display:none'></input>";
            }

        echo"<input class='btn validate' type='submit' value='Submit' required>
        </form>";
echo"</div></div></main>";