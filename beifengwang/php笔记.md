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













