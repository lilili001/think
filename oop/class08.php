<?php
/* 代码同07
多态
 * 因为接口的方法实现有很多，所以对于接口里面定义的方法的具体实现是多种多样的，这种特性我们成为多态
 * -比如接口A有两个实现B和C,B和C对A里面定义的方法的实现可以不同，这种现象就是多态
 * 
 *  */
interface IcanEat{
    //接口里的方法不需要有方法的实现
    public function eat($food);
}
//implements关键字用于表示类实现某个接口 而实现了某个接口之后 必须 提供接口中定义方法的具体实现
class Human implements IcanEat{
    public function eat($food) {
        echo "I can eat ".$food . "<br/>";
    }
}
class Animal implements IcanEat{
    public function eat($food) {
        echo "animal can eat ".$food;
    }
}
$obj = new Human();
//$obj->eat("apple");
$monkey = new Animal();
//$monkey->eat("bananer");

//不能实例化接口
//但可以用instanceof 判断某个对象是否实现了某个接口
echo "<br/>";
var_dump($monkey instanceof IcanEat);

//相同的一行代码,对于传入不同的接口的实现的对象的时候，表现是不同的，这就是多态
function checkEat($obj){
    if( var_dump($obj instanceof IcanEat) ){
        $obj->eat("food");
    }else{
        echo "This obj can not be eaten";
    }
}
checkEat($obj);
checkEat($monkey);

//接口的继承 可以通过extends 让接口继承接口
interface IcanPee extends IcanEat{
    public function pee();
}
//类中补充方法的实现 当类实现子接口时,父接口定义的方法也需要在这个类里面实现
class Human1 implements IcanPee{
    public function pee(){}
    public function eat($food) {
     ;
 }
}
