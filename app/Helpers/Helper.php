<?php

namespace App\Helpers;

class Helper{

  public static function getBaseApi()
  {
    $env = env('APP_ENV', 'local');
    if($env == 'production'){
      return env('PRODUCTION_API','');
    }
    return env('LOCAL_API','');
  }

  public static function getBaseStoragePath()
  {
    $env = env('APP_ENV', 'local');
    if($env == 'production'){
      return env('PRODUCTION_STORAGE','');
    }
    return env('LOCAL_STORAGE','');
  }

  public static function getApiToken()
  {
    $env = env('APP_ENV', 'local');
    if($env == 'production'){
      return env('PRODUCTION_API_TOKEN','');
    }
    return env('LOCAL_API_TOKEN','');

  }
}
