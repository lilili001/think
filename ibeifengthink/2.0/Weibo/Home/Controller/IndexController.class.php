<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('index控制器 index方法');
        
    }
    public function test(){
        $this->show('index控制器 test方法');
    }
}