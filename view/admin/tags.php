<?php

$imgroot = $_SESSION['imgroot'];

echo "<div class='dashboard'>
    <h1> <a href='/admin/tag/add' class='btn additems success'> <span class='material-icons-round'> add </span> </a> </h1>

    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quick Action</th>
        </tr>
    </thead>
";

$tagDAO = new TagDAO;
$tags = $tagDAO->fetchAll();

foreach ($tags as $key => $tag) {
    echo "
    <tbody>
        <tr>
            <td> $tag->_name </td>
            <td> $tag->_description </td>

            <td class=action with=500>
                <!-- <a class='btn validate' href='#'>See</a> -->
                <a class='btn success' href='/admin/tag/add/$tag->_id'>Edit</a>
                <a class='btn error' href='#'>Delete</a>
            </td>
        </tr>
    </tbody>
";
}

echo "</table></div></main>";
