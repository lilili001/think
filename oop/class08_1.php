<?php
/*
 抽象类
 * 接口里的方法都是没有实现的，而类里的方法都是有实现的
 * 有没有一种方法，允许类里的方法不实现呢
 * -当接口中的某些方法对于所有实现类都是一样的实现方法，只有部分方法需要用到多态的特性
 * 实例：任何动物吃东西是不同的，但是呼吸是相同的，不需要为任何动物分别实现呼吸的功能
 * 
 * abstract 关键字用于定义抽象类
 *  */
 
abstract class ACanEat{
    //在抽象方法前面添加abstract关键字可以表明这个方法是抽象方法 不需要具体实现
    abstract public function eat($food);
    //抽象类中可以包含普通方法，有方法的具体实现。
    public function breath(){
        echo "Breath use the air \n <br/>";
    }
}
//继承抽象类的关键字是extends       
class Human extends ACanEat{
    //继承抽象类的子类需要实现抽象类中定义的抽象的方法
    public function eat($food){
       echo "Human eating ".$food."<br/>"; 
    }
}
class Animal extends ACanEat{
    public function eat($food){
       echo "Animal eating ".$food."<br/>"; 
    }
}
$man = new Human();
$man->breath();
$man->eat("apple");

$animal = new Animal();
$animal->breath();
$animal->eat("bananer");