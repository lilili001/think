<?php
//继承  php 中可以用extends关键字来表示类的继承,后面跟父类的类名,php中的extends后面只能跟一个类的类名,这就叫单继承原则
class Human{
    public $name;
    public $height;
    public $weight;
    public function eat($food){
       echo $this->name."'s eating ".$food."<br/>";
    } 
}
//类NbaPlayer 通过关键字 extends 继承了 类 Human的 属性和方法
class NbaPlayer extends Human{
    //定义类的属性
    public $team="bull\n";
    public $playernumber="123\n";
    
    //在对象被实例化的时候,构造函数会自动调用
    function __construct( $name,$height,$weight,$team,$playernumber) {
        echo "In NbaClub construct\n"."<br/>";
        //$this是php的伪变量,表示对象自身 可以通过 $this->的方式访问对象的属性和方法
        
        //父类的属性可以通过$this->来继承 NbaPlayer是没有 name weight height这三个属性的
         $this->name = $name;
         $this->height = $height;
         $this->weight = $weight;
         
         $this->team = $team;
         $this->playernumber = $playernumber;
    }
    //析构函数 __destruck  在程序执行结束的时候自动调用
    function __destruct() {
        
        echo "destroing ".$this->name."<br/>";
    }
    
    //定义方法
    public function jump(){
        echo "jumping\n";
    }
    public function run(){
        echo "runing\n";
    }
    public function dribble(){
        echo "dribbling\n";
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
 
//给构造函数传参 
//每一次 new 实例化对象的时候,都会用类名后面的参数列表 调用 构造函数 自动传参给构造函数
$jordan = new NbaPlayer("joana","198","98kg","bull","123");
//对象中的属性 方法 可以通过 ->来访问 ： 实例名称->属性
echo $jordan->name."<br/>"; 
$jordan->eat("apple");//子类NbaPlayer可以调用 父类Human的属性和父类的方法