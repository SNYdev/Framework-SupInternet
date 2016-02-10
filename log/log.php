<?php

class Logs{

  static function accessLogs($requestUri){
    $date = date("Y-m-d H:i:s");
    $access = fopen("log/accessLogs.txt", "a+");
    fwrite($access, $date.'->'.$requestUri."\n");
    fclose($access);
  }

  static function errorLog($errorTest){
      $date = date("Y-m-d H:i:s");
      $errorLoad = fopen("log/errorLog.txt", "a+");
      fwrite($errorLoad, $date."->".$errorTest."\n");
      fclose($errorLoad);
  }
}
