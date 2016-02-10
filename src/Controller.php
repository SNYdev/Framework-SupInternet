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
      $viewControll = $this->getViewRoute().".html.twig";
      if (file_exists($pathController)) {
          $tes = require_once($pathController);
      } else {
          $error = "Controller not found file";
      }
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

  public function load($tabArg = []){
      $loader = new Twig_Loader_Filesystem('src/views/');
      $twig = new Twig_Environment($loader, array('cache' => false));
      $responseView = str_replace("src/views/", "", $this->getViewRoute());
      $template = $twig->loadTemplate($responseView.'.html.twig');
      echo $template->render(array($tabArg));
  }
}
