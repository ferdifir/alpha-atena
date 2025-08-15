<?php
namespace App\Http\Controllers;
class UrlAPI{
  public static $urlAPI="http://alpha_atena_backend.test/api/";
  public static function getAllUrl(){
    $listUrlAPI=[
      'login'=>self::$urlAPI.'auth/login',
      'loginPerusahaan'=>self::$urlAPI.'auth/login-perusahaan',
    ];
    return $listUrlAPI;
  }
}