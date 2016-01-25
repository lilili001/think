<?php
//接口
//interface 关键字用于定义接口
//一般多个类有相同的方法，但是每个类的这个方法的具体实现不同，此时就接口的使用就很合理恰当。
//接口增加复用性，避免重复命名
/*
某个类实现(implements)了某个接口 和 继承(extends)了 某个类的区别
 * -实现接口和继承接口很类似，但是接口不能直接创建自己的对象，如果创建了“会吃东西”这个借口的对象，那么具体怎么吃根本就不知道
 * -继承的父类必须要有该方法的具体实现，子类可以重写弗雷德方法，也可以不重写
 *
 * 接口里面的方法是不需要具体实现，只需要定义方法的名称和参数就可以了，具体实现必须在实现类中定义
 * -一句话概括 类的方法必须有实现，接口的方法必须为空 
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
