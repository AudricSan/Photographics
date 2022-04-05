<?php

$imgroot = $_SESSION['imgroot'];

echo "
    <div class='dashboard'>
        <form method='POST' action='' enctype='multipart/form-data' target='_self'>
            <label for='title'>Image Title :</label>
            <input type='text' id='title' name='title'>

            <label for='desc'>Image Description :</label>
            <input type='text' id='desc' name='desc'>

            <div>
                <p>Select Tags : </p>";

                
                // <div>
                //     <label for='tags1'>Tags1</label>
                //     <input type='checkbox' id='tags1' name='tags1' value='tags1'>
                // </div>

echo "
            </div>

            <label for='share'>Sharable</label>
            <input type='checkbox' class='switch' id='share' name='share' value='1'>

            <label for='file'>File:</label>
            <input type='file' id='file' name='file'>

            <input class='btn validate' type='submit' value='Submit'>
        </form>
    </div>
</div></main>";