<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
        //变量形式 
        $this->assign('user','the value of user');
        $this->assign('date',  time());
        $this->assign('nodate','');
        $this->assign('num',10);
        $this->assign('withdata','yes');
        //数组形式
        $data['user']='欣怡';
        $data['email']='xinyi@gmail.com';
        $this->assign('data',$data);
        
        //对象形式 
        $obj=new \stdClass();
        $obj->name = "汽车";
        $obj->brand = "奔驰";
        $this->assign('obj',$obj);
        
        echo '这是index操作方法';
        $this->display();
    }
    
    //如果有aaa操作方法,视图里的aaa.html对应的就是该方法,如果不存在aaa方法,视图里的aaa.html对应的就是index方法
    //通过 bbb可以看出
    public function aaa(){
        //模板继承 User/aaa.html bbb.html
        echo '这是aaa操作方法';
        $this->display();
    }
    
    public function fromLayout_2(){
        //第一种方法：config中配置、User/demo1.html
        //'LAYOUT_ON'=> true,
        //'LAYOUT_NAME'=>'Public/layout',
        //
        //第二种方法：模版标签方式 User/fromLayout_1
        //<!-- 子模版引入模版基页-->
        //<layout name="Public/layout" />
        //<!--//替换变量的方法-->
        //<layout name="Public/layout" replace="{__REPLACE__}" />
        //
        
        //第三种方法：控制器中配置layout  User/fromLayout_2
         //layout(true);指向默认default下的layout.html
         //layout( false); //关闭
         layout('Public/layout');
         $this->display();
    }
    
}