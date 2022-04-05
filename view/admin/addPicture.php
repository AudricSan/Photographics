<?php

$tagDao = new TagDAO;
$tags = $tagDao->fetchAll();


echo "
    <div class='dashboard'>
        <form method='POST' action='/admin/picture/create' enctype='multipart/form-data' target='_self'>
            <label for='title'>Image Title :</label>
            <input type='text' id='title' name='title' required>

            <label for='desc'>Image Description :</label>
            <input type='text' id='desc' name='desc' required>

            <div>
                <p>Select Tags : </p>";
                foreach ($tags as $tag){
                    echo "
                        <div>
                            <label for='$tag->_id'>$tag->_name</label>
                            <input type='checkbox' id='$tag->_id' name='tag_$tag->_id' value='$tag->_id'>
                        </div>";
                }

echo "
            </div>

            <label for='share'>Sharable</label>
            <input type='checkbox' class='switch' id='share' name='share'>

            <label for='file'>File:</label>
            <input type='file' id='file' name='file' required>

            <input class='btn validate' type='submit' value='Submit' required>
        </form>
    </div>
</div></main>";