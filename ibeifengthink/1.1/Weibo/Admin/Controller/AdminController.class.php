<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
        $this->show('后台 Admin控制器 index方法');
    }
}