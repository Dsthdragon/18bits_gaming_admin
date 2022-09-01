<?php

class validator {

    static function blank($value) {
        if (strlen($value) < 1)
            return true;
        else
            return false;
    }

    static function username($value) {
        if (preg_match('/^\w{5,}$/', $value))  // \w equals "[0-9A-Za-z_]"
            // valid username, alphanumeric & longer than or equals 5 chars
            return true;
        else
            return false;
    }

    static function digit($value) {
        if (ctype_digit($value))
            return true;
        else
            return false;
    }

    static function password($value, $min) {
        if (strlen($value) >= $min)
            return true;
        else
            return false;
    }

    static function confirmation($value1, $value2) {
        if ($value1 == $value2)
            return true;
        else
            return false;
    }

    static function email($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) == true)
            return true;
        else
            return false;
    }

}
