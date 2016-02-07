<?php
//array_rand() 返回下标 也就是key

$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
//var_dump($rand_keys) ;
print $input[$rand_keys[0]] . "\n";
print $input[$rand_keys[1]] . "\n";

