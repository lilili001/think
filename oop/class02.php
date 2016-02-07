<?php
//构造函数 __construct 需要new 一个对象的时候才被调用
//析构函数 __destruck  在程序执行结束的时候自动调用 通常被用于清理程序使用的资源
class NbaPlayer{
    //定义类的属性
    public $name="Jordan\n";
    public $height="198cm\n";
    public $weight="98kg\n";
    public $team="bull\n";
    public $playernumber="123\n";
    
    //在对象被实例化的时候,构造函数会自动调用
    function __construct( $name,$height,$weight,$team,$playernumber) {
        echo "In NbaClub construct\n"."<br/>";
        //$this是php的伪变量,表示对象自身 可以通过 $this->的方式访问对象的属性和方法
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
$jordan = new NbaPlayer("jordan","198","98kg","bull","123");
//对象中的属性 方法 可以通过 ->来访问 ： 实例名称->属性
echo $jordan->name."<br/>"; 
$jordan->dribble();
echo "<br/>";
$jordan->run();
echo "<br/>------------------------------<br/>";

$james = new NbaPlayer("james","198","98kg","bull","123");
echo $james->name."<br/>"; //james
//析构函数 在程序执行完 后调用  如果 $james = null 那么程序到此结束 会调用析构函数 打印出 destroing james
//当对象不再使用的时候 会触发 析构函数
//如果 $james 没被置空 那么 程序是在 echo "from now on james will not be used<br/>";
//这一句才算执行完 这句之后再调用 析构函数 destroing james

//$jams1 = $jams; //相当于创建一个副本，复制;
//$jams2 = &$jams; //相当于取一个别名;
//
$james1 = $james;
$james2 = &$james;//&--》 $james2 就是 $james的影子 $james被置空 $james2也被置空了
$james = null; 
echo "from now on james will not be used<br/>";