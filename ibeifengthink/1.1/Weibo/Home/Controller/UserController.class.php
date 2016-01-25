<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show('前台 User控制器 index方法');
    }
    public function test($user,$pass){
        $this->show('前台 User控制器 test方法<br/>user:'.$user.'<br/>pass:'.$pass);
    }
}