<?php
//操作方法绑定到类
namespace Home\Controller\Joe;
use Think\Controller;
class index extends Controller{
    function run(){
        echo 'Joe 下的 index 类'.'<br/>';
    }
    //前置后置方法
    public function _before_run() {
        echo 'before_'.ACTION_NAME.'<br/>';
    }
    
    public function _after_run() {
        echo 'after_'.ACTION_NAME.'<br/>';
    }
}
