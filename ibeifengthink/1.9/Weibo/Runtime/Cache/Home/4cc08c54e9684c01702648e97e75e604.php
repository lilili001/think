<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="header">这是头文件111</div>  
        <div>main</div>
        <?php echo U('a', array('id'=>5));?>
        <div id="footer">这是脚文件</div><br/><br/>
    </body>
</html>