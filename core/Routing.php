<?php

require_once('src/Controller.php');

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Composants\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

class Routing
{
    public $ymlFile = [];
    public $nameRoute;
    public $controllerRoute;
    public $viewController;

    function __construct($ymlFile){
        $yaml = new Parser();
        $this->ymlFile = (file_get_contents($ymlFile));
        $tabRoute = $yaml->parse($this->ymlFile);
        $this->ymlFile = $tabRoute;
        $request = $_SERVER['SCRIPT_NAME'];
        $uri = $_SERVER['REQUEST_URI'];
        Logs::accessLogs($uri);
        $req = str_replace("index.php", "", $request);
        $uri = str_replace($req, "", $uri);
        foreach ($tabRoute as $k) {
            if ($uri == $k['path']) {
                $this->nameRoute = $k['path'];
                $this->controllerRoute = $k['controller'];
                $this->viewController = $k['view'];
                break;
            } else {
              $error = "route introuvable";
              Logs::errorLog($error);

            }
        }
    }

    public function setNameRoute($nameRoute){
        $this->nameRoute = $nameRoute;
    }

    public function getNameRoute(){
        return $this->nameRoute;
    }

    public function setControllerRoute($controllerRoute){
        $this->controllerRoute = $controllerRoute;
    }

    public function getControllerRoute(){
        return $this->controllerRoute;
    }

    public function setViewController($viewController){
        $this->viewController = $viewController;
    }

    public function getViewController(){
        return $this->viewController;
    }
}
