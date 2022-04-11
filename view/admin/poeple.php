<?php

$imgroot = $_SESSION['imgroot'];

echo "<div class='dashboard'>
    <h1> <a href='/admin/picture/add' class='btn additems success'> <span class='material-icons-round'> add </span> </a> </h1>

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

$pictureDAO = new PictureDAO;
$pictureTagDAO = new PictureTagDAO;
$tagDAO = new TagDAO;

$pictures = $pictureDAO->fetchAll();
$tags = $pictureTagDAO->fetchAll();

foreach ($pictures as $key => $picture) {
    echo "
    <tbody>
        <tr>
            <td> <img src='$imgroot/img/$picture->_link' > </td>
            <td> $picture->_name </td>
            <td> $picture->_description </td>
            <td> $picture->_link </td>";

            echo "<td class='inline'>";
                //PICTURE CAN HAVE MULTIPLE TAGS
                    // foreach ($tags as $key => $tag) {
                    //     if ($tag->_pic === $picture->_id) {
                    //         $mytag = $tagDAO->fetch($tag->_tag);
                    //         echo "<p>$mytag->_name</p>";
                    //     }
                    // }
                //END
                
                //PICTURE CAN HAVE ONLY ONE TAG
                    $tag = $tagDAO->fetch($picture->_tag);
                    $tag = ($tag) ? $tag->_name : '' ;
                    echo $tag;
                //END

            echo "</td>";

    echo "
            <td>
                <input type='checkbox'";
                if ($picture->_sharable) {
                    echo "checked";
                }
            echo"
            disabled ></td>

            <td class=action with=500>
                <!-- <a class='btn validate' href='#'>See</a> -->
                <a class='btn success' href='/admin/picture/add/$picture->_id'>Edit</a>
                <a class='btn error' href='/admin/picture/delete/$picture->_id'>Delete</a>
            </td>
        </tr>
    </tbody>
";
}

echo "</table></div></main>";