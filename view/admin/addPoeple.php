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
    $adminDAO = new AdminDAO;
    $admin = $adminDAO->fetch($id);
}

$roleDAO = new RoleDAO;
$roles = $roleDAO->fetchAll();

echo "
    <div class='dashboard'>
        <form method='POST' action='";

        if(isset($admin)){
            echo"/admin/admin/edit";
        }else{
            echo"/admin/admin/create";
        }

        echo"' enctype='multipart/form-data' target='_self'>
            <label for='name'>Name :</label>
            <input type='text' id='name' name='name'"; if (isset($admin)) {echo "value = '$admin->_name'";} echo"required>

            <label for='mail'>Mail :</label>
            <input type='mail' id='mail' name='mail'"; if (isset($admin)) { echo "value = '$admin->_mail'";} echo"required>
            
            <label for='pass'>Password :</label>
            <i class='bi bi-eye-slash' id='togglePassword'></i>
            <input type='password' id='pass' name='pass'"; if (isset($admin)) {echo "value = '$admin->_password'";} echo"required>

            <div>
                <p>Select Tags : </p>";
                foreach ($roles as $role){
                        echo "  <div>
                                    <label for='$role->_id'>$role->_name</label>
                                    <input required type='radio' id='$role->_id' name='role' value='$role->_id'";

                                if (isset($picture)) {
                                    if ($picture->_role == $role->_id) {
                                        echo "checked";
                                    }
                                }
                        echo"   ></div>";
                    //END
                }
  echo "         </div>";
        
            if (isset($admin)) {
               echo "<input type='number' name='admin_id' value='$admin->_id' style='display:none'></input>";
            }

        echo"<input class='btn validate' type='submit' value='Submit'>
        </form>";
echo"</div></div></main>";

echo"
    <script>
        console.log('HelloWolrd, Toggle password');

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#pass');

        togglePassword.addEventListener('click', function () {
            console.log('cc')
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // toggle the icon
            this.classList.toggle('bi-eye');
        });
    </script>";