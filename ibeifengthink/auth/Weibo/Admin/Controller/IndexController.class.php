<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class IndexController extends AuthController {
    public function index(){
        $this->show('后台 Index控制器 index方法 ---后台首页');
		echo '<a href="'.U('Login/logout').'">退出</a>';
    }
}