<?php

$imgroot = $_SESSION['imgroot'];

echo "<div class='dashboard'>
    <h1><a href='#' class='btn additems success'><span class='material-icons-round'>add</span></a></h1>

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

include("../model/class/Picture.php");
include("../model/dao/PictureDAO.php");
$pictureDAO = new PictureDAO;

include("../model/class/PictureTag.php");
include("../model/dao/PictureTagDAO.php");
$pictureTagDAO = new PictureTagDAO;

include("../model/class/Tag.php");
include("../model/dao/TagDAO.php");
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

            echo "<td>";
            foreach ($tags as $key => $tag) {
                if ($tag->_pic === $picture->_id) {
                    $mytag = $tagDAO->fetch($tag->_tag);
                    echo "<p>$mytag->_name</p>";
                }
            }
            echo "</td>";

    echo "
            <td>
                <input type='checkbox'";
                if ($picture->_sharable) {
                    echo "checked";
                }
            echo"
            ></td>

            <td class=action with=500>
                <a class='btn validate' href='#'><span class='glyphicon glyphicon-eye-open'></span> See</a>
                <a class='btn success' href='#'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                <a class='btn error' href='#'><span class='glyphicon glyphicon-trash'></span> Delete</a>
            </td>
        </tr>
    </tbody>
";
}

echo "</table></div></main>";
