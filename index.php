<?php
//  header('Location: controller/controller.php');

//chargement config
require_once(__DIR__. DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Config.php');

//require_once(__DIR__.'/config/Autoload.php');
//Autoload::charger();

//autoloader norm PSR-0
require_once(__DIR__. DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'SplClassLoader.php');
$myLibLoader = new SplClassLoader('Config', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Controllers', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Gateways', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Jobs', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Models', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Tests', '.' . DIRECTORY_SEPARATOR);
$myLibLoader->register();

$mainCont = new \Controllers\FrontController();

?>
