<?php

// ANCHOR Use this namespace
use photographics\Route;
use photographics\env;

// ANCHOR Include class
include '../model/class/Route.php';
include '../model/class/env.php';

// ANCHOR Define a global basepath
define('BASEPATH','/');

// ANCHOR Lets define some slugs for automatic route and headgation generation
// See examples below
$slugs = ['article-1' => 'Article 1', 'article-2' => 'Article 2', 'article-3' => 'Article 3'];

// ANCHOR This function just renders a simple headgation
function head() {
  global $slugs;
  include_once ('include/header.php');
}

// ANCHOR Add base route (startpage)
Route::add('/', function() {
  head();
  echo 'Welcome :-)';
});

// ANCHOR This example shows how to include files and how to push data to them
Route::add('/blog/([a-z-0-9-]*)', function($slug) {
  head();
  include_once('include-example.php');
});

// ANCHOR Get route example
Route::add('/contact-form', function() {
  head();
  echo '<form method="post"><input type="text" name="test"><input type="submit" value="send"></form>';
}, 'get');

// ANCHOR Post route example
Route::add('/contact-form', function() {
  head();
  echo 'Hey! The form has been sent:<br>';
  print_r($_POST);
}, 'post');

// ANCHOR Get and Post route example
Route::add('/get-post-sample', function() {
  head();
	echo 'You can GET this page and also POST this form back to it';
	echo '<form method="post"><input type="text" name="input"><input type="submit" value="send"></form>';
	if (isset($_POST['input'])) {
		echo 'I also received a POST with this data:<br>';
		print_r($_POST);
	}
}, ['get','post']);

// ANCHOR Route with regexp parameter
// Be aware that (.*) will match / (slash) too. For example: /user/foo/bar/edit
// Also users could inject SQL statements or other untrusted data if you use (.*)
// You should better use a saver expression like /user/([0-9]*)/edit or /user/([A-Za-z]*)/edit
Route::add('/user/(.*)/edit', function($id) {
  head();
  echo 'Edit user with id '.$id.'<br>';
});

// ANCHOR Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar', function($var1) {
  head();
  echo $var1.' is a great number!';
});

// ANCHOR Auto generate dynamic routes from a database or from another source
// For this example we will just use a predefined array
foreach($slugs as $slug => $entry) {
  Route::add('/my-blog-articles/'.$slug, function() use($entry) {
    head();
      echo 'You are here: '.$entry;
  });
}

// ANCHOR Use variables from global scope
// You can use for example use() to inject variables to local scope
// You can use global to register the variable in local scope
$foo = 'foo';
$bar = 'bar';
Route::add('/global/([a-z-0-9-]*)', function($param) use($foo) {
  global $bar;
  head();
  echo 'The param is '.$param.'<br/>';
  echo 'Foo is '.$foo.'<br/>';
  echo 'Bar is '.$bar.'<br/>';
});

// ANCHOR 405 test
Route::add('/this-route-is-defined', function() {
  head();
  echo 'You need to patch this route to see this content';
}, 'patch');

// ANCHOR Add a 404 not found route
Route::pathNotFound(function($path) {
  head();
  include('error/404.php');
  echo 'The requested path "'.$path.'" was not found!';
});

// ANCHOR Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method) {
  head();
  include ('error/405.php');
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// ANCHOR Return all known routes
Route::add('/routes', function() {
  $routes = Route::getAll();
  echo '<ul>';
  foreach($routes as $route) {
    echo '<li>'.$route['expression'].' ('.$route['method'].')</li>';
  }
  echo '</ul>';
});

// ANCHOR This route is for debugging only
// It simply prints out some php infos
// Do not use this route on production systems!
Route::add('/phpinfo', function() {
  head();
  phpinfo();
});

// ANCHOR Run the Router with the given Basepath
Route::run(BASEPATH);

// ANCHOR Activez le mode sensible à la casse, les barres obliques de fin de ligne et le mode de correspondance multiple en définissant les paramètres à true.
// Route::run(BASEPATH, true, true, true) ;