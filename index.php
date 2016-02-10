<?php
require_once("vendor/twig/twig/lib/Twig/Autoloader.php");
require_once("core/Routing.php");
require_once("vendor/autoload.php");
require_once("src/Controller.php");
require_once('log/log.php');


use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Filter\Yui\CssCompressorFilter;
Twig_Autoloader::register();

$router = new Routing('core/routeur.yml');
$controller = new Controller($router->getNameRoute(), $router->getControllerRoute(), $router->getViewController());
