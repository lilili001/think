<?php
namespace Common\Controller;
use Think\Controller;
use Think\Auth;

class AuthController extends Controller{
	protected function _initialize(){
		$sess_auth = session('auth');
		if (!$sess_auth) {
			$this->error('非法访问！正在跳转登录页面！',
			U('Login/index'));
		}
		
		//如果是超级管理员 就不用验证权限 这里的1要通过用户数据库
		if ($sess_auth['uid'] == 1) {
			return true; //返回true 直接进入 表单提交页 后台首页
		}
		$auth =  new Auth();
		
		//权限控制 主要针对2 和 3 
		//2是test没有权限进入后台首页  退出      3是guest 有权限进入后台首页
		if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, $sess_auth['uid'])){
			$this->error('没有权限', U('Login/logout'));
		}
	}
}
