<?php

class generato
{
  static function usergen($length)
  {
    $string='';
    $chars="0123456789abcdefghijklmnopqrstuvwxyz";
    for ($p = 0; $p < $length; $p++)
    {
      $string .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    $characters = 'user-'.$string;
    return $characters;
  }
  
  static function passgen($length)
  {
    $string='';
    $chars="0123456789abcdefghijklmnopqrstuvwxyz";
    for ($p = 0; $p < $length; $p++)
    {
      $string .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    $characters = 'pass-'.$string;
    return $characters;
  }
  
  static function random($length)
  {
    
    $string='';
    $chars="0123456789abcdefghijklmnopqrstuvwxyz";
    for ($p = 0; $p < $length; $p++)
    {
      $string .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return $string;
  }
}