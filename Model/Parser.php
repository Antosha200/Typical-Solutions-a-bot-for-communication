<?php

class Parser{

    public static function parse($p1, $p2, $p3) {
        $num1 = strpos($p1, $p2);
        if ($num1 === false) return 0;
        $num2 = substr($p1, $num1);
        return (substr($num2, 0, strpos($num2, $p3)));
    }

    public static function parseFirstLink($pageWithLinks){
        preg_match_all('#<a [^>]*href="(.*)"[^>]*>#Ui', $pageWithLinks, $matches);
        return $matches[1][0];
    }
}
