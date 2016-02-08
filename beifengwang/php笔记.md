4/26/2015 6:06:17 PM 
# 一：php的基本语法 #
## php是服务端语言 ##

## 1. php能完成的工作： ##
-   -php收集表单
- 	-生成动态网页
- 	-字符串处理
- 	-动态处理图像(验证码，股票数据统计图，缩略图，水印，缩放)
- 	-服务端的文件系统( 通过php来修改服务器端的文件 ,可操作目录和文件 )
- 	-编写数据库支持的网页( 支持很大范围的数据库  )
- 	-会话跟踪控制( 跟踪用户 ,记录用户行为 ,会员 )
- 	-处理xml文件
- 	-支持大量的网络协议( 支持http,imap,pop3等 )
- 	-服务器端的其他相关操作

php可以自由选择操作系统   web服务器以及数据库
可以使用面向对象或者面向过程的开发方式  目前是php5的时代

**php文件夹不能有中文**

php是嵌入语言脚本 `<?php  echo ""  ?>`  可以直接嵌入到 html 任意标签中
php语言标记 <?php  ?>


## 2. 指令分隔符“分号” 
- **一种是功能执行语句**(类似于声明变量，输出变量，表达式)

    √  后面一定要加**分号**

    与 `?>` 最近一条语句可以不加分号，建议都加分号

        例如：`<body bgColor="<?php echo "red"?>"></body>`

- **一种是结构定义语句**(if,for循环,while,函数,class类等)
 
    √  后面一定不要加分号
## 3.程序中的注释
    
注释的内容 php解析器会忽略到

- //单行注释
- 	/* */多行注释,其中不能包含单行注释
- 	#脚本注释
- 	/** */文档注释

3.向浏览器中输出：echo()、print()、printf()、sprintf()

    echo、print、printf 本身是函数，即函数()。但这里的输出函数可以省略括号，用空格+所需显示的字符串或变量。
    
	echo 和 print 功能几乎相同，而 echo 运行速度上比 print 稍稍快一点。因为 print 有返回值。
	
	echo 不返回任何值(void),print 返回的是整型(integer)
	
	printf()和 sprintf()是 C 语言模式 参数的，例如:printf("我今天买了%d 套视频光盘",5);
	
	//他们之间的不同点是,printf 返回的是整型字符串的长度(integer)，而 sprintf 返回的字符串(string)
	//printf 可以在浏览器直接输出，而 sprintf 相当于一个变量 保存在内存中,  需要 echo 将它输出 echo sprintf('***')
	
	常用类型指示符	
		类型 描述
		%b 整数，显示为二进制
		%c 整数，显示为 ASCII 字符
		%d 整数，显示为有符号十进制数
		%f 浮点数，显示为浮点数
		%o 整数，显示为八进制数
		%s 字符串，显示为字符串
		%u 整数，显示为无符号十进制数
		%x 整数，显示为小写的十六进制数
		%X 整数，显示为大写的十六进制数


 	
**注意**：注释要写在代码的  上边 或 右边

>1.**在程序中使用空白：**  空格  tab  换行

>2.如果 一个Php文件 全是php代码, 可以不用写 `?>`,直接写 `<?php ..`,这是因为很多方法都不允许前面有空格,而往往require一个文件的时候,如果被require的文件有空格就会报错,省略掉`?>`可以避免空格的问题。空白在php代码中被忽略
# 二：php中的变量 #
**课程内容：**

- 变量介绍
- 变量的声明 
- 变量的命名 
- 可变变量 
- 变量的引用赋值 
- 变量的类型
- 各种类型变量的声明

## 1.变量的声明 ##

1. 如果在用到数据时，需要用到多次就声明为变量使用
1. $变量名=值
1. 强类型语言中（C,Java）,声明变量一定要先指定类型（酒瓶）
1. PHP是弱类型的语言，**变量的类型由存储的值决定**（瓶子）
1. Isset(); 判断一个变量存不存在
1. Unset(); 删除一个变量
    	
    	<?php
			 $a = "hello world";
	    	 if(isset($a)){  //isset() 判断变量是否存在
	    	 	echo $a;
	    	 }else{
	    	 	echo "not exist!";
	    	 }
	    	 
	    	unset( $a );  //删除变量$a


## 2.变量的命名  ##

1. 变量前一定要使用”$”, 声明和使用都要有这个符号。
1. 不能以数字开头  *$1a --> no*
2. 不能使用PHP的运算符号  + - * /  % &  .
1. PHP**可以使用系统关键字**作为变量名
1. **注意：PHP变量区分
2. **，（只有变量和常量区分大小写，其它[关键字,函数等]不区分）

	    <?php
	    $a = "hello world";
    	$A ="welcome here!";
    	
    	echo $a."</br>";
    	echo $A."</br>";
    	
    	//不管echo是大写还是小写 或是混合写法 都可以执行
    	eCho $a."</br>"; 
    	ECho $a."</br>";

2. 变量名称一定要有意义，可以使用英文单词，也可以使用汉语拼音。aaa bbb ccc
1. $aaaBbbCcc  变量的命名风格

## 3.可变变量 ##
一个变量的变量名可以动态设置和使用


    	<?php
    	$one = "############";
    	$two = "one";
    	$three = "two";
    	$four = "three";
    	
    	echo $four."</br>";
    	echo $$four."</br>";
    	echo $$$four."</br>";
    	echo $$$$four."</br>";

## 4.变量的引用赋值 ##


	     <?php
         $one = 10;
    	 $two = $one;
    	 
    	 $one = 100;
    	 
    	 echo $one."</br>";
    	 echo $two."</br>";
--> 100  10

变量的引用,使用一个“&”符号加到将要赋值的变量前面（源变量）

	 $three = 3;
	 $four =&$three;//相当于给$three起个别名 $four  这个时候 $three 和 $four是一个对象,指的是同一个值
	 
	 $three = 300;
	 echo $three."</br>";
	 echo $four."</br>";
--> 300  300
## 5.变量的类型 ##
PHP是弱类型的语言

PHP中共有8种类型

**4种标量**

- 	整型：int integer 
- 	布尔型：bool boolean
- 	浮点型：float, double, real 
- 	字符串：string

**2种复合类型**

- 	数组： array
- 	对象:  object
	
**2种特殊类型**

- 资源类型：resource
- 空类型：null

Var_dump(变量或值) ;   //既可以查看变量或值的类型，又可以看数据 

     <?php
	 $one = 10;
	 echo "<pre>";
	 var_dump($one);
	 echo "</pre>";
## 4.各种类型变量的声明 ##
1.整型声明方法：

- $int = 10; //10进制
- $int = 045; // 8进制
- $int = 0xff; //16进制

整数的最大值 2的32次方

2.浮点型：

- $float = 10;
- $float = 3.14E5;//3.14乘以10的5次方  E可以大写也可以小写

3.布尔值 false:

'' , 0, null,'0',0.000,false,array()

4.字符串


在双引号的字符串中,不能再使用双引号,可以直接解析变量,也可以使用转义字符

