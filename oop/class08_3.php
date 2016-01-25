<?php
/*  __get() __set() __isset() __unset()
 * 在给不可访问 属性 赋值时 __set()会被调用   
 * 读取不可访问属性时 __get()会被调用
 * 当对不可访问属性调用isset()或emplty()时 __isset()会被调用
 * 当对不可访问属性调用unset()时 __unset()会被调用
 * 不可访问属性 未定义 或没权限
 * 
 * _clone()
*/
class MagicTest{
    //把对象当做String使用
    public function __toString() {
        return "This is a class MagicTest <br/><br/>";
    }
    //对象当方法调用
    public function __invoke($x) {
        echo "function is invoked with parameter ".$x."<br/><br/>";
    }
    //访问不存在的方法
    public function __call($name, $arguments) {
        echo "Calling ".$name."with parameters:". implode(",", $arguments) ."<br/><br/>";
    }
    //访问不存在的静态方法
    public static function __callStatic($name, $arguments) {
         echo "Static Calling ".$name."with parameters:". implode(",", $arguments)."<br/><br/>";
    }
    //访问不存在的属性
    public function __get($name) {
        //这里的参数$name指的就是 未定义的属性名
        return "Getting the className ".$name."<br/><br/>";
    }
    //给不存在的属性设定value
    public function __set($name, $value) {
        echo "setting the property ".$name." with value ". $value ."<br/><br/>";
    }
    
    public function __isset($name) {
        echo "__isset invoked"."<br/><br/>";
        return true;
    }
    public function __unset($name) {
        echo "unsetting property ".$name."<br/><br/>";
    }
    
}
$obj = new MagicTest();
echo "--1.把对象当做String使用--------------------------<br/>";
echo $obj; //把对象当做String使用

echo "--2.对象当方法调用--------------------------<br/>";
$obj(500);//对象当方法调用

echo "--3.访问不存在的方法-------------------------<br/>";
$obj->runTest("para1","para2");//访问不存在的方法

echo "--4.访问不存在的静态方法-------------------------<br/>";
MagicTest::runTest("para1","para2");//访问不存在的静态方法

echo "--5.访问不存在的属性-------------------------<br/>";
echo $obj->undefinedProperty;//访问不存在的属性

echo "--6.给不存在的属性 设value-------------------------<br/>";
$obj->magicProperty="MagicClassX";

echo "--7.  __isset() 返回值 1 0 empty和isset是相反的逻辑-------------------------<br/>";
echo "$obj->magicProperty is set? ".isset($obj->magicProperty);
echo "<br/>";
echo "$obj->magicProperty is empty? ".empty($obj->magicProperty);

unset($obj->magicProperty);