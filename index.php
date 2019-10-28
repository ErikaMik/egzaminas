<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'private/connection.php';
include 'includes/functions.php';
session_start();



require __DIR__ . '/vendor/autoload.php';

if(isset($_SERVER['PATH_INFO'])){
    $path = $_SERVER['PATH_INFO'];
}else{
    $path = '/';
}

$path = explode('/', $path);

//echo '<pre>';
//print_r($path);
//die();

//use App\Helper\Helper;
//$helper = new Helper();

//check if $path[1] isset and not empty...
if(isset($path[1]) && !empty($path[1])){
    $controller = App\Helper\Helper::getController($path[1]);
    //echo $controller;
    if(isset($path[2]) && !empty($path[2])){
        $method = $path[2];
    } else {
        $method = 'index';
    }
    if(class_exists($controller)){
        $object = new $controller; // or $object = new \App\Controller\PostController;
        if(method_exists($object, $method)){
            if(isset($path[3]) && !empty($path[3])){
                $object->{$method}($path[3]);
            }else{
                $object->{$method}();
            }
        } else {
            $object = new \App\Controller\ErrorController();
            $object->methodNotFound();
        }
    } else {
        $object = new \App\Controller\ErrorController();
        $object->classNotFound();
//      echo '404';
    }

} else {
    $object = new \App\Controller\HomeController();
    $object->index();
    //echo 'HOME';
}