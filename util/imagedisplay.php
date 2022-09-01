<?php

class imagedisplay {

    public static function display($link, $type = "user") {
        if (!empty($link) && file_exists(ROOT . '/' . $link)) {
            return URL . $link;
        }else if (!empty($link) && file_exists(ROOT . '/' . $link)) {
            return URL . $link;
        }else {
            return URL. 'public/img/avatar.svg';
        }
    }
    

}
