<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>内置标签</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  //常规引入方法
    <script type="text/javascript" src="/mvc-imook/weibo_v/1.9/Public/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/mvc-imook/weibo_v/1.9/Public/css/index.css" />-->
    
    <!--//使用 import 导入，js 和 css 是目录
    <script type="text/javascript" src="/mvc-imook/weibo_v/1.9/Public/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/mvc-imook/weibo_v/1.9/Public/css/index.css" />  -->

    <!--//使用 import 导入，basepath 修改默认路径 Public 改为Common
    <script type="text/javascript" src="./Common/js/index.js"></script>-->
    
    <!--load 加载标签可以智能的加载 js 和 css 文件
    //使用 load 加载
    <script type="text/javascript" src="/mvc-imook/weibo_v/1.9/Public/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/mvc-imook/weibo_v/1.9/Public/css/index.css" />-->
    
    <!--系统还提供了专用 js 和 css 标签，专门用于加载
    //使用专用标签
    <script type="text/javascript" src="/mvc-imook/weibo_v/1.9/Public/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/mvc-imook/weibo_v/1.9/Public/css/index.css" />-->
    
</head>
<body> 
    
<!--<?php if($user == "蜡笔小新"): ?>小新
<?php elseif($user == "黑崎一护"): ?>   
    一护
<?php else: ?>
    错误<?php endif; ?>
<br/>

<?php if(mb_substr($user,0,3,'UTF-8') == '蜡笔小'): ?>condition 条件里可以使用 PHP 函数<?php endif; ?><br/>
<?php if($data['user'] == '蜡笔小新'): ?>condition 条件里使用 .或[] 语法，智能判断数组或对象<?php endif; ?><br/>
<?php if($obj->user == '蜡笔小新'): ?>condition 条件里使用冒号语法，直接使用对象<?php endif; ?><br/>
<?php if($_GET['user']== '蜡笔小新'): ?>condition 条件里使用系统变量,该方法查看方式是在url中加?user="蜡笔小新"<?php endif; ?> <br/><br/>

switch的name 不需要$ <br/>
<?php switch($user): case "蜡笔小新": ?>小新<?php break;?>
    <?php case "黑崎一护": ?>一护<?php break;?>
    <?php default: ?>错误<?php endswitch;?>

ThinkPHP 提供了一组比较标签用于简单的变量比较，复杂的判断条件可以用 IF 标签
替换。
比较标签
标签 含义
eq 或 equal 等于
neq 或 notequal 不等于
gt 大于
egt 大于等于
lt 小于
elt 小于等于
heq 恒等于
nheq 不恒等于

比较标签<br/>
//控制器变量$user=蜡笔小新，输出小新 注意  name="user" 就是控制器传过来的数据 不需要$<br/>
<?php if(($user) == "蜡笔小新"): ?>小新<?php endif; ?><br/>
eq也支持else

//compare 统一方法<br/>
<?php if(($user) == "蜡笔小新"): ?>小新<?php endif; ?><br/> 


ThinkPHP 提供了一组范围判断标签：in、notin、between、notbetween 四个标签，都用
于判断变量是否在某个范围中。

//如果 id 是 1，2，3 任意一个将输出
<?php if(in_array(($id), explode(',',"1,2,3"))): ?>id 在范围内<?php endif; ?>

//in 标签，支持 else
<?php if(in_array(($id), explode(',',"1,2,3"))): ?>id在范围内
<?php else: ?>
id不在范围内<?php endif; ?>

//notin 标签，正好相反
<?php if(!in_array(($id), explode(',',"1,2,3"))): ?>id 不在范围内<?php endif; ?>
//between标签，从哪里到哪里的范围
<?php $_RANGE_VAR_=explode(',',"1,10");if($id>= $_RANGE_VAR_[0] && $id<= $_RANGE_VAR_[1]):?>id 在范围内<?php endif; ?>
//notbetween标签，从哪里到哪里的范围
<?php $_RANGE_VAR_=explode(',',"1,10");if($id<$_RANGE_VAR_[0] || $id>$_RANGE_VAR_[1]):?>id 不在范围内<?php endif; ?>
//range标签，可以统一in、notin、between和notbetween
<?php if(in_array(($id), explode(',',"1,2,3"))): ?>id 在范围内<?php endif; ?>
//name值可以是系统变量
<?php if(in_array(($_GET['id']), explode(',',"1,2,3"))): ?>id 在范围内<?php endif; ?>
//value值可以是变量或系统变量
<?php if(in_array(($id), is_array($_GET['range'])?$_GET['range']:explode(',',$_GET['range']))): ?>id 在范围内<?php endif; ?>
ThinkPHP 模版提供了一组用于判断变量的标签。
//判断变量是否已赋值，赋值了就输出，空字符串也算赋值
<?php if(isset($user)): ?>user 已经赋值<?php endif; ?>
//判断变量是否已赋值，没有创建或赋值为null，都算没有值
<?php if(!isset($user)): ?>user 还没有值<?php endif; ?>
//判断变量是否已赋值，组合
<?php if(isset($user)): ?>user已赋值
<?php else: ?>
user未赋值<?php endif; ?>
 
