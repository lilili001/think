<?php
//basename()  返回路径中的文件名部分
$path='E:\www\studym\code\tast\php\mvc-imook\weibo_v\beifengwang\fn.txt';
echo basename($path).'<br/>';//fn.txt
echo dirname($path).'<br/>';//E:\www\studym\code\tast\php\mvc-imook\weibo_v\beifengwang

$array_path = pathinfo($path);
 echo '<pre>'. print_r($array_path,1).'</pre><br/>';
 /*
    Array
(
    [dirname] => E:\www\studym\code\tast\php\mvc-imook\weibo_v\beifengwang
    [basename] => fn.txt
    [extension] => txt
    [filename] => fn
)
 */
 