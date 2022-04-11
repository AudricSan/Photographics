<?php

$imgroot = $_SESSION['imgroot'];

echo "<div class='dashboard'>
    <h1> <a href='/admin/admin/add' class='btn additems success'> <span class='material-icons-round'> add </span> </a> </h1>

    <table>
    <thead>
        <tr>
            <th>Miniature</th>
            <th>Name</th>
            <th>Description</th>
            <th>File Name</th>
            <th>Tags</th>
            <th>Sharable</th>
            <th>Quick Action</th>
        </tr>
    </thead>
";

$adminDAO = new AdminDAO;
$roleDAO = new RoleDAO;

var_dump($adminDAO);
var_dump($roleDAO);

$admins = $adminDAO->fetchAll();
$roles = $roleDAO->fetchAll();

foreach ($admins as $key => $admin) {
    echo "
    <tbody>
        <tr>
            <td> <img src='$imgroot/img/$admin->_link' > </td>
            <td> $admin->_name </td>
            <td> $admin->_description </td>
            <td> $admin->_link </td>";

            echo "<td class='inline'>";
                //admin CAN HAVE MULTIPLE TAGS
                    // foreach ($tags as $key => $tag) {
                    //     if ($tag->_pic === $admin->_id) {
                    //         $mytag = $tagDAO->fetch($tag->_tag);
                    //         echo "<p>$mytag->_name</p>";
                    //     }
                    // }
                //END
                
                //admin CAN HAVE ONLY ONE TAG
                    $role = $roleDAO->fetch($admin->_role);
                    $role = ($role) ? $role->_name : '' ;
                    echo $role;
                //END

            echo "</td>";

    echo "
            <td>
                <input type='checkbox'";
                if ($admin->_sharable) {
                    echo "checked";
                }
            echo"
            disabled ></td>

            <td class=action with=500>
                <!-- <a class='btn validate' href='#'>See</a> -->
                <a class='btn success' href='/admin/admin/add/$admin->_id'>Edit</a>
                <a class='btn error' href='/admin/admin/delete/$admin->_id'>Delete</a>
            </td>
        </tr>
    </tbody>
";
}

echo "</table></div></main>";
