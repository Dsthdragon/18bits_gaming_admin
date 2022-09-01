<?php

class rating {

    public static function rate($score) {
        $rated = "";
        for ($x = 0; $x < $score; $x++) {
            $rated .="<span class='material-icons mdi-toggle-star amber-text'></span>";
        }
        for ($x = 0; $x < 5 - $score; $x++) {
            $rated .="<span class='material-icons mdi-toggle-star'></span>";
        }
        
        return $rated;
    }

}