在单引号的字符串中,不能再使用单引号,不可以直接解析变量,也不可以使用转义字符(但可以转义单引号本身,也可以转义转义字符"\"------>  \'    \\)

最好使用单引号

$a = 10;

- $str = 'string  $a'; //没有结果
- $str = "string $a"; 或者 $str ="string{$a}st\rin\tg \n" 或者 $str ="string${a}string"

//定界符声明字符串,大量字符串的时候,里边可能有单引号 也可能有"  one是自定义的
- $str = <<<one
one;
- $str = `dir`;

	<?php
		  $num=100;
	  $str=<<<hello
	  4654654"4hkj"hlk'jshd'fsdfs{$num}df
	  sdfasdfse\rewerervvg\trewr
	hello;
	
	echo $str;

2015-5-1

# 三：数据类型之间的转换 #

1. 强制转换


	setType(变量,类型) //类型：int  integer  float  double real  bool boolean string array objects **注意类型要加引号**

		$str="10.13adfsdf";
		settype($str, 'float');
		var_dump($str);

1. 自动转换：这是最常用的,开发时不用去管类型,变量会根据运行环境自动转换

	$变量=intval(变量或值);   //浮点型 转 整型的时候 浮点型数值不能超过 2.17e9

	$变量=floatval(变量或值);

	$变量=stringval(变量或值);

	字符串转换 为整型 或浮点型的时候  如果不是以数字开头 都会被转成0

		 $a =100;
		 $b="123ssss";
		 $c=true;
		 $d=2.365;
		 
		 $sum = $a +$b +$c +$d; 
		 echo $sum.'<br/>'; //226.365  php是弱类型 会根据表达式自动转换



与变量和类型有关的一些常用函数
isset() 判断变量存不存在  如果是null 也表示是变量不存在
unset() 删除一个变量
settype(变量,类型) 设置变量类型
gettype() 获取变量类型
empty() 判断变量是否为空  //空格 “” null  null变量为空


   变量类型测试函数：

-   is_bool();
-   is_int() is_integer() is_long() 判
-   断整型
-   is_string()
-   is_float() , is_double(),is_real()判断浮点型
-   is_array()
-   is_object()
-   is_resource() 判断是否是资源
-   is_null()判断空
  
-   is_scalar()判断是否是标量  -->整型 浮点型 布尔型 字符串
-   is_numberic() 判断是否是数字或是字符串类型的数字 任何类型的数字
-   is_callable() 判断是否是有效的函数名


常量的声明和使用：
环境变量也是常量

  常量：

- * 1.简单值得标识符，
-  * 2.常量定以后不能再改变它的值，也不能使用unset()取消,也不能使用其他的函数取消 例如:PI.
-  * 3.常量可以不用理会变量范围的规则,而在任何地方都可以定义和访问。
-  * 4.常量使用define(常量名,常量值)
-  * 5.常量声明不适用$  而变量需要$
-  * 6.常量名称习惯大写
-  * 7.常量只能用常量的值  只能用标量类型:整型 布尔 浮点型
-  * 8.常量一定要在声明时给值 因为后期不能再赋值,它的值声明了就不能改变
-  * 9.判断常量存不存在 defined("常量名") if(defined('HOME')){...}

1.  常量还分预定义常量 和魔术常量
1.  预定义常量：CASE_LOWER
1.  魔术常量：__FILE__  读取当前文件路径
1.          __LINE__ 读取当前是哪一行
1.     	  __FUNCTION__ 
1.  PHP_VERSION


常量通过define()定义：define(常量名，常量值) 定义了就不可以更改  常量没有$ 变量有 $
环境变量也是一种常量

![](http://i.imgur.com/vsvRRfX.png)

	define('home','www.miya.com'); //定义常量
	 $home='25635'; //定义变量
	 s
	 function show(){
	 	echo home.'</br>'; //常量可以不用理会变量范围的规则,而在任何地方都可以定义和访问 
		echo $home;
	 }
	show();  //www.miya.com

# 四：运算符与表达式 #

- 一、算术运算符    +    *  /  %  ++  --
- 二、字符串运算符  .  
- 三、赋值运算符    =   += -= *= /= %=  .= 
- 四、比较运算符    >  <  >= <= == ===  != 或<> !== 
- 五、逻辑运算符    && 或and  ||或 or  ! 或not   
- 六、位运算符      &   ｜ ^ ~   <<  >> >>>
- 七、其他运算符   ? :  ``  @  => -> ::  & $

%会把两边的数变成整数再进行整除

# 五：流程控制 #

- 顺序结构
- 分支结构--条件结构--选择结构
  >单路分支
  
    if(){}
  
  >双路分支
  
    if(){
		语句1
	}else{
		语句2
	}
  
  
  >多路分支 //互斥的结构
    
	if(){
	}else if(){
	}else{}

	switch(变量){  //如果变量没有匹配的值 则执行default中的区域,default 可加可不加，break是为了退出switch
		case 'css':
			 代码;
			break;
   		case 'html':
			 代码;
			break;
		default：
			代码
	}
  
  >嵌套分支 //嵌套最好不要超过5层
    
	if(){
		if(){}
	}else{
	
	}
  
- 循环结构

1. while
2. do-while
3. for

根据循环条件不同 有两种类型的循环

- 计数循环  
- 条件型循环	


php中的静态变量

1.静态变量在静态代码段中保存

2.一个函数多次调用之间共用，单只在第一次调用 函数时声明到内存，以后再调用，就不再声明，而直接使用

变量函数：也叫可变函数  如果一个变量后有() $var='hello'  $var() 就将寻找与变量值同名的函数

function one($a,$b){return $a+$b}
function two($a,$b){return $a*$a+$b*$b}
function three($a,$b){return $a*$a*$a+$b*$b*$b}

带有 mixed 的函数，mixed表示可以传任何类型的数据

带有&的函数，表示引用赋值，这个参数不能传值，只能传一个变量，然后函数将变量的值改变，我们在使用这个变量时 是变化的

	$arr=array(1,2,9,4,5,6);
    sort($arr)

带有[]的函数 表示这个参数是可选的 实参可以比形参少

带有...的函数，表示 可以传任意多个值  实参可以比形参多  

int array_unshift( array &array,mixed var[,mixed ...] )

$args=func_get_args() 获取函数的所有参数
count($args)

	function demo(){
		$sum=0;
		for($i=0;$i<func_num_args() ;$i++){
			//$sum+=$args[$i]
			$sum+=func_num_args($i) 			
		}
		return $sum
	}
	echo demo(1,2,2,3,3)

常用系统函数

资源=opendir("目录名")
readdir(资源) 返回的是资源下的第一个文件

is_dir(文件) 判断是不是目录 

demo3

	 //带& 传进来的是变量
    function total($dirname,&$dirnum,&$filenum){
    	$dir = opendir($dirname);
		 readdir($dir)."<br/>";//. 代表当前目录
		 readdir($dir)."<br/>";// ..代表上级目录 我们不把. 和..输出 只读
		echo readdir($dir)."<br/>";
		echo readdir($dir)."<br/>";
		echo readdir($dir)."<br/>";
		//我们在demo4中用循环的方式来输出所有的文件名
    }
	$dirnum=0;
	$filennum=0;
	total("E:/xampp/phpMyAdmin",$dirnum,$filenum);
	echo "目录总数：".$dirnum ;
	echo "目录总数：".$filennum ;

输出结果：
	browse_foreigners.php
	ChangeLog
	changelog.php
	目录总数：0目录总数：0	


demo5:

    //带& 传进来的是变量
    function total($dirname,&$dirnum,&$filenum){
    	$dir = opendir($dirname);
		 readdir($dir)."<br/>";//. 代表当前目录
		 readdir($dir)."<br/>";// ..代表上级目录 我们不把. 和..输出 只读
	 
		 while($filenameaa=readdir($dir)) {
			 $newfile = $dirname."/".$filenameaa;  //如果是 "E:/xampp/phpMyAdmin"这个目录下的
			 
			 if( is_dir($newfile) ){
			 	$dirnum++;   //如果读取的是目录 目录数++
			 }else{
			 	$filenum++; //如果读取的是文件 文件数++
			 } 
		 }
		 closedir($dirname);
		  
		//我们在demo4中用循环的方式来输出所有的文件名
    }
	$dirnum=0;
	$filenum=0;
	total("E:/xampp/phpMyAdmin",$dirnum,$filenum);
	echo "目录总数：".$dirnum ."<br/>";
	echo "文件总数：".$filenum ;

输出结果：

目录总数：7
文件总数：97


文件引用:require,include,require_once,include_once

带once的就是判断有没有包含过，如果包含过，那后面的就不再执行 只包含一次

## 数组： ##

数组：管理操作一组变量

--------------------------------------------------------------
一． 目录操作
解析目录路径：basename()函数返回路径的文件名部分。
<?
$path = 'C:\AppServ\www\Basic6\Demo1.php';
echo 'path:'.basename($path);
?>
获取路径的目录：dirname()函数返回路径目录部分。
<?
$path = 'C:\AppServ\www\Basic6\Demo1.php';
echo 'path:'.dirname($path);
?>


# 数据库 #

net start mysql 或者 service mysqld start / restart

mysql的目录结构：
my.ini  bin/  data/

**了解数据库的sql语句操作：**

sql（Structured Query Language）结构化的查询语言

- DDL 定义和管理数据对象  创建库 创建表
 
- DML  插入更新删除

- DQL  数据查询

- DCL  数据控制语句 管理数据库 管理权限 数据的更改等

1.执行sql语句 需要连接到数据库  可以在cmd命令行 执行mysql(前提是设置了环境变量 E:\xampp\mysql\bin)

连接数据库：mysql -h 192.168.1.12/www.aaa.com/localhost -u root -p123456 使用root用户连接到服务器 / 或者  密码可以不写

密码输入还可以 这样 mysql -h 192.168.1.12 -u root -p 回车
然后要求输入密码 再输 这样输入的密码就不是明文的了 别人不可以通过方向键查看到

进入数据库后 查看状态 \s

查看配置文件中的变量：show variables like 'time_zone';

查看端口  show variables like 'port';

查看现有的库：show databases;

创建数据库: create database xsphpdb;
		或者:create database if not exists xsphpdb;

删除数据库 drop database xsphpdb;
或者:drop database if exists xsphpdb;

切换默认库：user xsphpdb;(这里分号可省)

在当前库下查看所有表 show tables;

查看表结构 desc users;

创建表：create table if not exists xsphpdb.users<id int,name char<30>,age int,sex char<3>>

当前库下创建表:create table if not exists users<id int,name char<30>,age int,sex char<3>>

删除users表 drop table if exists users;

在users表中插入数据: insert into users values<'1','zhangsan','10','nan'> 
所有的数据都按字符串处理，它会自动转换

插入部分字段  或全部  这样做的好处是指定了字段 不用考虑顺序
insert into users<id,name,age> values<'10','wangwu','33'>

查看数据：select * from users;

更新数据 update users set name='lili','age'='10', 'sex'='nan' where id='2'  这就修改了id为2的字段 修改多个值用,隔开

删除数据 delete from users where id=2 删除id为2的数据

**SQL是不区分大小写的：**

1.表名或字段名一定要有意义

2.自己定义的名称最好都小写

3.SQL语句都大写


**拆分命令为多行**

eg:CREATE TABLE IF NOT EXISTS users< 回车
   -> id INT，
   -> name CHAR<40>
   -> \c 退出

查看表           SHOW TABLES;
查看users表结构  DESC users;


**数据值和列表类:(大的分类)**

系分都是按空间大小来区分的

- 数值型

	1. 整型
	
		- 非常小的整型，
		- 较小的整型，
		- 中等大小的整型，
		- 标准整型，
		- 大整形

	2. 浮点型 
		CREATE TABLE TAB3<price FLOAT(5,2)>;创建浮点型 小数点之前5位数 保留两位小数
		
		insert into tab3<price> values<12345.63>
		
		select * frome tab3
		结果:999399
	
- 字符型

- 日期型

3、日期型
 *		
 *			DATE          YYYY-MM-DD
 *			TIME          hh:mm:ss
 *			DATETIME      YYYY-MM-DD hh:mm:ss
 *			TIMESTAMP     YYYYMMDDhhmmss  
 *
 *			YEAR          YYYY
 *
 *			创建表时最好不要使用这些中的时间格式（PHP中时间戳 1970-1-1 0:0:0）是一整数
 *			
 *			用整数保存时间  time();
 *			
 *			int



- null

设置字符集，如果是 GBK，直接设置 SET NAMES GBK 即可
<?php
@mysql_query('SET NAMES UTF8') or die('字符集设置错误');
?>
获取记录集
<?php
$query = "SELECT * FROM grade";
$result = @mysql_query($query) or die('SQL 语句有误！错误信息：
'.mysql_error());
?>
输出一条记录
<?php
print_r(mysql_fetch_array($result,MYSQL_ASSOC));
?>

------------------------------

DDL 
 *  		create database 库名
 *		create table [库名.]表名  use 库名
 *
 *		drop database 库名
 *		drop table 表名
 *  	DML
 *  		insert into users(id, name) values('1', 'zhangsan');
 *  		update users set name='aa', age='10' where id='1';
 *  		delete from 表名 where id='2';
 *
 *  	DQL
 *  		select * from 表名;
 *
 *  	DCL
 *
 *  	\s看状态
 *  	show databases 看所有库
 *  	show tables 看所有表
 *  	desc 看表结构
 *  	show variables配置文件中的变量
 
 ---------------------------------------------	
exit 退出

二． Session
会话处理
在使用 session 会话处理，必须开始 session，使用 session_start()开始会话。
创建 session 并读取 session
<?php
session_start();
$_SESSION['name'] = 'Lee';
echo $_SESSION['name'];
?>
判断 session 是否存在
<?php
session_start();
$_SESSION['name'] = 'Lee';
if (isset($_SESSION['name'])) {
echo $_SESSION['name'];
}
?>


### php面向对象

数组和对象：都属于php的符合类型(一个变量可以存储多个单元)

对象比数组更强大，不仅可以存储多个数据，还可以将函数存在对象中

对象的三大特性：封装，继承，多态

面向对象编程(oop )

面向对象和面向过程的区别
	
1. 最小的单位：函数-->面向过程

2. 最小的单位：对象 -->面向对象
1.面向对象 object oriented
    对象：object
        对象包含两部分：
            - 对象的组成元素
                .对象的数据模型,用于描述对象的数据
                .又被称为对象的属性,或者对象的成员变量
            - 对象的行为
                .是对象的行为模型,用于描述对象能做什么事
                .又被称为对象的方法
        对象的特点：
            .每个对象都是独一无二的
            .对象是一个特定事物,他的职能是完成特定功能
            .对象是可以重复使用的
    面向：orirented
    
2.什么是面向对象？
    -面向就是在编程的时候一直把对象放在心上
  面向对象编程就是在编程的时候数据结构(数据组织方式)都通过对象的结构进行存储
    -属性 方法
3.类
+-----------------------------------------------------------------------------------------+
            <?php
        //类的定义以 class 关键字开始 后面跟 类的名称 通常第一个字母大写 以 大括号开始 和结束
        //类的属性和方法 前面都要加关键字 例如public 
        class NbaPlayer{
            //定义类的属性
            public $name="Jordan";
            public $height="198cm";
            public $weight="98kg";
            public $team="bull";
            public $playernumber="123";

            //定义方法
            public function jump(){
                echo "jumping";
            }
            public function run(){
                echo "runing";
            }
            public function dribble(){
                echo "dribble";
            }
            public function shooting(){
                echo "shooting";
            }
            public function dunk(){
                echo "dunking";
            }
            public function pass(){
                echo "passing";
            }
        };
        //类到对象的实例化
        //类的实例化 new 后面紧跟 类的名称()
        $jordan = new NbaPlayer();
        //对象中的属性 方法 可以通过 ->来访问 ： 实例名称->属性
        echo $jordan->name;  //打印$jordan的名字
+-----------------------------------------------------------------------------------------+
php 中可以用extends关键字来表示类的继承,后面跟父类的类名,php中的extends后面只能跟一个类的类名,这就叫单继承原则

php访问控制
public:公有类成员,可以在任何地方被访问
protected:被保护的类 可以被自身以及子类访问
private:私有类成员 只能被自身访问
 

think php 每个项目都有自己的配置文件 包括前后台 前台有前台的配置 后台有后台的配置 不可通用
thinkphp的控制器是php的一个类，需要继承自thinkphp的核心类controller
前置和后置操作是在执行某个操作方法之前和之后会自动调用的方法，这个仅对访问控制器有效
通过配置 ACTION_SUFFIX的值来改变操作方法的书写 
空控制器-当系统找不到请求的控制其名称的时候，系统会尝试定位到空的控制器 EmptyController
空操作-当系统找不到请求的操作方法的时候，系统会尝试定位到空的方法 _empty()
控制器调用的四种方法 url自动定位 new 实例化 A函数 R函数

#第8章 字符串处理
	一． 字符串格式化
		<?php  echo trim(' PHP '); ?>

#第11章 表单与验证
     Header()函数
     
	 1.用于重新导向指定的 URL
		<?php header('Location:http://www.baidu.com');?>
		2.用于设置页面字符编码
		<?php 
			header('Content-Type: text/html; charset=gbk');
			echo '嘿嘿，我是中文！页面编码是GBK，文件也是GBK';
		?>
  	  详见11-form demo

#第14章 图像处理
		创建图像的一般流程：
		1).设定标头，告诉浏览器你要生成的 MIME类型。
		2).创建一个图像区域，以后的操作都将基于此图像区域。
		3).在空白图像区域绘制填充背景。
		4).在背景上绘制图形轮廓输入文本。
		5).输出最终图形。
		6).清除所有资源。
		7).其他页面调用图像。
		设定标头指定 MIME输出类型
		<?php
		header('Content-Type: image/png');
		?>
		创建一个空白的图像区域
		<?php
		$im = imagecreatetruecolor(200,200);
		?>
		在空白图像区域绘制填充背景
		<?php
		$blue = imagecolorallocate($im,0,102,255);
		imagefill($im,0,0,$blue);
		?>
	   	
	   	在背景上绘制图形轮廓输入文本
		<?php
		$white = imagecolorallocate($im,255,255,255);
		imageline($im,0,0,200,200,$white);
		imageline($im,200,0,0,200,$white);
		imagestring($im, 5, 80, 20, "Mr.Lee", $white);
		?>
		
		输出最终图形
		<?php
		imagepng($im);
		?>
		清除所有资源
		<?php
		imagedestroy($im);
		?>
		其他页面调用创建的图形
		<img src= "Demo4.php" alt= "PHP 创建的图片" />
	   	
		    简单验证码
		<?php
		header('Content-type: image/png');
		for($Tmpa=0;$Tmpa<4;$Tmpa++){
		$nmsg.=dechex(rand(0,15));
		}
		$im = imagecreatetruecolor(75,25);
		$blue = imagecolorallocate($im,0,102,255);
		$white = imagecolorallocate($im,255,255,255);
		imagefill($im,0,0,$blue);
		imagestring($im,5,20,4,$nmsg,$white);
		imagepng($im);
		imagedestroy($im);
		?> 	
   	    加载已有的图像
		<?php
		header('Content-Type:image/png');
		define('__DIR__',dirname(__FILE__).'\\');
		$im = imagecreatefrompng(__DIR__.'222.png');
		$white = imagecolorallocate($im,255,255,255);
   	imagestring($im,3,5,5,'http://www.yc60.com',$white);
	imagepng($im);
	imagedestroy($im);
	?>
	加载已有的系统字体
	<?php
	$text = iconv("gbk","utf-8","李炎恢");
	$font = 'C:\WINDOWS\Fonts\SIMHEI.TTF';
	imagettftext($im,20,0,30,30,$white,$font,$text);
	?>
   	
   
