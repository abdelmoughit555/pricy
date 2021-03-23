<?php

function pageInfo($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    $nextPageURL =  substr($string, $ini, $len);
    $nextPageURLparam = parse_url($nextPageURL);
    parse_str($nextPageURLparam['query'], $value);
    return $value['page_info'];
}
