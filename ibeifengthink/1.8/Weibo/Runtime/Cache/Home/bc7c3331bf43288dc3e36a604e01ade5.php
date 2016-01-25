<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!----
 layout文件可以被User中的html继承 这里是fromLayout,html
 { __CONTENT__ } 可用于在fromLayout.html自定义内容

//替换变量可以变更为{__REPLACE__}
'TMPL_LAYOUT_ITEM' =>'{__REPLACE__}',

//开启模版布局功能，并指定基础页 这种模式是强制的 就算fromLayout.html内容为空 也会继承layout.html的内容
'LAYOUT_ON'=> true,
'LAYOUT_NAME'=>'Public/layout'

//子模版 fromLayout 不需要载入模版基页，可以在开头加上{__NOLAYOUT__}
{__NOLAYOUT__}

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
 模版标签方式
标签方式，并不需要在系统做任何配置，和模版继承类似，直接引入即可。
-->
<!-- 子模版引入模版基页-->

<!--//替换变量的方法-->
<layout name="Public/layout" replace="{__REPLACE__}" />
        <div id="footer">这是脚文件</div><br/><br/>
    </body>
</html>