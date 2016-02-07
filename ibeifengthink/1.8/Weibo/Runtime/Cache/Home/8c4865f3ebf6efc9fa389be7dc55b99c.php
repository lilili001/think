<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
 模板中应用控制器变量
 模板中方法应用 md5 mb_str等
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>这是默认主题default下User控制器的index文件<br/>
            user：<b style="color:red;"><?php echo ($user); ?></b><br/>
            
            <!--数组有两种输出方法 [] 和 .  -->
            data_name:<b style="color:red;"><?php echo ($data['user']); ?></b>
            data_email:<b style="color:red;"><?php echo ($data["email"]); ?></b><br/>
            
            <!--对象有两种输出方法：-> 和 :  -->
            obj_name:<b style="color:red;"><?php echo ($obj->name); ?></b>
            obj_name:<b style="color:red;"><?php echo ($obj->name); ?></b><br/><br/>
            
            <!--以下是系统变量 可以通过刷新文件目录查看cache的生成文件 来查看原生
            <?php echo ($_SERVER['SCRIPT_NAME']); ?> //$_SERVER['SCRIPT_NAME'] <br/>
            <?php echo (session('admin')); ?> //$_SESSION['admin']<br/>
            <?php echo ($_GET['user']); ?> //$_GET['user']<br/>
            <?php echo ($_POST['user']); ?> //$_POST['user']<br/>
            <?php echo ($_REQUEST['user']); ?> //$_REQUEST['user']<br/>
            <?php echo (cookie('name')); ?> //$_COOKIE['name']<br/>
            //ThinkPHP的系统变量<br/>
            <?php echo (APP_PATH); ?> //目录<br/>
            <?php echo (C("url_model")); ?> //URL模式<br/>
            <?php echo (L("var_error")); ?> //语言变量<br/>
            
            //ThinkPHP的系统变量<br/><br/>
            <?php echo (APP_PATH); ?>  <br/>
            <?php echo (C("url_model")); ?> //URL模式<br/>
            <?php echo (L("var_error")); ?> //语言变量
            --> 
            
            <!--使用函数
            md5加密user: <?php echo (md5($user)); ?>
            -->
            <br/>
            前面输出变量，在后面定义<br/>
            <?php echo (mb_substr($user,0,3,'UTF-8')); ?><br/><br/>
            
            这句话的作用是将$date时间戳转化为日期格式，传参 $date 和 "Y-m-d H:i:s"两个参数,###的作用是将$date作为第二个参数<br/>
            <?php echo (date("Y-m-d H:i:s",$date)); ?><br/><br/>
            
            
            多个函数用"|"隔开即可<br/>
            <?php echo (md5(mb_substr($user,0,3,'UTF-8'))); ?><br/><br/>
            
            PS：如果你觉得以上写法需要在脑海里二次翻译，太过于麻烦，那么可以用以下的格式写法：{: 普通php写法 }<br/>
            <?php echo md5(mb_substr($user,0,3,'UTF-8'));?><br/><br/>
            
            当传递过来的变量如果没有值的时候，模版提供了默认值输出功能。<br/>
            <?php echo ((isset($nodate) && ($nodate !== ""))?($nodate):'没有数据！'); ?><br/><br/>
            
            我们可以在模版中使用运算符，包括对“+” 、 “-” 、 “*” 、 “/” 、 “%” 、 “--”和“++” 的支持。<br/>
            <?php echo ($num+10); ?><br/>
            <?php echo ($num+getNum()); ?> getNum函数在Weibo/Common/Common/function.php中<br/><br/>
            
            模版还支持三元运算符：
            <?php echo ($withdata ? '$withdata有值' : '$withdata无值'); ?><br/>
            
        </div>
    </body>
</html>