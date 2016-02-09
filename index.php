<?php
require_once("vendor/twig/twig/lib/Twig/Autoloader.php");
require_once("core/Routing.php");
require_once("vendor/autoload.php");
require_once("src/Controller.php");

use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Filter\Yui\CssCompressorFilter;
Twig_Autoloader::register();

$router = new Routing('core/routeur.yml');
$controller = new Controller($router->getNameRoute(), $router->getControllerRoute(), $router->getViewController());
$veriIndex = $controller->getModelRoute().".php";
var_dump($veriIndex);
if (file_exists($veriIndex)) {
    echo "laos";
} else {
  $loader = new Twig_Loader_Filesystem('src/');
  $twig = new Twig_Environment($loader, array('cache' => false));
  $template = $twig->loadTemplate("views/base.html.twig");
  echo $template->render(array());
}
