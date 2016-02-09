<?php

class Logs{

  public function accessLogs($requestUri){
    $date = date("Y-m-d H:i:s");
    $access = fopen("log/accessLogs.txt", "a+");
    fwrite($access, $line);
    fclose($access);
  }

  public function errorLog($errorTest){
      $date = date("Y-m-d H:i:s");
      $error = $errorTest->errorInfo();
      $errorLoad = fopen("log/errorLog", "a+");
      fwrite($errorLoad, $date."->".$error.'<br>');
      fclose($errorLoad);
  }
}
