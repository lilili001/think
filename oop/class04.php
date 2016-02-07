<?php
//访问控制
class Human{
    public $name;
    protected $height;//只有自身 和 子类 里面 可以访问
    public $weight;
    private $isHungery = "aaa";//私有变量 只能被自身访问
    public function eat($food){
       echo $this->name."'s eating ".$food."<br/>";
       echo $this->isHungery;
    } 
}
//类NbaPlayer 通过关键字 extends 继承了 类 Human的 属性和方法
class NbaPlayer extends Human{
    //定义类的属性
    public $team="bull\n";
    public $playernumber="123\n";
    private $age="40";


    //在对象被实例化的时候,构造函数会自动调用
    function __construct( $name,$height,$weight,$team,$playernumber) {
        echo "In NbaClub construct\n"."<br/>";
        //$this是php的伪变量,表示对象自身 可以通过 $this->的方式访问对象的属性和方法
        
        //父类的属性可以通过$this->来继承 NbaPlayer是没有 name weight height这三个属性的
         $this->name = $name;
         $this->height = $height; //可以访问 protected的属性
         $this->weight = $weight;
         
         $this->team = $team;
         $this->playernumber = $playernumber;
         
<<<<<<< HEAD
=======
         echo $this->height.' 1111111<br/>';
>>>>>>> 4488406627bafc430f9cbf2b862eef687d9246ee
         echo $this->isHungery."<br/>";
    }
    //析构函数 __destruck  在程序执行结束的时候自动调用
    function __destruct() {
        
        echo "destroing ".$this->name."<br/>";
    }
    
    //定义方法
    
    public function getAge(){
        echo $this->name."'s age is ".$this->age."<br/>";
    }
    
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
$jordan->eat("apple");
//echo $jordan->age."<br/>";//报错 不能访问私有属性 但是在类里面是可以访问
$jordan->getAge();
<<<<<<< HEAD
//$jordan->height;//报错 不能在类外部访问 protected的属性
=======
$jordan->height;//报错 不能在类外部访问 protected的属性
>>>>>>> 4488406627bafc430f9cbf2b862eef687d9246ee
