<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!----
 layout文件可以被User中的html继承 这里是fromLayout,html
 { __CONTENT__ } 可用于在fromLayout.html自定义内容
-->
<html>
    <head>
        <title>title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="header">这是头文件111</div>  
        <!--配置文件 config中配置  
//开启模版布局功能，并指定基础页
'LAYOUT_ON'=> true,
'LAYOUT_NAME'=>'Public/layout'

完全继承Public中的layout.html中的内容
-->
SDFSDF
        <div id="footer">这是脚文件</div><br/><br/>
    </body>
</html>