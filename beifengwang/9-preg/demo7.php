<?php
//匹配全局 匹配模式的所有出现：preg_match_all()函数在字符串中匹配模式的所有出现，然后将所
//有匹配到的全部放入数组。
preg_match_all('/php[1-6]/','php5sdfphp4sdflljkphp3sdlfjphp2',$out);
echo '<pre>';
print_r($out);
echo '</pre>';