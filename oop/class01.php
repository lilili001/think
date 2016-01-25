<?php
//类的定义以 class 关键字开始 后面跟 类的名称 通常第一个字母大写 以 大括号开始 和结束
//类的属性和方法 前面都要加关键字 例如public 
class NbaPlayer{
    //定义类的属性
    public $name="Jordan\n";
    public $height="198cm\n";
    public $weight="98kg\n";
    public $team="bull\n";
    public $playernumber="123\n";
    
    //定义方法
    public function jump(){
        echo "jumping\n";
    }
    public function run(){
        echo "runing\n";
    }
    public function dribble(){
        echo "dribble\n";
    }
    public function shooting(){
        echo "shooting\n";
    }
    public function dunk(){
        echo "dunking\n";
    }
    public function pass(){
        echo "passing\n";
    }
};
//类到对象的实例化
//类的实例化 new 后面紧跟 类的名称()
$jordan = new NbaPlayer();
//对象中的属性 方法 可以通过 ->来访问 ： 实例名称->属性
echo $jordan->name."<br/>";   
$jordan->dribble()."<br/>";
$jordan->run()."<br/>";
