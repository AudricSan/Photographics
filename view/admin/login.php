<?php

$imgroot = $_SESSION['imgroot'];

echo "
<section class='login'>
    <div class='login'>
        <img src='$imgroot/logoadmin.png' alt='Photographics Admin Logo'>

        <form method='POST' action='/admin/log'>
            <h2> Login Form</h2>
            <label for='login'> login:</label>
            <input type='text' id='login' name='login'>

            <label for='pass'> password:</label>
            <input type='password' id='pass' name='pass'>

            <input type='submit' value='Submit'>
        </form>
    </div>
</section>";