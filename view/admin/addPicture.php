<?php

use photographics\PictureTag;


if (!isset($_SESSION['logged'])) {
    echo "<script language='Javascript'>document.location.replace('/admin/login');</script>";
} else {
    $adminDAO = new AdminDAO;
    $adminConnected = $adminDAO->fetch($_SESSION['logged']);

    if (!$adminConnected) {
        echo "<script language='Javascript'>document.location.replace('/');</script>";
    }
}

$tagDao = new TagDAO;
$tags = $tagDao->fetchAll();

if(isset($id)){
    $pictureDAO = new PictureDAO;
    $picture = $pictureDAO->fetch($id);

    $pictureTagDAO = new PictureTagDAO;
    $pictureTags = $pictureTagDAO->fetchByPic($id);

    $imgroot = $_SESSION['imgroot'];
}

echo "
    <div class='dashboard'>
        <form method='POST' action='";
        if(isset($id)){
            echo"/admin/picture/edit";
        }else{
            echo"/admin/picture/create";
        }
        echo"'enctype='multipart/form-data' target='_self'>
            <label for='title'>Image Title :</label>
            <input type='text' id='title' name='title'"; if (isset($picture)) {echo "value = '$picture->_name'";} echo"required>

            <label for='desc'>Image Description :</label>
            <input type='text' id='desc' name='desc'"; if (isset($picture)) { echo "value = '$picture->_description'";} echo"required>

            <div>
                <p>Select Tags : </p>";
                foreach ($tags as $tag){
                    //PICTURE CAN HAVE MULTIPLE TAGS
                        // echo "  <div>
                        //             <label for='$tag->_id'>$tag->_name</label>
                        //             <input type='checkbox' id='$tag->_id' name='tag_$tag->_id' value='$tag->_id'"; 

                        //             foreach ($pictureTags as $pictureTag){
                        //                 if($pictureTag->_tag == $tag->_id){
                        //                     echo "checked";
                        //                 } 
                        //             }
                            
                        // echo"></div>";
                    //END

                    //PICTURE CAN HAVE ONLY ONE TAG
                        echo "  <div>
                                    <label for='$tag->_id'>$tag->_name</label>
                                    <input required type='radio' id='$tag->_id' name='tag' value='$tag->_id'";

                                if (isset($picture)) {
                                    if ($picture->_tag == $tag->_id) {
                                        echo "checked";
                                    }
                                }
                        echo"   ></div>";
                    //END
                }

echo "
            </div>

            <label for='share'>Sharable</label>
            <input type='checkbox' class='switch' id='share' name='share'";if (isset($picture)) {if ($picture->_sharable === 1){echo 'checked';}}echo ">";

            if (!isset($picture)) {
                echo "
                <label for='file'>File:</label>
                <input type='file' id='file' name='file' required>";
            }else{
                echo "
                <div class='img'><img src='$imgroot/img/$picture->_link' ></div>
                <input type='number' name='picture_id' value='$picture->_id' style='display:none'></input>
                <input type='text' name='link' value='$picture->_link' style='display:none'></input>";
                // var_dump($picture);
            }

echo"
            <input class='btn validate' type='submit' value='Submit' required>
        </form>";
echo"</div></div></main>";