<?php
namespace Admin\Event;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show('后台 Index控制器 index方法');
    }
}