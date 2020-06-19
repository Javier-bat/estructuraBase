<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'lib/AltoRouter.php';
require_once 'controlador/ControladorUsuario.php';
require_once 'modelo/Usuario.php';

$router= new AltoRouter();
// setup routes


$router->map('GET','/', function () {
    $usuario=new Usuario();
    $usuario->setNombre("Pepito");
    $usuario->setApellido("Argento");
    $usuario->setHijos(22);

    $controlador=new ControladorUsuario($usuario);
    echo json_encode($controlador->insertar(array()));
}, 'home');

$router->map('GET','/modif', function () {
    $usuario=new Usuario();
    $usuario->setIdUsuario(1);
    $usuario->setNombre("Moni");
    $usuario->setApellido("Argento");
    $usuario->setHijos(2);

    $controlador=new ControladorUsuario($usuario);
    echo json_encode($controlador->modificar(array()));
}, 'modif');

$router->map('GET','/create', function () {
    require 'creator/creator.php';
}, 'create');

$router->map('GET','/create/engine', function () {
    require 'creator/engine.php';
    //var_dump($_GET);
}, 'engine');


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