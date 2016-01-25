<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
        //$this->show('前台 User控制器 index方法');
        $this->assign('title','没有主题的情况下');//该方法必须在display前面使用
        //$this->display();
        //切换theme主题
        //$this->theme('blue')->display();
        
        //修改模板文件 默认模板文件是根据index这个方法名来的
        //$this->display('add');
        
        //修改控制器目录
        //$this->display('Bbb/add');
        
        //修改默认模版，模块加目录加模版 Home改为Admin
        //$this->display('Admin@Bbb/add');
        
        //修改默认模版，自定义模版
        //$this->display('./Template/Public/index.html');
        
        //ThinkPHP 封装了一个 T 函数，专门用于生成模版文件。格式如下：
        //T([资源://][模块@][主题/][控制器/]操作,[视图分层]);
        //模板地址
        //echo T();
        
        //可修改
        //echo T('Admin@Bbb/add');
        
        //也可以用T()输出
        //$this->display(T());
        
        //获取内容  display是直接渲染，它是方法是 fetch和show的结合 好处是可以过滤内容
        //获取模版里的内容
        $content = $this->fetch();
        
        //通过内容再渲染输出
        $this->show($content);
    }
    
}