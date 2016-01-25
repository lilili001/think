<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkLength($str,$min,$max) {
    preg_match_all("/./", $str, $matches);
    $len = count($matches[0]);
    if ($len < $min || $len > $max) {
        return false;
    }else {
        return true;
    }
}