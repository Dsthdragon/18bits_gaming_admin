<?php

class savepage
{
  
  static function pagelink()
  {
    session::init();
    $link = explode("/",$_SERVER['REQUEST_URI']);
    $newlink = '';
    foreach($link as $i => $key)
    {
      if($i>1)
      $newlink .= $key.'/';
    }
    $newlink = trim($newlink, '/');
    session::set('url', $newlink);
  }
}