#第15章.mysql 数据库
  ##15-1
	mysql 操作：
	1)打开mysql终端
	2)输入root的设置密码
	
	在终端写命令的时候，关键字 小写，其他命令都大写
	
	终端进入数据库：mysql -h localhost -u root 
	        如果有密码： mysql -h localhost -u root -p password
	   
	  -1:显示数据库版本号以及日期：
	     mysql>SELECT VERSION(),CURRENT_DATE(); 
	              这里的,是两个一起输出的意思，
	              注意要用分号 ; 结尾    
	         输出结果如下 两行两列  字段名就是函数名  
	        +-----------+----------------+
			| VERSION() | CURRENT_DATE() |
			+-----------+----------------+
			| 5.6.11    | 2015-07-04     |
			+-----------+----------------+	
	   -2:可以用别名version 替换函数名 作为字段 结果如下
		mysql>SELECT VERSION() AS version, CURRENT_DATE() AS date;
			+---------+------------+
			| version | date       |
			+---------+------------+
			| 5.6.11  | 2015-07-04 |
			+---------+------------+
	   -3：可以执行计算的结果：mysql>(20+5)*4; 也可以像上面一样用别名 mysql>(20+5)*4 AS result;
		    +----------+ 
			| (20+5)*4 |  
			+----------+ 
			| 100      |  
			+----------+ 
		-4: 通过多行实现数据库的使用者和日期,分号 ; 代表结束

			mysql> SELECT
			    -> USER()
			    -> ,
			    -> NOW()
			    -> ;
			+----------------+---------------------+
			| USER()         | NOW()               |
			+----------------+---------------------+
			| root@localhost | 2015-07-04 13:45:17 |
			+----------------+---------------------+
		-5:通过一行显示数据库使用者和日期  分号就分别打印出了两个表格，而上面的逗号是一个表格
		mysql> SELECT USER();SELECT NOW();
			+----------------+
			| USER()         |
			+----------------+
			| root@localhost |
			+----------------+
			1 row in set (0.00 sec)
			
			+---------------------+
			| NOW()               |
			+---------------------+
			| 2015-07-04 13:50:38 |
			+---------------------+
			1 row in set (0.00 sec)
		-6：命令的取消  当命令输错的时候 可以取消 \c
		   mysql> SELEET
			   -> \c
		   mysql>
		-7:命令的退出: exit; 或者quit;
		   mysql> SELEET
			   -> \c
		   mysql> exit;
		   Bye
		   C:\Users\Administrator>
	##15-2  mysql常用数据类型
	            整数型：TINYINT，SMALLINT，INT，BIGINT
		浮点型：FLOAT，DOUBLE，DECIMAL(M,D)
		字符型：CHAR，VARCHAR
		日期型：DATETIME，DATE，TIMESTAMP
		备注型：TINYTEXT，TEXT，LONGTEXT
		
	         整数型:这是表格  这个不是命令行		
	   +------------+---------+------------------------+---------------------------+
	   |类型			|	 字节	  |	最小值			       |    	  最大值			   |	
	   |  		    |		  |(带符号的/无符号的)          |     (带符号的/无符号的)         |
	   +------------+---------+------------------------+---------------------------+									
	   |TINYINT		| 	 1	  | -128				   |		 127			   |	
	   |			|		  | 0					   |		 255c			   |
	   +------------+---------+------------------------+---------------------------+															
	   |SMALLINT	|	 2	  |	-32768				   |	 32767 				   |
	   |			|		  |	0					   |	 65535				   |
	   +------------+---------+------------------------+---------------------------+	
	   |MEDIUMINT	|	 3	  |	-8388608			   |	 8388607			   |	
	   |			|		  |	0					   |	 16777215			   |
	   +------------+---------+------------------------+---------------------------+
	   |INT			|	 4 	  |	-2147483648			   |	 2147483647			   |	
	   |			|		  |	0					   |	 4294967295			   |
	   +------------+---------+------------------------+---------------------------+
	   |BIGINT	    |	 8 	  |	-9223372036854775808   |      9223372036854775807  |
	   |		    |		  |	0 				       |	 18446744073709551615  |
	   +------------+---------+------------------------+---------------------------+
	   
	         浮点型:这是表格  这个不是命令行		
	   +------------+---------+--------------------------+---------------------------+															
	   |类型			|	字节	  |	最小值				     | 	最大值 				     |
	   +------------+---------+--------------------------+---------------------------+	
	   |FLOAT		|	 4	  |	+-1.175494351E-38	     |  +-3.402823466E+38		 |	
	   +------------+---------+--------------------------+---------------------------+
	   |DOUBLE		|	 8 	  | +-2.2250738585072014E-308|	+-1.7976931348623157E+308|			   |	 
	   +------------+---------+--------------------------+---------------------------+
	   |DECIMAL	    |	可变 	  |	它的取值范围可变。   			 |   					     |
	   +------------+---------+--------------------------+---------------------------+	
	   	
		
										
	            日期型
 
		DATETIME '0000-00-00 00:00:00'
		DATE '0000-00-00'
		TIMESTAMP 00000000000000
		TIME '00:00:00'
		YEAR 0000
		
		日期型：
	   +------------+------------------------------------+ 															
	   |列类型		|	   	值	   		 				 |
	   +------------+------------------------------------+ 	
	   |DATETIME	|	 '0000-00-00 00:00:00'	   	     |		  	
	   +------------+------------------------------------+ 
	   |DATE		|	 '0000-00-00'	   		  		 |	 
	   +------------+------------------------------------+ 
	   |TIMESTAM    |	  00000000000000 	   			 |		     
	   +------------+------------------------------------+ 
	   |TIME        |	 '00:00:00 	  					 |
	   +------------+------------------------------------+ 
	   |YEAR        |	  0000	   					     |
	   +------------+------------------------------------+ 	
		'ab  ' char 4个字节，空格也算 varchar3个字节 去掉空格 并多加一个
		 
		值                           CHAR(4)     存储需求          VARCHAR(4)   存储需求
		''         ' '         4个字节                   ''         1个字节
	   	'ab'       'ab '       4个字节                  'ab '      3个字节 
	   	'abcd'     'abcd'      4个字节              'abcd'       5个字节
		'abcdefgh' 'abcd'	   4个字节 	 'abcd'	      5个字节
	   	
	   	备注型：
	   	TINYTEXT	   字符串，最大长度255个字符
		TEXT		   字符串，最大长度65535个字符  
		MEDIUMTEXT   字符串，最大长度16777215个字符
		LONGTEXT 	   字符串，最大长度4294967295个字符  用于备注大文章 帖子 新闻 
	   	varchar 	   用户名 文章标题
	   	char		   密码 性别之类
	   	
	   	用途：	
 	    char:定长 访问速度块
 	    varchar:好处 容量小
 	    
	##MySQL 数据库操作
		1)显示当前存在的数据库
			>SHOW DATABASES;
		2)选择你所需要的数据库
			>USE guest;
		3)查看当前所选择的数据库
			>SELECT DATABASE();
		4)查看一张表的所有内容
			>SELECT * FROM 某张表名; //可以先通过 SHOW TABLES;来查看有多少张表
			mysql> SELECT * FROM g_friend;
			+------+----------+------------+----------+---------------------+
			| G_ID | G_ToUser | G_FromUser | G_Degree | G_Date              |
			+------+----------+------------+----------+---------------------+
			|    1 | 大娘水饺 | 炎日       |        0 | 2009-04-21 14:56:03 |
			|    2 | 小燕子   | 炎日       |        0 | 2009-05-03 10:51:11 |
			|    5 | 炎日     | 樱桃小丸子 |        1 | 2009-05-03 10:56:31 |
			+------+----------+------------+----------+---------------------+
		5)根据数据库设置中文编码
			>SET NAMES gbk; //set names utf8;  gbk中文编码
		6)创建一个数据库
			>CREATE DATABASE book;
		7)在数据库里创建一张表
			>CREATE TABLE users (
			>usernameVARCHAR(20), //NOT NULL 设置不允许为空  如果这一字段数据为空则报错
			>sex CHAR(1),
			>birth DATETIME) DEFAULT CHARSET = utf8;
		8)显示表的结构
			>DESCIRBE users;
			mysql> DESCRIBE users;
			+----------+-------------+------+-----+---------+-------+
			| Field    | Type        | Null | Key | Default | Extra |
			+----------+-------------+------+-----+---------+-------+
			| username | varchar(20) | YES  |     | NULL    |       |
			| sex      | char(1)     | YES  |     | NULL    |       |
			| birth    | datetime    | YES  |     | NULL    |       |
			+----------+-------------+------+-----+---------+-------+
		9)给表插入一条数据
			mysql> INSERT INTO users (username,six,birth) VALUES ('polyna','1',NOW());
			
			插入数据之后再查看表：
			mysql> SELECT * FROM users;
			+----------+------+---------------------+
			| username | sex  | birth               |
			+----------+------+---------------------+
			| polyna   | 1    | 2015-07-04 20:31:24 |
			+----------+------+---------------------+
			
			这里又重新建了一张表 friends;
			插入中文数据：切记在建表的时候要设置字符集 DEFAULT CHARSET = utf8; 不然会乱码
			mysql> SET NAMES GBK;

			mysql> INSERT INTO friends (username,sex,birth) VALUES ('章含','男',NOW());
			mysql> INSERT INTO friends (username,sex,birth) VALUES ('小美女','女',NOW());
			mysql> INSERT INTO friends (username,sex,birth) VALUES ('alice','1',NOW());
			mysql> INSERT INTO friends (username,sex,birth) VALUES ('joe','0',NOW());
			
			mysql> SELECT * FROM friends;
			+----------+------+---------------------+
			| username | sex  | birth               |
			+----------+------+---------------------+
			| 章含     | 男   | 2015-07-04 21:05:54 |
			| 小美女   | 女   | 2015-07-04 21:09:25 |
			| alice    | 1    | 2015-07-04 21:12:58 |
			| joe      | 0    | 2015-07-04 21:13:20 |
			+----------+------+---------------------+
			
			
		10)筛选指定的数据 
		            显示用户名为joe的字段
			mysql> SELECT * FROM friends  WHERE username = 'joe';
			+----------+------+---------------------+
			| username | sex  | birth               |
			+----------+------+---------------------+
			| joe      | 0    | 2015-07-04 21:13:20 |
			+----------+------+---------------------+
			或者：只显示 username 和 sex的字段
			mysql> SELECT username,sex FROM friends;
			+----------+------+
			| username | sex  |
			+----------+------+
			| 章含     | 男   |
			| 小美女   | 女   |
			| alice    | 1    |
			| joe      | 0    |
			+----------+------+
			
		11)修改指定的数据
			>UPDATE usersSET sex = '男' WHERE username='Lee';
			
			
		12)删除指定的数据
			mysql> DELETE FROM friends  WHERE username = 'joe';
 
			mysql> SELECT * FROM friends;
			+----------+------+---------------------+
			| username | sex  | birth               |
			+----------+------+---------------------+
			| 章含 	   | 男  	  | 2015-07-04 21:05:54 |
			| 小美女 	   | 女  	  | 2015-07-04 21:09:25 |
			| alice    | 1    | 2015-07-04 21:12:58 |
			+----------+------+---------------------+
			
		13)按指定的数据排序
			> SELECT * FROM usersORDER BY birth DESC; //倒序 一般用倒序比较多
			
			mysql> SELECT * FROM friends ORDER BY birth DESC;
			+----------+------+---------------------+
			| username | sex  | birth               |
			+----------+------+---------------------+
			| alice    | 1    | 2015-07-04 21:12:58 |
			| 小美女	   | 女 	  | 2015-07-04 21:09:25 |
			| 章含   	   | 男 	  | 2015-07-04 21:05:54 |
			+----------+------+---------------------+
			
			默认是按照 正序 ASC 显示
			
		14)删除指定的表
			>DROP TABLE users;
			
			mysql> DROP TABLE users;
			mysql> SHOW TABLES;
			+----------------+
			| Tables_in_book |
			+----------------+
			| friends        |
			+----------------+
			
		15)删除指定的数据库
			>DROP DATABASE book;	
			
		16)数据更新
		mysql> SELECT * FROM g_friend; 查看 g_friend这张表
		+------+----------+------------+----------+---------------------+
		| G_ID | G_ToUser | G_FromUser | G_Degree | G_Date              |
		+------+----------+------------+----------+---------------------+
		|    1 | 大娘水饺 | 炎日       |        0 | 2009-04-21 14:56:03 |
		|    2 | 小燕子   | 炎日       |        0 | 2009-05-03 10:51:11 |
		|    5 | 炎日     | 樱桃小丸子 |        1 | 2009-05-03 10:56:31 |
		+------+----------+------------+----------+---------------------+
		 
		g_friend这张表中将大娘水饺  改为  大娘大饺
		mysql> UPDATE g_friend SET g_touser = '大娘大饺'  WHERE g_id=1;
		然后查看：
		mysql> SELECT * FROM g_friend;
		+------+----------+------------+----------+---------------------+
		| G_ID | G_ToUser | G_FromUser | G_Degree | G_Date              |
		+------+----------+------------+----------+---------------------+
		|    1 | 大娘大饺 | 炎日       |        0 | 2009-04-21 14:56:03 |
		|    2 | 小燕子   | 炎日       |        0 | 2009-05-03 10:51:11 |
		|    5 | 炎日     | 樱桃小丸子 |        1 | 2009-05-03 10:56:31 |
		+------+----------+------------+----------+---------------------+
   ##15-3
     mysql的常用函数：
     	CONCAT()	 CONCAT(x,y,...)	 创建形如 xy 的新字符串
		LENGTH()	 LENGTH(column)		 返回列中储存的值的长度
		LEFT()		 LEFT(column,x)		 从列的值中返回最左边的 x 个字符
		RIGHT()		 RIGHT(column,x)	 从列的值中返回最右边的 x 个字符
		TRIM() 		 TRIM(column) 		从存储的值删除开头和结尾的空格
		UPPER()		 UPPER(column)		 把存储的字符串全部大写
		LOWER()		 LOWER(column)		 把存储的字符串全部小写
		SUBSTRING()  SUBSTRING(column, start,length) 从 column中返回开始 start的 length个字符（索引从 0 开始）
		MD5()		 MD5(column) 把储存的字符串用 MD5 加密
		SHA()		 SHA(column) 把存储的字符串用 SHA 加密
		
		CONCAT()： 创建形如 xy 的新字符串
		mysql> SELECT CONCAT('Mr.','Li');
		+--------------------+
		| CONCAT('Mr.','Li') |
		+--------------------+
		| Mr.Li              |
		+--------------------+
		
		LENGTH()：返回列中储存的值的长度
		mysql> SELECT LENGTH('Lee');
		+---------------+
		| LENGTH('Lee') |
		+---------------+
		|             3 |
		+---------------+
		
		LEFT()：从列的值中返回最左边的 x 个字符
		mysql> SELECT LEFT('Lee',2);
		+---------------+
		| LEFT('Lee',2) |
		+---------------+
		| Le            |
		+---------------+
		
		SUBSTRING()  SUBSTRING(column, start,length) 从 column中返回开始 start的 length个字符（索引从 0 开始）
		mysql> SELECT SUBSTRING('teacher alice',2,3);
		+--------------------------------+
		| SUBSTRING('teacher alice',2,3) |
		+--------------------------------+
		| eac                            |
		+--------------------------------+
		
		MD5()		 MD5(column) 把储存的字符串用 MD5 加密
		mysql> SELECT MD5('123456');
		+----------------------------------+
		| MD5('123456')                    |
		+----------------------------------+
		| e10adc3949ba59abbe56e057f20f883e |
		+----------------------------------+
		
		数字函数:用法同上
		函数			 用法			 描述
		ABS() 		ABS(x) 		 返回 x 的绝对值
		CEILING() 	CEILING(x)	 返回 x 的值的最大整数
		FLOOR() 	FLOOR(x) 	 返回 x 的整数
		ROUND() 	ROUND(x)	 返回 x 的四舍五入整数
		MOD() 		MOD(x)		 返回 x 的余数
		RNAD() 		RNAD()		 返回 0-1.0之间随机数
		FORMAT() 	FORMAT(x,y) 返回一个格式化后的小数
		SIGN() 		SIGN(x)		 返回一个值，正数(+1) ， 0 ，负数 (-1)
		SQRT()		SQRT(x) 	 返回 x 的平方根
     
        RNAD() 		RNAD()		 返回 0-1.0之间随机数
        mysql> SELECT RAND()+10 AS '随机数+10' ;
		+--------------------+
		| 随机数+10          |
		+--------------------+
		| 10.994393341238045 |
		+--------------------+
		
		日期函数：
		函数				 用法						 描述
		HOUR()			HOUR(column)			 只返回储存日期的小时值
		MINUTE()		MINUTE(column)  		只返回储存日期的分钟值
		SECOND() 		SECOND(column)			 只返回储存日期的秒值
		DAYNAME() 		DAYNAME(column) 		返回日期值中天的名称
		DAYOFMONTH() 	DAYOFMONTH(column) 		返回日期值中当月第几天
		MONTHNAME() 	MONTHNAME(column) 		返回日期值中月份的名称
		MONTH() 		MONTH(column) 			返回日期值中月份的数字值
		YEAR() 			YEAR(column) 			返回日期值中年份的数字值
		CURDATE() 		CURDATE() 				返回当前日期
		CURTIME() 		CURTIME() 				返回当前时间
		NOW() 			NOW() 					返回当前时间和日期
		
		mysql> SELECT NOW();
		+---------------------+
		| NOW()               |
		+---------------------+
		| 2015-07-04 21:51:06 |
		+---------------------+
     
        mysql> SELECT HOUR(NOW());
		+-------------+
		| HOUR(NOW()) |
		+-------------+
		|          21 |
		+-------------+
		
		当前日期没加参数now()
		mysql> SELECT CURDATE();
		+------------+
		| CURDATE()  |
		+------------+
		| 2015-07-04 |
		+------------+
		
		格式化日期和时间 (DATE_FORMAT()和 和  TIME_FORMAT())  两个参数  参数一:时间  参数二：格式 
		名词 用法 示例
		%e	 一月中的某天		 1~31
		%d	 一月中的某天，两位 	 01~31
		%D	 带后缀的天			 1st~31st
		%W	 周日名称 			 Sunday~Saturday
		%a	 简写的周日名称		 Sun-Sat
		%c	 月份编号			 1~12
		%m	 月份编号，两位		 01~12
		%M	 月份名称 			 January~December
		%b	 简写的月份名称		 Jan~Dec
		%Y	 年份 				 2002
		%y	 年份，两位			 02
		%l	 小时				 1~12
		%h	 小时,两位			 01~12
		%k	 小时，24 小时制		 0~23
		%H	 小时，24 小制度，两位	 00~23
		%i	 分钟				 00~59
		%S	 秒 				 00~59
		%r	 时间				 8:17:02 PM
		%T	 时间，24 小时制 		 20:17:02 PM
		%p	 上午或下午 			 AM 或 PM		
		
		格式化日期；
		mysql> SELECT DATE_FORMAT(NOW(),'%Y');
		+-------------------------+
		| DATE_FORMAT(NOW(),'%Y') |
		+-------------------------+
		| 2015                    |
		+-------------------------+
		
		mysql> SELECT DATE_FORMAT(NOW(),'%H,%i,%S,%p');
		+----------------------------------+
		| DATE_FORMAT(NOW(),'%H,%i,%S,%p') |
		+----------------------------------+
		| 22,00,39,PM                      |
		+----------------------------------+
     
    ##15-4 sql语句
      1.创建一个班级数据库 school，里面包含一张班级表 grade，包含编号(id)、姓名(name) 、
		邮件(email)、评分(point)、注册日期(regdate)。 
		
		id:每个编号不得重复 而且可以排序 采用整型 范围是 0-99 班级不会超过100个学生 TINYINT 
		unsigned 无符号
		auto_increament 表示 1.2.3.4.5自动累计  自动编号
		
		mysql>CREATE DATABASE school; //创建一个数据库
		mysql> CREATETABLE grade(
		//UNSIGNED 表示无符号， TINYINT(2) 无符号整数 0-99 ， NOT NULL 表示不能为
		空，AUTO_INCREMENT 表示从 1 开始没增加一个字段，累计一位
		-> id TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
		-> nameVARCHAR(20) NOT NULL,
		-> email VARCHAR(40),
		-> point TINYINT(3) UNSIGNED NOT NULL,
		-> regdate DATETIME NOT NULL,
		-> PRIMARY KEY (id) //表示 id 为主键，让 id 值唯一，不得重复,方便搜索与使用。
		-> ) DEFAULT CHARSET = utf8;
		
		查看表结构：
		mysql> DESC grade;
		+---------+---------------------+------+-----+---------+----------------+
		| Field   | Type                | Null | Key | Default | Extra          |
		+---------+---------------------+------+-----+---------+----------------+
		| id      | tinyint(2) unsigned | NO   | PRI | NULL    | auto_increment |
		| name    | varchar(20)         | NO   |     | NULL    |                |
		| email   | varchar(40)         | YES  |     | NULL    |                |
		| point   | tinyint(3) unsigned | NO   |     | NULL    |                |
		| regdate | datetime            | NO   |     | NULL    |                |
		+---------+---------------------+------+-----+---------+----------------+
		
		插入数据：
		id可以不用插 自动编号：
		mysql> INSERT INTO grade (name,email,point,regdate) VALUES (Lee'','yc60.com@gmail.com',88,NOW());
	            
	            依次插入6条数据：有一条email为null
		mysql> INSERT INTO grade (name,email,point,regdate) VALUES ('jack','NULL',72,NOW());
		
		mysql> SELECT * FROM grade;
		+----+------------+--------------------+-------+---------------------+
		| id | name       | email              | point | regdate             |
		+----+------------+--------------------+-------+---------------------+
		|  1 | Lee        | yc60.com@gmail.com |    88 | 2015-07-05 12:02:22 |
		|  2 | alice      | bbsm@gmail.com     |    92 | 2015-07-05 12:04:11 |
		|  3 | jeams      | sina@gmail.com     |    79 | 2015-07-05 12:04:33 |
		|  4 | hanmeimei  | 263a@gmail.com     |    89 | 2015-07-05 12:04:51 |
		|  5 | uncle wang | wang@hotmail.com   |    98 | 2015-07-05 12:05:21 |
		|  6 | jack       | NULL               |    72 | 2015-07-05 12:08:16 |
		+----+------------+--------------------+-------+---------------------+
		
	##15-5	 WHERE表达式的常用运算符
	   +-------------+-------------------+
	   |MYSQL运算符	 |		含义			 |
	   +-------------+-------------------+	
	   |=			 |		等于			 |
	   |< 			 |		小于			 |
	   |> 			 |		大于	  		 |
	   |<= 			 |		小于或等于		 |
	   |>= 			 |		大于或等于		 |
	   |!= 			 |		不等于  		 |
	   |IS NOT NULL  |		具有一个值		 |
	   |IS NULL 	 |		没有值  		 |
	   |BETWEEN 	 |		在范围内 		 |
	   |NOT BETWEEN  |		不在范围内		 |
	   |IN 			 |		指定的范围		 |
	   |OR 			 |		两个条件语句之一为真|
	   |AND 		 |		两个条件语句都为真  |
	   |NOT 		 |		条件语句不为真          |
	   +-------------+-------------------+	
	   
	   4.姓名等于'Lee'的学员，成绩大于 90 分的学员，邮件不为空的成员，70-90 之间的成员
		mysql> SELECT * FROM grade  WHERE name='Lee';
		
		mysql> SELECT * FROM  grade  WHERE name ='Lee' or name ='jack';
		+----+------+--------------------+-------+---------------------+
		| id | name | email              | point | regdate             |
		+----+------+--------------------+-------+---------------------+
		|  1 | Lee  | yc60.com@gmail.com |    88 | 2015-07-05 12:02:22 |
		|  6 | jack | NULL               |    72 | 2015-07-05 12:08:16 |
		+----+------+--------------------+-------+---------------------+
		
		mysql> SELECT * FROM grade  WHERE point >90;
		+----+------------+------------------+-------+---------------------+
		| id | name       | email            | point | regdate             |
		+----+------------+------------------+-------+---------------------+
		|  2 | alice      | bbsm@gmail.com   |    92 | 2015-07-05 12:04:11 |
		|  5 | uncle wang | wang@hotmail.com |    98 | 2015-07-05 12:05:21 |
		+----+------------+------------------+-------+---------------------+
		
		mysql> SELECT * FROM grade  WHERE email IS NOT NULL;
		mysql> SELECT * FROM grade  WHERE point BETWEEN 70AND 90;
		+----+-----------+--------------------+-------+---------------------+
		| id | name      | email              | point | regdate             |
		+----+-----------+--------------------+-------+---------------------+
		|  1 | Lee       | yc60.com@gmail.com |    88 | 2015-07-05 12:02:22 |
		|  3 | jeams     | sina@gmail.com     |    79 | 2015-07-05 12:04:33 |
		|  4 | hanmeimei | 263a@gmail.com     |    89 | 2015-07-05 12:04:51 |
		|  6 | jack      | NULL               |    72 | 2015-07-05 12:08:16 |
		+----+-----------+--------------------+-------+---------------------+
		mysql> SELECT * FROM grade WHERE point IN (95,82,78)
	
		5.查找邮件使用 163 的学员，不包含 yc60.com 字符串的学员  like模糊查找 结尾必须是--163.com 
		%代表任意匹配   	%163.com    163.com为结尾
					163.com%    163.com为开头
		mysql> SELECT * FROM grade  WHERE email LIKE '%163.com';
		mysql> SELECT * FROM grade  WHERE email NOT LIKE '%yc60.com%';
		
		6.按照学员注册日期的倒序排序，按照分数的正序排序
		mysql> SELECT * FROM grade ORDER BY regdateDESC;
		mysql> SELECT * FROM grade ORDER BY point ASC;
		
		7.只显示前三条学员的数据，从第 3 条数据开始显示 2 条
		mysql> SELECT * FROM grade LIMIT 3;
 
		mysql> SELECT * FROM grade LIMIT 3,2;
		+----+------------+------------------+-------+---------------------+
		| id | name       | email            | point | regdate             |
		+----+------------+------------------+-------+---------------------+
		|  4 | hanmeimei  | 263a@gmail.com   |    89 | 2015-07-05 12:04:51 |
		|  5 | uncle wang | wang@hotmail.com |    98 | 2015-07-05 12:05:21 |
		+----+------------+------------------+-------+---------------------+
		
		8.修改姓名为'Lee'的电子邮件
		mysql> UPDATE gradeSETemail='yc60.com@163.com'  WHERE name='Lee';
		
		修改姓名为'Lee'的电子邮件:
	    mysql> UPDATE grade SET email='alice3344@126.com'  WHERE name = 'hanmeimei';
	    
		从第 3 条数据开始显示 2 条:
		mysql> SELECT * FROM grade LIMIT 3,2;
		+----+------------+-------------------+-------+---------------------+
		| id | name       | email             | point | regdate             |
		+----+------------+-------------------+-------+---------------------+
		|  4 | hanmeimei  | alice3344@126.com |    89 | 2015-07-05 12:04:51 |
		|  5 | uncle wang | wang@hotmail.com  |    98 | 2015-07-05 12:05:21 |
		+----+------------+-------------------+-------+---------------------+
		
	    9.删除编号为 4 的学员数据
		mysql> DELETE FROM grade WHERE id=4;
	    
	 ##mysql分组函数
		 函数			    用法			 描述
		AVG() 	  AVG(column) 		返回列的平均值
		COUNT()   COUNT(column)		 统计行数
		MAX() 	  MAX(column) 		求列中的最大值
		MIN() 	  MIN(column) 		求列中的最小值
		SUM() 	  SUM(column) 		求列中的和	
		
		AVG() 	  AVG(column) 		返回列的平均值
		mysql> SELECT AVG(point) FROM grade;
		+------------+
		| AVG(point) |
		+------------+
		|    86.3333 |
		+------------+	
		或者：
		mysql> SELECT AVG(point) AS '平均值'  FROM grade;
		+---------+
		| 平均值  |
		+---------+
		| 86.3333 |
		+---------+
		
		mysql> SELECT COUNT(*) AS '行数' FROM  grade;
		+------+
		| 行数 |
		+------+
		|    6 |
		+------+
		
		mysql> SELECT COUNT(email) AS email_count FROM  grade;
		+-------------+
		| email_count |
		+-------------+
		|           6 |
		+-------------+
		
		求point列的最大数
		mysql> SELECT MAX(point) AS '最大数' FROM grade;
		+--------+
		| 最大数 |
		+--------+
		|     98 |
		+--------+
		
	.1添加表字段

		alter table table1 add transactor varchar(10) not Null;
		
		alter table   table1 add id int unsigned not Null auto_increment primary key
		
		4.2.修改某个表的字段类型及指定为空或非空
		>alter table 表名称 change 字段名称 字段名称 字段类型 [是否允许非空];
		>alter table 表名称 modify 字段名称 字段类型 [是否允许非空];
		
		>alter table 表名称 modify 字段名称 字段类型 [是否允许非空];
		
		4.3.修改某个表的字段名称及指定为空或非空
		>alter table 表名称 change 字段原名称 字段新名称 字段类型 [是否允许非空
		
		4.4如果要删除某一字段，可用命令：ALTER TABLE mytable DROP 字段 名;
			
#第16章 php操作 mysql	
	
	一：php连接mysql
	       这里，我们全面采用 UTF-8 编码	
		<?php
			  header('Content-Type:text/html;charset=utf-8');
			  
			  //常量参数
		      define('DB_HOST','localhost');
			  define('DB_USER','root');
			  define('DB_NAME','school1');
			  
			  //第一步，连接数据库  // $conn 返回资源
			  $conn= @mysql_connect(DB_HOST,DB_USER) or die('数据库连接错误'.mysql_error());
			  
			  //第二步，选择指定的数据库
			  mysql_select_db(DB_NAME,$conn) or die('指定的数据库不存在，数据库错误'.mysql_error());
			  
			  echo $conn;  
		?>
		--------------------------------------------------------------------------
		<?php
			  header('Content-Type:text/html;charset=utf-8');
			  
			  //常量参数
		      define('DB_HOST','localhost');
			  define('DB_USER','root');
			  define('DB_NAME','school');
			  
			  //第一步，连接数据库
			  $conn= @mysql_connect(DB_HOST,DB_USER) or die('数据库连接错误'.mysql_error());
			  //echo $conn;//返回资源
			  
			  //第二步，选择指定的数据库 设置字符集
			  @mysql_select_db(DB_NAME,$conn) or die('指定的数据库不存在，数据库错误'.mysql_error());
			  mysql_query('SET NAMES UTF8') or die('字符集错误') ;  //如果数据中有中文需设置自字符集
			  
			  //第三步，从school数据库中 获取记录集 把grade表的内容提出来
			  $query = "SELECT*FROM grade1";
			  $result = @mysql_query($query,$conn) or die('sql错误:'.mysql_error()) ;//第二个参数可以放也可以部分，不放就是最近的一个  返回的也是资源
			  //echo $result;//返回资源类型 $result就是记录集
			  echo !!$result; //1
			  
			  //第四步，将记录集中的数据显示出来
			   print_r(mysql_fetch_array($result,MYSQL_ASSOC)); //下标按字段名输出
			 
			  //print_r(mysql_fetch_array($result,MYSQL_NUM)); //下标按数字输出
			 
			  //第五步，释放记录集资源
			  mysql_free_result($result);//也可以不写
			  
			  //最后，关闭数据库
			  mysql_close($conn);
		  
		?>
		
		1.新增数据 2 条
		 $query = "INSERT INTO grade (id,name,email,point,regtime) VALUES
			 	(8,'lucina','lucina@163.com',88,NOW()),
			 	(9,'bonny','bonny@163.com',90,NOW())	";
		
		  echo $query;
		  @mysql_query($query) or die('新增错误'.mysql_error());
	
	  	2.更新数据 注意 要自己敲
			$query = "UPDATE grade SET name='尼古拉' WHERE id=6 ";
			@mysql_query($query) or die('数据库更新错误'.mysql_error());
	 
		3.删除数据 
		 $query = "DELETE FROM grade WHERE id=6";
		 @mysql_query($query) or die('删除错误'.mysql_error()); 
		
		4.输出数据
		 $query = "SELECT id,name,email,point,regtime FROM grade";
		 $result= @mysql_query($query) or die('SQL语句有误'.mysql_error());
		 //把结果集转换成的数组赋给$row 如果有数据 就为真 !!是把$row资源型转为boolen
		 while(!!$row = mysql_fetch_array($result)){
		 	echo $row['id'].'---'.$row['name'].'---'.$row['email'];
			echo '<br/>';
		 }
		
		
		三． 其他常用函数
mysql_fetch_row()：从结果集中取得一行作为枚举数组
mysql_fetch_assoc()： 从结果集中取得一行作为关联数组
mysql_fetch_array()： 从结果集中取得一行作为关联数组，或数字数组，或二者兼有
mysql_fetch_lengths()： 取得结果集中每个输出的长度
mysql_field_name()： 取得结果中指定字段的字段名
mysql_num_rows()： 取得结果集中行的数目
mysql_num_fields()：取得结果集中字段的数目
mysql_get_client_info()： 取得 MySQL 客户端信息
mysql_get_host_info()： 取得 MySQL 主机信息
mysql_get_proto_info()： 取得 MySQL 协议信息
mysql_get_server_info()： 取得 MySQL 服务器信息
		
17.用户留言系统
1.microtime() 返回时间戳 和 微秒数 相加就是当前时间
2.usleep(2000000); //睡眠2秒 相当于settimeout()
3.round(float,int)保留小数点到几位
4.range(1,9) 返回一个数组 1-9
  foreach(range(1,9) as $number){
  	echo $number   //123456789
  }
5.mt_rand(0,15) 随机数
6.dechex(mt_rand(0,15))将10进制转为16进制

正则
 语法 描述
 量词：
 + 匹配任何至少包含一个前导字符串
 * 匹配任何包含零个或多个前导字符串
 ? 匹配任何包含零个或一个前导字符串
 . 匹配任意字符串
 {x} 匹配任何包含 x 个前导字符串
 {x,y} 匹配任何包含 x 到 y 个前导字符串
 {x,} 匹配任何包含至少 x 个前导字符串
 $ 匹配字符串的行尾
 ^ 匹配字符串的行首
 | 匹配字符串的左边或者右边
 () 包围一个字符分组或定义个反引用，可以使用\1\2 提取

 元字符：
 [a-z] 匹配任何包含小写字母 a-z的字符串
 [A-Z] 匹配任何包含大写字母 A-Z的字符串
 [0-9] 匹配任何包含数字 0-9 的字符串
 [abc] 匹配任何包含小写字母 a、b、c的字符串
 [^abc] 匹配任何不包含小写字母 a、b、c的字符串
 [a-zA-Z0-9_] 匹配任何包含 a-zA-Z0-9 和下划线的字符串
 \w 匹配任何包含 a-zA-Z0-9 和下划线的字符串（同上）
 \W 匹配任何没有下划线和字母数字的字符串
 \d 匹配任何数字字符，和[0-9]相同
 \D 匹配任何非数字字符，和[^0-9]相同
 \s 匹配任何空白字符
 \S 匹配任何非空白字符
 \b 匹配是否到达了单词边界
 \B 匹配是否没有达到单词边界
 \ 匹配正则中的特殊字符

 修饰符：
 i 完成不区分大小写的搜索
 m 在匹配首内容或者尾内容时候采用多行识别匹配
 x 忽略正则中的空白
 A 强制从头开始匹配
 U 禁止贪婪匹配 只跟踪到最近的一个匹配符并结束

 Perl
 风格函数
 PHP 为使用 Perl 兼容的正则表达式搜索字符串提供了 7 个函数，包括：preg_grep()、
 preg_match()、preg_match_all()、preg_auote()、preg_replace()、preg_replace_callback()和
 preg_split()。
 搜索字符串：preg_grep()函数搜索数组中的所有元素，返回由与某个模式匹配的所有元
 素组成的数组。
 <?php
 $language = array('php','asp','jsp','python','ruby');
 print_r(preg_grep('/p$/',$language));
 ?>
 搜索模式： preg_match()函数在字符串中搜索模式， 如果存在则返回 true， 否则返回 false 。
 <?php
 echo preg_match('/php[1-6]/','php5');
 ?>
 电子邮件验证小案例（分组应用）
 <?php
 $mode = '/([\w\.\_]{2,10})@(\w{1,}).([a-z]{2,4})/';
 $string = 'yc60.com@gmail.com';
 echo preg_match($mode,$string);
 ?>
 匹配模式的所有出现：preg_match_all()函数在字符串中匹配模式的所有出现，然后将所
 有匹配到的全部放入数组。
 <?php
 preg_match_all('/php[1-6]/','php5sdfphp4sdflljkphp3sdlfjphp2',$out);
 print_r($out);
 ?>
 定界特殊的正则表达式：preg_quote()在每个对于正则表达式语法而言有特殊含义的字
 符前插入一个反斜线。这些特殊字符包含：$ ^ * () + = {} [] | \\ : <>。
 <?php
 echo preg_quote('PHP的价格是：$150');
 ?>
 替换模式的所有出现：preg_replace()函数搜索到所有匹配，然后替换成想要的字符串返
 回出来。
 <?php
 echo preg_replace('/php[1-6]/','python','This is a php5,This is a php4');
 ?>
 ubb 小案例：贪婪问题+分组使用()
 <?php
 $mode = '/\[b\](.*)\[\/b\]/U';
 $replace = '<strong>\1</strong>';
 $string = 'This is a [b]php5[/b],This is a [b]php4[/b]';
 echo preg_replace($mode,$replace,$string);
 ?>
 以不区分大小写的方式将字符串划分为不同的元素：preg_split()用来分割不同的元素。
 <?php
 print_r(preg_split('/[\.@]/','yc60.com@gmail.com'));
 ?>
 注： 目前为 PHP使用POSIX风格的正则表达式搜索字符串提供了7 个函数， 包括： ereg() 、
 ereg_replace()、eregi()、eregi_replace()、split()、spliti()和 sql_regcase()。

1.php风格
    ·简短风格：
    <? echo "<p>My PHP!</p>"; ?>
    ·Script 风格：
    <script language= "php" >echo "<p>My PHP!</p>"; </script>
2.向浏览器中输出：
    echo()、print()、printf()、sprintf()
    echo、print、printf 本身是函数，即函数()。但这里的输出函数可以省略括号，用空格+
    所需显示的字符串或变量。
    echo 和 print 功能几乎相同，而 echo 运行速度上比 print 稍稍快一点。因为 print 有返回值。
    //echo 不返回任何值(void),print 返回的是整型(integer)

    printf()和 sprintf()是 C 语言模式，例如:printf("我今天买了%d 套视频光盘",5);
    print()返回值：整型
    printf()返回值：字符串的长度
    sprintf功能
    //他们之间的不同点是,printf 返回的是整型(integer)，而 sprintf 返回的字符串(string)
    //printf 可以在浏览器直接输出，而 sprintf 需要 echo 将它输出

    类型 描述
    %b 整数，显示为二进制
    %c 整数，显示为 ASCII 字符
    %d 整数，显示为有符号十进制数
    %f 浮点数，显示为浮点数
    %o 整数，显示为八进制数
    %s 字符串，显示为字符串
    %u 整数，显示为无符号十进制数
    %x 整数，显示为小写的十六进制数
    %X 整数，显示为大写的十六进制数

3.变量的数据类型
    PHP 支持如下所示的基本数据类型：
    Integer(整数) 、 Float(浮点数，也叫 Double,双精度) 、 String(字符串) 、 Boolean(布尔) 、
    Array(数组)、Object(对象).

    创建变量的时候通过赋值来决定变量类型

    类型转换
    使用类型转换，可以将一个变量或值转换成另一种类型。
    $sum=0;
    $total=(float)$sum;

    检测变量
    大部分的可变函数都是用来测试一个函数的类型的。PHP 中有两个最常见的函数 ，分别是 gettype()和 settype()。
    这两个函数返回的 string 类型，也就是变量的类型字符串。

    isset()和 unset()用来判断一个变量是否存在，返回的是布尔值 true或 false。
    empty()用来判断一个变量的值是否为空，如果为空则为 true否则为 false。
    换句话说，""、0、"0"、NULL、FALSE、array()、var $var; 以及没有任何属性的
    对象都将被认为是空的

    PHP 还提供了一些特定类型的测试函数。每一个函数都使用一个变量座位其参数 ，
    并且返回 true或 false。
    is_array() 、 is_double() 、 is_float() 、 is_real() 、 is_long() 、 is_int() 、 is_integer() 、 is_string() 、

    is_object()、is_resource()、is_null()、is_numeric() 、is_callable() 判断是否是有效的函数名

    可以通过调用一个函数来实现转换变量数据类型的目的。
    intval()、floatval()、strval();setType(变量,类型)

    is_object()、is_resource()、is_null()、is_numeric()

    可以通过调用一个函数来实现转换变量数据类型的目的。
    intval()、floatval()、strval();

    超级全局变量：
    $GLOBALS 所有全局变量数组
    $_SERVER 服务器环境变量数组
    $_GET 通过 GET 方法传递给该脚本的变量数组
    $_POST 通过 POST方法传递给该脚本的变量数组
    $_COOKIE cookie 变量数组
    $_FILES 与文件上载相关的变量数组
    $_ENV 环境变量数组
    $_REQUEST 所有用户输入的变量数组
    $_SESSION 会话变量数组
    常量
    常量一旦被定义之后，就不能再次更改。
    define("TOTAL",199);

4.转义序列 描述
    \n 换行符
    \r 回车
    \t 水平制表图
    \\ 反斜杠
    \$ 美元符
    \" 双引号

5.算术操作符

    前置递增递减和后置递增递减运算符：

    算术操作符
    操作符 名称 示例
    + 加 $a+$b
    - 减 $a-$b
    * 乘 $a*$b
    / 除 $a/$b
    % 取余 $a%$b

    复合赋值操作符
    操作符 使用方法 等价于
    += $a+=$b $a=$a+$b
    -= $a-=$b $a=$a-$b
    *= $a*=$b $a=$a*$b
    /= $a/=$b $a=$a/$b
    %= $a%=$b $a=$a%$b
    .= $a.=$b $a=$a.$b

    $a=++$b;
    $a=$b++;
    $a=--$b;
    $a=$b--;

    比较运算符
    操作符 名称 使用方法

    = = 等于 $a= =$b
    = = = 恒等 $a= = =$b
    != 不等 $a!=$b
    != = 不恒等 $a!= =$b
    <> 不等 $a<>$b
    < 小于 $a<$b
    > 大于 $a>$b
    <= 小于等于 $a<=$b
    >= 大于等于 $a>=$b

    注：恒等表示只有两边操作数相等并且数据类型也相当才返回 true;
    例如：0= ="0" 这个返回为 true ，因为操作数相等
    0= = ="0" 这个返回为 false，因为数据类型不同
    逻辑运算符
    操作符"and"和"or"比&&和||的优先级要低。

    三元操作符
    Condition ?value if true: value if false
    示例：($grade>=50 ? "Passed" : "Failed")

    操作符 使用方法 使用方法 说明
    ! 非 !$b        如果 $b 是 false,则    返回 true;否则相反
    && 与 $a&&$b    如果 $a 和$b 都是    true,则结果为 true;    否则为 false
    || 或 $a||$b    如果$a和$b中有一个为 true 或者都为true 时，其结果为true;否则为 false
    and 与 $a and $b   与&& 相同，但其 优先级较低
    or 或 $a or $b   与||相同，但其优先    级较低

    数组操作符

    操作符 使用方法 使用方法 说明
    + 联合 !$b          返回一个包含了$a 和$b 中所有元素的数组
    = = 等价 $a&&$b     如果$a 和$b 具有相同的元素，返回 true
    = = = 恒等 $a||$b   如果$a 和$b 具有相同的元素以及相同的顺序，返回true
    != 非等价 $aand $b  如果$a 和$b 不是等价的，返回 true
    <> 非等价 如果$a 和$b 不是等价的，返回 true
    != = 非恒等 $a or $b  如果$a 和$b 不是恒等的，返回 true

6.随机数 rand([min],[max]) mt_rand([min],[max])
7.数组：可通过实例来查看相应用法
	range()函数自动创建一个数组

    使用循环语句：因为相关数组的索引不是数字，因此无法使用 for 循环语句中使用一个
    简单的计数器对数组进行操作。但是可以使用 foreach循环或 list()和 each()结构。
    foreach ($ages as $key=>$value) {
        echo $key."=>".$value."<br />";
    }
    使用 each()结构打印$ages 数组的内容：each()函数返回数组的当前元素，并将下一个元素作为当前元素。
    while (!!$element=each($ages)) {
        echo $element["key"];
        echo "=>";
        echo $element["value"];
        echo "<br />";
    }
    使用 list()函数，可以用来将一个数组分解为一系列的值。可以按照如下方式将函数each()返回的两个值分开：
    list($name,$age)=each($ages);

    确定唯一的数组元素：array_unique();它会删除掉里面相同值的元素。
    置换数组键和值：array_flip();它会对调数组中的 key 和 value;

    sort()、asort()和 ksort()都是正向排序，当然也有相对应的反向排序 .
    实现反向：rsort()、arsort()和 krsort()。

    函数 shuffle()将数组个元素进行随机排序。
    函数 array_reverse()给出一个原来数组的反向排序。array_开头的函数一般会返回一个新数组
    shuffle($pictures);
    array_reverse($pictures);
    array_unshift($arr,'item1','item2')函数将新元素添加到数组头，返回 array 数组新的单元数目
    array_push()函数将每个新元素添加到数组的末尾。
    array_shift()删除数组头第一个元素，与其相反的函数是
    array_pop(),删除并返回数组末尾的一个元素。
    array_rand()返回数组中的一个或多个键。

    五． 数组的指针操作
    在数组中浏览：each()、current()、reset()、end()、next()、pos()、prev();
    调用 next()或 each()将使指针前移一个元素。调用 each($array_name)会在指针前移一个
    位置之前返回当前元素。next()函数则有些不同----调用 next($array_name)是将指针前移，然
    后再返回新的当前元素。
    要反向遍历一个数组，可以使用 end()和 prev()函数。prev()函数和 next()函数相反。它
    是将当前指针往回移一个位置然后再返回新的当前元素。

    六． 统计数组个数
    count()和 sizeof()统计数组下标的个数
    array_count_values() 统计数组中所有的值出现的次数

    七．将数组转换成标量变量： extract()
    对于一个非数字索引数组，而该数组又有许多关键字-值对，可以使用函数 extract()将它们转换成一系列的标量变量。

    extract()函数原型如下：
    extract(array var_array,[int extract_type],[string prefix]);

    函数 extract()的作用是通过一个数组创建一系列的标量变量，这些变量的名称必须是数组中关键字的名称，而变量值则是数组中的值。
    $array=array("key1"=>"value1","key2"=>"value2","key3"=>"value3");
    extract($array);
    echo $key1.$key2.$key3;

8.魔法常量
    __FILE__ 当前文件名
    __LINE__ 当前行号
    __FUNCTION__ 当前函数名
    __CLASS__ 当前类名
    __METHOD__ 当前方法名

9.字符串处理
    chop()函数移除字符串后面多余的空白，包括新行。
    ltrim()函数移除字符串起始处多余空白。
    rtrim()函数移除字符串后面多余的空白，包括新行，此函数是 chop()的别名。
    trim()函数移除字符串两边多余的空白。


	htmlentities()和 htmlspecialchars 将html转为字符串。
	如果想要去掉字符串中的 HTML 去掉，可以使用 strip_tags()函

    addslashes()后， 转义字符串 所有的引号都加了斜杠，而stripslashes()函数去掉了这些斜 杠

    可以重新格式化字符串中的字母大小写。
    strtoupper()函数将字符串转换为大写
    strtolower()函数将字符串转换成小写
    ucfirst()函数将第一个字母转换为大写

    ucwords()函数将每个单词第一个字母转换为大写

	explode(分隔符,字符串) 切割字符串，返回数组
	implode() join()是implode()的别名


10.数学运算
	强制转换，可以在变量或值前面增加(int)、
	(integer)、(float)、(double)或(real)实现，
	也可以通过使用函数 intval()或 floatval() 来实现

	is_int()和is_float()用于检查具体的数据类型
	is_numeric()

	abs() 绝对值
	floor() 舍去法取整
	ceil() 进一法取整
	round() 四舍五入
	min() 求最小值或数组中最小值
	max() 求最大值数组中最大值
	pi()
	pow(2,4)
	bcadd(2,5);
11.文件包含
	include 'include.php';
	include_once 'include.php';
	require('require.php');
    ucwords()函数将每个单词第一个字母转换为大写