<?php if(isset($_GET['user'])): ?>$_GET['user']已赋值<?php endif; ?>
<?php if(empty($user)): ?>user 为空值<?php endif; ?>

<?php if(!empty($user)): ?>user不为空值<?php endif; ?>
//判断变量是否为空，组合
<?php if(empty($user)): ?>user为空值
<?php else: ?>
user不为空值<?php endif; ?>

<?php if(defined("APP_PATH")): ?>APP_PATH 常量已定义<?php endif; ?>
//判断常量是否定义，没定义输出
<?php if(!defined("APP_PATH")): ?>APP_PATH 常量未定义<?php endif; ?>
//判断常量是否定义，组合
<?php if(defined("APP_PATH")): ?>APP_PATH常量已定义
<?php else: ?>
APP_PATH常量未定义<?php endif; ?>

//遍历volist  <br/>
//volist的name接收的是控制器传递过来的数据,是个数组  id="arr" 的意思是把数据赋给arr
//name 和 id 都是固定的 不能改为别的属性
//offset 从第几条开始，起始值 0，length 共多少条 一般不在模板里做，在控制器或model中做

<ul>   
<?php if(is_array($data1)): $i = 0; $__LIST__ = array_slice($data1,5,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li> <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

//通过 key 输出循环遍历的变量
<ul>   
<?php if(is_array($data1)): $k = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($k % 2 );++$k;?><li><?php echo ($k); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

//偶数时显示 mod 求当前余数，当前 index 除以 2 余 1(value)，输出偶数 【value可以是0 也可以是1】
<ul>   
<?php if(is_array($data1)): $k = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($k % 2 );++$k; if(($mod) == "1"): ?><li><?php echo ($k); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>


//没有指定 k，也可以用 i 变量输出
<ul>
<?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><?php echo ($i); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

//key 变量，可以直接输出索引值，从 0 开始
<ul>
<?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><?php echo ($key); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

//没有数据的情况下使用 empty 填充
<ul>
<?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><?php echo ($key); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>

//empty 属性不支持 HTML 直接输入，但可以通过控制器变量输出
<ul>
<?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><?php echo ($key); ?>. <?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?> </li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
</ul>


//foreach 没有额外的属性标签 相对volist更为简单
//只支持 key 属性，但{$key}变量支持
<ul>
    <?php if(is_array($data1)): foreach($data1 as $key=>$arr): ?><li><?php echo ($key+1); ?>.<?php echo ($arr["id"]); ?>--<?php echo ($arr["user"]); ?>--<?php echo ($arr["email"]); ?></li><?php endforeach; endif; ?>
</ul>


For标签就是简单的循环标签。 做数字循环
//从 1 到 99 循环
<?php $__FOR_START_15918__=1;$__FOR_END_15918__=100;for($i=$__FOR_START_15918__;$i < $__FOR_END_15918__;$i+=2){ echo ($i); ?><br/><?php } ?>

<?php $__FOR_START_11727__=1;$__FOR_END_11727__=100;for($k=$__FOR_START_11727__;$k < $__FOR_END_11727__;$k+=2){ echo ($k); ?><br/><?php } ?>

//模板中定义变量
<?php $var = '123'; ?>
<?php echo ($var); ?> 


//在模版中定义常量， value 值可以为变量 （$user） 或系统变量 （$Think.get.user）
<?php define('MY_NAME', 'Lee'); ?>
<?php echo (MY_NAME); ?>

PHP 代码可以和标签在模版文件中混合使用， 可以在模版文件里面书写任意的 PHP 语句
代码。
//使用 php 标签
<?php $a = 1; $b = 2; echo $a + $b; ?> 

//使用 php 语法
<?php
$a = 1; $b = 2; echo $a + $b; ?>
如果想原样输出标签极其内容，可以使用 literal 标签
//原样输出

<php>echo 123;</php>

-->

</body>
</html>