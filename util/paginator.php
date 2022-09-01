<?php

class paginator {

    static function selectall($table, $page, $per_page) {
        $start = (($page - 1) * $per_page);
        return "SELECT * FROM $table LIMIT $start,$per_page";
    }

    static function selectallwithorder($table, $page, $per_page, $order, $sort = 'asc') {
        $start = (($page - 1) * $per_page);
        return "SELECT * FROM $table ORDER BY $order $sort LIMIT $start,$per_page";
    }

    static function select($table, $page, $per_page, $col, $col_val) {
        $start = (($page - 1) * $per_page);
        return "SELECT * FROM $table WHERE $col = $col_val LIMIT $start,$per_page";
    }

    static function selectwithorder($table, $page, $per_page, $col, $col_val, $order, $sort = 'asc') {
        $start = (($page - 1) * $per_page);
        return "SELECT * FROM $table WHERE $col = $col_val ORDER BY $order $sort  LIMIT $start,$per_page";
    }

    static function searchwithorder($table, $page, $per_page, $col, $col_val, $order, $sort = 'asc') {
        $start = (($page - 1) * $per_page);
        return "SELECT * FROM $table WHERE $col LIKE '%$col_val%' ORDER BY $order $sort  LIMIT $start,$per_page";
    }

    static function paginate($data, $per_page, $current) {
        $count = ceil(sizeof($data) / $per_page);
        $values = ($current - 1) * $per_page;
        $returnData = array_slice($data, $values, $per_page);
        return array($returnData, $count);
    }

    static function countall($table, $per_page) {
        $sth = $this->db->prepare("SELECT * FROM $table");
        $sth->execute();
        $total = $sth->rowCount();
        $pages = ceil($total / $per_page);
        return $pages;
    }

    static function count($table, $per_page, $col, $col_val) {
        $sth = $this->db->prepare("SELECT * FROM $table WHERE $col = :col_val");
        $sth->execute(array(":col_val" => $col_val));
        $total = $sth->rowCount();
        $pages = ceil($total / $per_page);
        return $pages;
    }

    static function searchcount($table, $per_page, $col, $col_val) {
        $sth = $this->db->prepare("SELECT * FROM $table WHERE $col LIKE '%$col_val%'");
        $sth->execute();
        $total = $sth->rowCount();
        $pages = ceil($total / $per_page);
        return $pages;
    }

static function view($count, $current, $class, $method, $search = null) {
        echo '<section class="">';
        echo '<ul class="uk-pagination uk-flex-center">';
        if ($current - 5 < 0) {
            $i = 0;
        } else {
            $i = $current - 5;
        }
        if ($current + 5 > $count) {
            $b = $count;
        } else {
            $b = $current + 5;
        }
        $new_method = ($method != null ) ? $method . "/" : "";
        if ($current != 1) {
            echo "<li><a href='" . URL . $class . "/" . $new_method . "1/"  . $search . "'>"
                    . '<span aria-hidden="true"><i class="fa fa-play fa-rotate-180"></i></span>'
                    . "</a></li>";
        }

        for ($i; $i < $b; $i++) {
            $a = $i + 1;
            echo "<li class='";
            if ($current == $a) {
                echo 'uk-active';
            }
            echo "'><a href='" . URL . $class . "/" . $new_method . $a . "/" . $search . "'>" . $a . "</a></li>";
        }
        if ($count != $current && $count > 0) {
            echo "<li><a href='" . URL . $class . "/" . $new_method . $count . "/" . $search . "'>"
            . '<span aria-hidden="true"><i class="fa fa-play"></i></span>'
            . "</a></li>";
        }
        echo '</ul>';
        echo '</section>';
    }

    
    static function view2($count, $current, $class, $method, $search = null) {
        echo '<section class="pagination  pagination-centered" style="margin: 10px 0;">';
        echo '<ul>';
        if ($current - 5 < 0) {
            $i = 0;
        } else {
            $i = $current - 5;
        }
        if ($current + 5 > $count) {
            $b = $count;
        } else {
            $b = $current + 5;
        }
        if ($current != 1) {
            echo "<li><a href='" . URL . $class . "/" . $method . "/1/" . $search . "'>"
                    . '<span aria-hidden="true"><i class="fa fa-play fa-rotate-180"></i></span>'
                    . "</a></li>";
        }

        for ($i; $i < $b; $i++) {
            $a = $i + 1;
            echo "<li class='";
            if ($current == $a) {
                echo 'active';
            }
            echo "'><a href='" . URL . $class . "/" . $method . "/" . $a . "/" . $search . "'>" . $a . "</a></li>";
        }
        if ($count != $current && $count > 0) {
            echo "<li><a href='" . URL . $class . "/" . $method . "/" . $count . "/" . $search . "'>"
            . '<span aria-hidden="true"><i class="fa fa-play"></i></span>'
            . "</a></li>";
        }
        echo '</ul>';
        echo '</section>';
    }



}