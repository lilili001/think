<?php
 header('Content-Type: text/html; charset=utf-8');
 
 /*

1.parent关键字可以调用父类中被子类重写了的方法

2。self关键字可以用于访问类自身的成员方法，也可以用于访问自身的成员和类常量；不能用于访问类自身的属性；使用常量的时候不需要在常量名称前面添加$符号

3.static关键字用于访问类自身定义的静态成员，防伪静态属性时需要在属性面前添加$符号
 */
 class BaseClass{
     public function test(){
         echo "BasicClass::test1";
     }
     public function test1(){
         echo "BasicClass::test1";
     }
 }
 class ChildClass extends BaseClass{
     const CONST_VALUE= "a const value";
     private static $sValue1 = "static value <br/>";
     public function test($tmp=null){
         echo "childClass::sss";
         parent::test();
         self::called();
         echo self::CONST_VALUE;
         echo static::$sValue1;
     }
     public function called(){
         echo "this is a function called<br/>";
     }
 }

$obj1 = new ChildClass();
$obj1->test();
