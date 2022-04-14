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

$imgroot = $_SESSION['imgroot'];

echo "<div class='dashboard'>
    <h1> <a href='/admin/admin/add' class='btn additems success'> <span class='material-icons-round'> add </span> </a> </h1>

    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Role</th>
            <th>Quick Action</th>
        </tr>
    </thead>
";

$adminDAO = new AdminDAO;
$roleDAO = new RoleDAO;

$admins = $adminDAO->fetchAll();
$roles = $roleDAO->fetchAll();

foreach ($admins as $key => $admin) {
    echo "
    <tbody>
        <tr>
            <td> $admin->_name </td>
            <td> $admin->_mail </td>
            <td>";        
                //admin CAN HAVE ONLY ONE TAG
                    $role = $roleDAO->fetch($admin->_role);
                    $role = ($role) ? $role->_name : '' ;
                    echo $role;
            echo "</td>";

    echo "
            <td class=action>
                <!-- <a class='btn validate' href='#'>See</a> -->
                <a class='btn success' href='/admin/admin/add/$admin->_id'>Edit</a>
                <a class='btn error' href='/admin/admin/delete/$admin->_id'>Delete</a>
            </td>
        </tr>
    </tbody>
";
}

echo "</table></div></main>";

if(!empty($_SESSION['error']['admin'])){
    // var_dump($_SESSION);
    $errors = $_SESSION['error']['admin'];
    echo "<div class='error'>";
    foreach($errors as $error){
        echo "<p>$error</p>";
    }    

    echo " <a href='#' onclick = 'error(this, event)' class='btn validate'> OK </a>";
    unset($_SESSION['error']['admin']);
    echo "</div>";
}