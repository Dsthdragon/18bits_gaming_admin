<?php

class cleanup {

    public static function delete($start, $end, $string) {
        $startPos = strpos($string, $start);
        $endPos = strpos($string, $end);

        if ($startPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $startPos, ($endPos + strlen($end)) - $startPos);

        return str_replace($textToDelete, '', $string);
    }

    static function excerpts($content, $word_limit = 30) {
        $words = explode(" ", $content);

        return implode(" ", array_splice($words, 0, $word_limit));
    }

    function clean_all($start, $end, $string) {
        
    }

}
