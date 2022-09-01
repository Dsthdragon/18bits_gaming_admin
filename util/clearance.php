<?php

class clearance
{
  
  public static function level($color = null)
  {
    if($color == 'white')
    {
      $level = 1;
      return $level;
    }elseif($color == 'yellow')
    {
      $level = 2;
      return $level;
    }elseif($color == 'green')
    {
      $level = 3;
      return $level;
    }elseif($color == 'blue')
    {
      $level = 4;
      return $level;
    }elseif($color == 'red')
    {
      $level = 5;
      return $level;
    }
  }
  
  public static function check($level, $color)
  {
    $col = self::level($color);
    $lev = self::level($level);
    if($col >= $lev)
    {
      return true;
    }else{
      return false;
    }
  }
}