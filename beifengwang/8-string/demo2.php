<?php

$str = "I,will.be#back";
$tok = strtok($str,",.#");
 
while($tok) {
echo "$tok<br \>";
$tok = strtok(",.#");
}

print_r(str_split('This is a Teacher!'));
