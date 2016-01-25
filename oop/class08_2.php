<?php
/* __tostring() 把对象当string来使用时调用
 * __invoke 对象当方法调用时调
 *  __call() 当对象访问不存在的方法时调用
    __static() 当对象访问不存在的静态方法名时调用
 * 
*/
class MagicTest{
    public function __toString() {
        return "This is a class MagicTest <br/>";
    }
    public function __invoke($x) {
        echo "function is invoked with parameter ".$x."<br/>";
    }
    public function __call($name, $arguments) {
        echo "Calling ".$name."with parameters:". implode(",", $arguments) ."<br/>";
    }
    public static function __callStatic($name, $arguments) {
         echo "Static Calling ".$name."with parameters:". implode(",", $arguments)."<br/>";
    }
    
}
$obj = new MagicTest();
echo $obj; //把对象当做String使用
$obj(500);

$obj->runTest("para1","para2");
MagicTest::runTest("para1","para2");
