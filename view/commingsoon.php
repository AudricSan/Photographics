
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

echo "<div class='dashboard'>
        <div class='comming'>
            <h2>Coming soon!</h2>
            <p>
                this feature is not yet available in this version of \"Photographics\".
                please refer to the change-log and the Road map for more information
            </p>
        </div>
    </div>
</main>";
?>