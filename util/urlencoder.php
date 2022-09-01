<?php

class urlencoder {

    public static function code($seperator, $link) {
        $newlink = str_replace(' ', $seperator, $link);
        return $newlink;
    }

    public static function decode($seperator, $link) {
        $newlink = str_replace($seperator, ' ', $link);
        return $newlink;
    }


    public static function slug($str, $replace = array(), $delimiter = "-"){
        if(!empty($replace)){
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = preg_replace("/[^a-zA-Z0-9_|+-]/", $delimiter, $str);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[_|+ -]+/", $delimiter, $clean);

        return $clean;
    }
}
