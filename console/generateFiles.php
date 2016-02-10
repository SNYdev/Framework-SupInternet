<?php

$tabRouteName = $argv[1];
$pathName = $argv[2];
// $controllerName = $argv[3];
// $viewName = $argv[4];

if (isset($tabRouteName) && isset($pathName)) {

    $addRoutesfopen = fopen('../core/routeur.yml', "a+");
    fwrite($addRoutesfopen, "\n"."$tabRouteName:"."\n".
    "    path: '$pathName'"."\n".
    "    controller: 'src:model:$pathName'"."\n".
    "    view: 'src:views:$pathName'");
    fclose($addRoutesfopen);

    $files = [
      "css/" => $pathName.".css",
      "js/" => $pathName.".js",
      "model/" => $pathName.".php",
      "views/" => $pathName.".html.twig"
    ];

    foreach ($files as $folders => $files) {
        $addFiles = fopen('../src/'.$folders.$files, "a+");
        fwrite($addFiles, "");
        fclose($addFiles);
    }

    $addLinesTwig = fopen('../src/views/'.$pathName.".html.twig", "a+");
    fwrite($addLinesTwig, "{% extends 'base.html.twig' %}");
    fclose($addLinesTwig);
}
