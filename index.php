<?php
//  header('Location: controller/controller.php');

//chargement config
require_once(__DIR__.'/Config/Config.php');

//require_once(__DIR__.'/config/Autoload.php');
//Autoload::charger();

//autoloader norm PSR-0
require_once(__DIR__.'/Config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('Config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Controllers', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Gateways', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Jobs', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Models', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Tests', './');
$myLibLoader->register();

$mainCont = new \Controllers\FrontController();
//$pictureCont = new \Tests\PictureController();
//$commentCont = new \Tests\CommentController();
// $newsCont = new \Tests\NewsController();
//$userCont = new \Tests\UserController();

?>
