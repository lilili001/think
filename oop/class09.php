<?php
/*  
 * _clone()
*/
class NbaPlayer{
    public $name;
    //复制对象的时候 不想复制过来的属性或方法 可以在这里重新定义 互不影响
    function __clone(){
        $this->name="TBD";
    }
}
$james1 = new NbaPlayer();
$james1->name = "james1";


$james2 = clone $james1;//这里clone会把$james1对象完完全全的复制过来 包括它的属性和方法 
////但是可以通过魔术方法__clone来改变新的对象的属性或方法
echo "james2' name is ".$james2->name ."<br/>";//TBD

$james2->name = "james2";

echo "james' name is ".$james1->name ."<br/>";
echo "james2' name is ".$james2->name ."<br/>";
