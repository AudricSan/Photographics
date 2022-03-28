<?php

// Use this namespace
use photographics\Route;
use photographics\env;

// Include class
include '../model/class/Route.php';
include '../model/class/env.php';

// Define a global basepath
define('BASEPATH','/');

// Lets define some slugs for automatic route and headgation generation
// See examples below
$slugs = ['article-1' => 'Article 1', 'article-2' => 'Article 2', 'article-3' => 'Article 3'];

// This function just renders a simple headgation
function head() {
  global $slugs;
  include ('include/header.php');
}

// Add base route (startpage)
Route::add('/', function() {
  head();
  echo 'Welcome :-)';
});

// This example shows how to include files and how to push data to them
Route::add('/blog/([a-z-0-9-]*)', function($slug) {
  head();
  include('include-example.php');
});

// This route is for debugging only
// It simply prints out some php infos
// Do not use this route on production systems!
Route::add('/phpinfo', function() {
  head();
  phpinfo();
});

// Get route example
Route::add('/contact-form', function() {
  head();
  echo '<form method="post"><input type="text" name="test"><input type="submit" value="send"></form>';
}, 'get');

// Post route example
Route::add('/contact-form', function() {
  head();
  echo 'Hey! The form has been sent:<br>';
  print_r($_POST);
}, 'post');

// Get and Post route example
Route::add('/get-post-sample', function() {
  head();
	echo 'You can GET this page and also POST this form back to it';
	echo '<form method="post"><input type="text" name="input"><input type="submit" value="send"></form>';
	if (isset($_POST['input'])) {
		echo 'I also received a POST with this data:<br>';
		print_r($_POST);
	}
}, ['get','post']);

// Route with regexp parameter
// Be aware that (.*) will match / (slash) too. For example: /user/foo/bar/edit
// Also users could inject SQL statements or other untrusted data if you use (.*)
// You should better use a saver expression like /user/([0-9]*)/edit or /user/([A-Za-z]*)/edit
Route::add('/user/(.*)/edit', function($id) {
  head();
  echo 'Edit user with id '.$id.'<br>';
});

// Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar', function($var1) {
  head();
  echo $var1.' is a great number!';
});

// Crazy route with parameters
Route::add('/(.*)/(.*)/(.*)/(.*)', function($var1,$var2,$var3,$var4) {
  head();
  echo 'This is the first match: '.$var1.' / '.$var2.' / '.$var3.' / '.$var4.'<br>';
});


// Auto generate dynamic routes from a database or from another source
// For this example we will just use a predefined array
foreach($slugs as $slug => $entry) {
  Route::add('/my-blog-articles/'.$slug, function() use($entry) {
    head();
      echo 'You are here: '.$entry;
  });
}

// Use variables from global scope
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

// Arrow function example
// Note: You can use this example only if you are on PHP 7.4 or higher
$bar = 'bar';
Route::add('/arrow/([a-z-0-9-]*)', fn($foo) => head().'This is a working arrow function example. <br/> Parameter: '.$foo. ' <br/> Variable from global scope: '.$bar );


// 405 test
Route::add('/this-route-is-defined', function() {
  head();
  echo 'You need to patch this route to see this content';
}, 'patch');

// Add a 404 not found route
Route::pathNotFound(function($path) {
  // Do not forget to send a status head back to the client
  // The router will not send any heads by default
  // So you will have the full flexibility to handle this case
  head('HTTP/1.0 404 Not Found');
  head();
  echo 'Error 404 :-(<br>';
  echo 'The requested path "'.$path.'" was not found!';
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status head back to the client
  // The router will not send any heads by default
  // So you will have the full flexibility to handle this case
  head('HTTP/1.0 405 Method Not Allowed');
  head();
  echo 'Error 405 :-(<br>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Return all known routes
Route::add('/routes', function() {
  head();
  $routes = Route::getAll();
  echo '<ul>';
  foreach($routes as $route) {
    echo '<li>'.$route['expression'].' ('.$route['method'].')</li>';
  }
  echo '</ul>';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);