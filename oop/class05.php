<?php
 header('Content-Type: text/html; charset=utf-8');
 
 /*
静态属性定义时在访问控制关键字后面添加static关键字即可

静态方法定义同上

在类定义中使用静态成员的时候，在self关键字后面跟着：：操作符，即可。注意，在访问静态成员的时候，：：后面需要跟$符号

在类定义外部访问静态属性，我们可以用类名加：：操作符的方法来访问类的静态成员。
  * 
使用parent关键字就能访问父类的静态成员

1.静态属性用于保存类的共有数据

2.静态方法里面只能访问静态属性 不能访问其他属性 不能用 $this->

3.静态成员不需要实例化对象就能访问 

4.内部可以通过self或者static关键字反问自身静态成员  self::$president=$newPresident; static::$president=$newPresident

5.子类可以通过parent关键字访问父类的静态成员  echo parent::$sValue;

6.可以通过类的名称在类定义外部访问静态成员  echo Human::$sValue;

 
 */
class Human{
    public $name;
    protected $height;//只有自身 和 子类 里面 可以访问
    public $weight;
    private $isHungery = "aaa";//私有变量 只能被自身访问
    public static $sValue="static value in Human";


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
    
    //静态属性和方法 不需要创建实例 访问方法 也不用$this-> 用::
    //静态属性定义时 在访问控制 public 后面添加 static关键字
    //在类定义中使用静态成员的时候，在self关键字后面跟着：：操作符，即可
    //注意，在访问静态成员的时候，：：后面需要跟$符号

    public static $president = "David Stern";
    public static function changePresident($newPresident){
        self::$president=$newPresident;//改变静态成员的数据
        echo parent::$sValue;
    }

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
 //在类定义外部访问静态属性，我们可以用类名加：：操作符的方法来访问类的静态成员。
 echo "原来的联盟总裁是: ".NbaPlayer::$president."<br/>";
 NbaPlayer::changePresident("Adam Silver");
 echo "<br/>";
 echo "现在的联盟总裁是: ".NbaPlayer::$president;
 echo Human::$sValue;