<?php


class Controller {

  public $path;
  public $modelRoute;
  public $viewRoute;
  public $twig;

  function __construct($arg1, $arg2, $arg3){
      $this->setPath($arg1);
      $this->setModelRoute($arg2);
      $this->setViewRoute($arg3);
      $pathController = $this->getModelRoute().".php";
      var_dump($pathController);
      if (file_exists($pathController)) {
          $tes = require_once($pathController);
          var_dump($tes);
      } else {
          echo "Controller not found file";
      }
      echo '<br>'.$this->path.'<br>'.$this->modelRoute.'<br>'.$this->viewRoute;
  }

  public function setPath($path){
      $this->path = $path;
  }

  public function getPath(){
    return $this->path;
  }

  public function setModelRoute($modelRoute){
      $routeReplace = str_replace(':', '/', $modelRoute);
      $this->modelRoute = $routeReplace;
  }

  public function getModelRoute(){
    return $this->modelRoute;
  }

  public function setViewRoute($viewRoute){
      $viewReplace = str_replace(':', '/', $viewRoute);
      $this->viewRoute = $viewReplace;
  }

  public function getViewRoute(){
      return $this->viewRoute;
  }

  public function load(){
      $viewFormat = $this->viewRoute.'.html.twig';
      $viewFile = str_replace("src/", "", $viewFormat);
      if (file_exists($viewFormat)) {

      } else {
          echo "no";
      }
  }
}
