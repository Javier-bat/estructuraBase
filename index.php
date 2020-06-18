<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'lib/AltoRouter.php';

$router= new AltoRouter();
// setup routes
$router->map('GET','/', function () {
    require 'home.php';
}, 'home');
$router->map('GET','/about/', function () {
    require 'about.php';
}, 'about');
$router->map('GET','/contact/', function () {
    require 'contact.php';
}, 'contact');
$router->map('GET','/funcion/', function () {
    echo 'Hello World!';
});

$match = $router->match();

// do we have a match?

if($match) {
  
 call_user_func_array($match['target'],$match['params']);

} else {
  header("HTTP/1.0 404 Not Found");
  require '404.php';
}