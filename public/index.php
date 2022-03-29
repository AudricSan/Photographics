<?php

// NOTE Use this namespace

use photographics\Route;

// NOTE Include class
include '../model/class/Route.php';
include '../model/class/env.php';

// NOTE Define a global basepath
define('BASEPATH', '/');

// NOTE Lets define some slugs for automatic route and headgation generation
// See examples below
$slugs = ['article-1' => 'Article 1', 'article-2' => 'Article 2', 'article-3' => 'Article 3'];

// NOTE This function just renders a simple header
function head()
{
  global $slugs;
  include_once('include/header.php');
}

function foot()
{
  global $slugs;
  include_once('include/footer.php');
}

// SECTION Base Route
  Route::add('/', function () {
    head();
    echo 'Welcome :-)';
    foot();
  });

  // ANCHOR This example shows how to include files and how to push data to them
  Route::add('/blog/([a-z-0-9-]*)', function ($slug) {
    head();
    include_once('include-example.php');
    foot();
  });

  // ANCHOR Get route example
  Route::add('/contact-form', function () {
    head();
    echo '<form method="post"><input type="text" name="test"><input type="submit" value="send"></form>';
  }, 'get');

  // ANCHOR Post route example
  Route::add('/contact-form', function () {
    head();
    echo 'Hey! The form has been sent:<br>';
    print_r($_POST);
  }, 'post');

  // ANCHOR Get and Post route example
  Route::add('/get-post-sample', function () {
    head();
    echo 'You can GET this page and also POST this form back to it';
    echo '<form method="post"><input type="text" name="input"><input type="submit" value="send"></form>';
    if (isset($_POST['input'])) {
      echo 'I also received a POST with this data:<br>';
      print_r($_POST);
    }
  }, ['get', 'post']);

  // ANCHOR Route with regexp parameter
  // Be aware that (.*) will match / (slash) too. For example: /user/foo/bar/edit
  // Also users could inject SQL statements or other untrusted data if you use (.*)
  // You should better use a saver expression like /user/([0-9]*)/edit or /user/([A-Za-z]*)/edit
  Route::add('/user/(.*)/edit', function ($id) {
    head();
    echo 'Edit user with id ' . $id . '<br>';
  });

  // ANCHOR Accept only numbers as parameter. Other characters will result in a 404 error
  Route::add('/foo/([0-9]*)/bar', function ($var1) {
    head();
    echo $var1 . ' is a great number!';
  });

  // ANCHOR Auto generate dynamic routes from a database or from another source
  // For this example we will just use a predefined array
  foreach ($slugs as $slug => $entry) {
    Route::add('/my-blog-articles/' . $slug, function () use ($entry) {
      head();
      echo 'You are here: ' . $entry;
    });
  }

  // ANCHOR Use variables from global scope
  // You can use for example use() to inject variables to local scope
  // You can use global to register the variable in local scope
  $foo = 'foo';
  $bar = 'bar';
  Route::add('/global/([a-z-0-9-]*)', function ($param) use ($foo) {
    global $bar;
    head();
    echo 'The param is ' . $param . '<br/>';
    echo 'Foo is ' . $foo . '<br/>';
    echo 'Bar is ' . $bar . '<br/>';
  });

  // ANCHOR 404 not found route
  Route::pathNotFound(function ($path) {
    head();
    include('../view/error/404.php');
    echo 'The requested path "' . $path . '" was not found!';
    foot();
  });

  // ANCHOR 405 method not allowed route
  Route::methodNotAllowed(function ($path, $method) {
    head();
    include('../view/error/405.php');
    echo 'The requested path "' . $path . '" exists. But the request method "' . $method . '" is not allowed on this path!';
    foot();
  });

  // SECTION This route is for debugging only
    // ANCHOR PHP INFO
    Route::add('/phpinfo', function () {
      head();
      phpinfo();
    });

    // ANCHOR 405 test
    Route::add('/this-route-is-defined', function () {
      head();
      echo 'You need to patch this route to see this content';
    }, 'patch');

    // ANCHOR Return all known routes
    Route::add('/routes', function () {
      $routes = Route::getAll();
      echo '<ul>';
      foreach ($routes as $route) {
        echo '<li>' . $route['expression'] . ' (' . $route['method'] . ')</li>';
      }
      echo '</ul>';
    });
  // !SECTION
// !SECTION

