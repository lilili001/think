<?php
namespace Admin\Controller;
use Think\Controller;
//1-admin 拥有所有权限 直接进后台首页
//2-test  没有权限进首页 
//3-guest guest 在数据库中分配了权限 ,属于用户组1,用户组1 有5个权限,其中id=1就是后台首页的权限


class LoginController extends Controller {
    public function index(){
    	if(IS_POST){
    		$login = array();
			switch (I('user',null,false)) {
				case 'admin':
					$login['uid']=1;
					$login['user']='admin';
					break;
				case 'test':
					$login['uid']=2;
					$login['user']='test';
					break;
				case 'guest':
					$login['uid']=3;
					$login['user']='guest';
					break;
				default:
					$this->error('用户不存在');
					 
			}
			
			if(count($login)){
				session('auth',$login);
				$this->success('登陆成功',U('Index/index'));
			}
    	}else{
    		$this->display();
    	}
    }
	
	public function logout() {
		session('[destroy]');
		$this->success('退出成功！', U('Login/index'));
	}
}