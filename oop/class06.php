<?php
 header('Content-Type: text/html; charset=utf-8');
 
 /*
 final php5以上
  * 
 子类中编写跟父类完全一致的方法名 可以完成 对父类方法的重写
  * 
 添加final关键字能让这个方法不能被子类重写 但是可以调用 final public function();
  * 
 对不不想被任何类继承的类 可以在类前面 添加 final, final class Class();   


    //禁止重载方法
 */
final class BaseClass{
     //添加final关键字能让这个方法不能被子类重写
    final public function test(){
         echo "BasicClass::test1";
     }
     public function test1(){
         echo "BasicClass::test1";
     }
 }
 class ChildClass extends BaseClass{
     public function test($tmp=null){
         echo "childClass::sss";
     }
 }

$obj1 = new ChildClass();
$obj1->test('tmp');