// SECTION Dao Route
  // SECTION admin
    // ANCHOR 
    Route::add('/admin', function () {
      head();
      include_once('../model/class/Admin.php');
      include_once('../model/dao/AdminDAO.php');

      $admin = new AdminDAO;
      $admin = $admin->fetchAll();

      var_dump($admin);
      foot();
    });

    // ANCHOR Specific Admin
    Route::add('/admin/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/Admin.php');
      include_once('../model/dao/AdminDAO.php');

      $admin = new AdminDAO;
      $admin = $admin->fetch($id);

      var_dump($admin);
    });

    //ANCHOR Delete Admin
    Route::add('/admin/([0-9]*)/delete', function ($id) {
      include_once('../model/class/Admin.php');
      include_once('../model/dao/AdminDAO.php');
      $admin = new AdminDAO;
      $admin = $admin->delete($id);

      var_dump($admin);
    });

    //ANCHOR Edit Admin
    Route::add('/admin/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/Admin.php');
      include_once('../model/dao/AdminDAO.php');

      $admin = new AdminDAO;
      $admin = $admin->update($id, $_POST);

      var_dump($admin);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/admin/store', function () {
      include_once('../model/class/Admin.php');
      include_once('../model/dao/AdminDAO.php');
      $admin = new AdminDAO;
      $admin = $admin->store($_POST);

      var_dump($admin);
    }, 'post');
  // !SECTION

  // SECTION Basic Info
    // ANCHOR 
    Route::add('/basicinfo', function () {
      head();
      include_once('../model/class/BasicInfo.php');
      include_once('../model/dao/BasicInfoDAO.php');
      $basicinfo = new BasicInfoDAO;
      $basicinfo = $basicinfo->fetchAll();

      var_dump($basicinfo);
    });

    // ANCHOR Specific Admin
    Route::add('/basicinfo/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/BasicInfo.php');
      include_once('../model/dao/BasicInfoDAO.php');
      $basicinfo = new BasicInfoDAO;
      $basicinfo = $basicinfo->fetch($id);

      var_dump($basicinfo);
    });

    //ANCHOR Delete Admin
    Route::add('/basicinfo/([0-9]*)/delete', function ($id) {
      include_once('../model/class/BasicInfo.php');
      include_once('../model/dao/BasicInfoDAO.php');
      $basicinfo = new BasicInfoDAO;
      $basicinfo = $basicinfo->delete($id);
    });

    //ANCHOR Edit Admin
    Route::add('/basicinfo/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/BasicInfo.php');
      include_once('../model/dao/BasicInfoDAO.php');

      $basicinfo = new BasicInfoDAO;
      $basicinfo = $basicinfo->update($id, $_POST);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/basicinfo/store', function () {
      include_once('../model/class/BasicInfo.php');
      include_once('../model/dao/BasicInfoDAO.php');
      $basicinfo = new BasicInfoDAO;
      $basicinfo = $basicinfo->store($_POST);
    }, 'post');
  // !SECTION

  // SECTION Picture
    // ANCHOR 
    Route::add('/picture', function () {
      head();
      include_once('../model/class/Picture.php');
      include_once('../model/dao/PictureDAO.php');
      $picture = new PictureDAO;
      $picture = $picture->fetchAll();

      var_dump($picture);
    });

    // ANCHOR Specific Admin
    Route::add('/picture/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/Picture.php');
      include_once('../model/dao/PictureDAO.php');
      $picture = new PictureDAO;
      $picture = $picture->fetch($id);

      var_dump($picture);
    });

    //ANCHOR Delete Admin
    Route::add('/picture/([0-9]*)/delete', function ($id) {
      include_once('../model/class/Picture.php');
      include_once('../model/dao/PictureDAO.php');
      $picture = new PictureDAO;
      $picture = $picture->delete($id);
    });

    //ANCHOR Edit Admin
    Route::add('/picture/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/Picture.php');
      include_once('../model/dao/PictureDAO.php');

      $picture = new PictureDAO;
      $picture = $picture->update($id, $_POST);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/picture/store', function () {
      include_once('../model/class/Picture.php');
      include_once('../model/dao/PictureDAO.php');
      $picture = new PictureDAO;
      $picture = $picture->store($_POST);
    }, 'post');
  // !SECTION

  // SECTION Role
    // ANCHOR 
    Route::add('/role', function () {
      head();
      include_once('../model/class/Role.php');
      include_once('../model/dao/roleDAO.php');
      $role = new RoleDAO;
      $role = $role->fetchAll();

      var_dump($role);
    });

    // ANCHOR Specific Admin
    Route::add('/role/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/Role.php');
      include_once('../model/dao/roleDAO.php');
      $role = new RoleDAO;
      $role = $role->fetch($id);

      var_dump($role);
    });

    //ANCHOR Delete Admin
    Route::add('/role/([0-9]*)/delete', function ($id) {
      include_once('../model/class/Role.php');
      include_once('../model/dao/roleDAO.php');
      $role = new RoleDAO;
      $role = $role->delete($id);
    });

    //ANCHOR Edit Admin
    Route::add('/role/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/Role.php');
      include_once('../model/dao/roleDAO.php');

      $role = new RoleDAO;
      $role = $role->update($id, $_POST);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/role/store', function () {
      include_once('../model/class/Role.php');
      include_once('../model/dao/roleDAO.php');
      $role = new RoleDAO;
      $role = $role->store($_POST);
    }, 'post');
  // !SECTION

  // SECTION Tag
    // ANCHOR 
    Route::add('/tag', function () {
      head();
      include_once('../model/class/Tag.php');
      include_once('../model/dao/TagDAO.php');
      $tag = new TagDAO;
      $tag = $tag->fetchAll();

      var_dump($tag);
    });

    // ANCHOR Specific Admin
    Route::add('/tag/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/Tag.php');
      include_once('../model/dao/TagDAO.php');
      $tag = new TagDAO;
      $tag = $tag->fetch($id);

      var_dump($tag);
    });

    //ANCHOR Delete Admin
    Route::add('/tag/([0-9]*)/delete', function ($id) {
      include_once('../model/class/Tag.php');
      include_once('../model/dao/TagDAO.php');
      $tag = new TagDAO;
      $tag = $tag->delete($id);
    });

    //ANCHOR Edit Admin
    Route::add('/tag/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/Tag.php');
      include_once('../model/dao/TagDAO.php');

      $tag = new TagDAO;
      $tag = $tag->update($id, $_POST);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/tag/store', function () {
      include_once('../model/class/Tag.php');
      include_once('../model/dao/TagDAO.php');
      $tag = new TagDAO;
      $tag = $tag->store($_POST);
    }, 'post');
  // !SECTION

  // SECTION PictureTag
    // ANCHOR 
    Route::add('/picturetag', function () {
      head();
      include_once('../model/class/PictureTag.php');
      include_once('../model/dao/PictureTagDAO.php');
      $picturetag = new PictureTagDAO;
      $picturetag = $picturetag->fetchAll();
      var_dump($tag);
    });

    // ANCHOR Specific Admin
    Route::add('/picturetag/([0-9]*)', function ($id) {
      head();
      include_once('../model/class/PictureTag.php');
      include_once('../model/dao/PictureTagDAO.php');
      $picturetag = new PictureTagDAO;
      $picturetag = $picturetag->fetch($id);
      var_dump($tag);
    });

    //ANCHOR Delete Admin
    Route::add('/picturetag/([0-9]*)/delete', function ($id) {
      include_once('../model/class/PictureTag.php');
      include_once('../model/dao/PictureTagDAO.php');
      $picturetag = new PictureTagDAO;
      $picturetag = $picturetag->delete($id);
    });

    //ANCHOR Edit Admin
    Route::add('/picturetag/([0-9]*)/edit', function ($id) {
      head();
      include_once('../model/class/PictureTag.php');
      include_once('../model/dao/PictureTagDAO.php');
      $picturetag = new PictureTagDAO;
      $picturetag = $picturetag->update($id, $_POST);
    }, 'post');

    //ANCHOR Store Admin
    Route::add('/picturetag/store', function () {
      include_once('../model/class/PictureTag.php');
      include_once('../model/dao/PictureTagDAO.php');
      $picturetag = new PictureTagDAO;
      $picturetag = $picturetag->store($_POST);
    }, 'post');
  // !SECTION
// !SECTION

// ANCHOR Run the Router with the given Basepath
Route::run(BASEPATH);

// ANCHOR Activez le mode sensible à la casse, les barres obliques de fin de ligne et le mode de correspondance multiple en définissant les paramètres à true.
// Route::run(BASEPATH, true, true, true) ;