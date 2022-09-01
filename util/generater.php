<?php

class generater
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
    static function digit($length)
    {
        $string='';
        $chars="0123456789";
        for ($p = 0; $p < $length; $p++)
        {
            $string .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        $characters = $string;
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

    static function porject_title($length)
    {
        $string='';
        $chars="0123456789abcdefghijklmnopqrstuvwxyz";
        for ($p = 0; $p < $length; $p++)
        {
            $string .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        $characters = 'ALPHA - '.$string;
        return $characters;
    }


    static function porject_title2($length)
    {
        $string='';
        $chars="0123456789abcdefghijklmnopqrstuvwxyz";
        for ($p = 0; $p < $length; $p++)
        {
            $string .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        $characters = 'BETA - '.$string;
        return $characters;
    }
}