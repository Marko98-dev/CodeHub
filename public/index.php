<?php

// Starting the PHP session for Session variables
session_start();

// Error reporting

error_reporting(E_ALL);
ini_set("display_errors", true);

// Creating the app object

require_once("../app/app.php");
$app = new App();

// Loading custom exceptions
require_once("../exceptions/exceptions.php");

require_once("../dal/dal.php");

// define the routes

$routes = [
  '/' => ['v' => 'home'],
  '/dashboard' => ['v' => 'dashboard'],
  '/signin' => ['c' => 'signin', 'v' => 'dashboard'],
  '/signout' => ['c' => 'signout', 'v' => 'home'],
  '/orders' => [                   'v' => 'orders'],
  '/signup' => ['c' => 'signup', 'v' => 'register']

];

// Get the path from the URL

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Set the view and controller depending on route

if(array_key_exists($path, $routes)) {
  $view = $routes[$path] ['v'];
  if (array_key_exists('c', $routes[$path])) $controller = $routes[$path] ['c'];
} else {
  $view = 'invalidroute';
}

// Loading the controller into file
if(isset($controller)) require_once("../controllers/$controller.php");

// load the View

require_once("../views/$view.php");

?>
