<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
        //变量形式 
        $this->assign('user','蜡笔小新');
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
    
    //内置标签
    public function innerLabel(){
        $this->assign('user','蜡笔小新');
        $this->assign('id','1');
        //数组形式
        $data['user']='蜡笔小新';
        $this->assign('data',$data);
        
        //数组形式
        $user=M('User');
        $this->assign('data1',$user->select());
        $this->assign('data2',$user->where('id=100')->select());
        $this->assign('empty','<b style="color:blue">没有数据</b>');
        
        
        //对象形式 
        $obj=new \stdClass();
        $obj->user = "蜡笔小新";
        $this->assign('obj',$obj);
        
        $this->display();
    }

    //URL生成
    public function testUrl(){
        //默认得到当前URL
        echo U().'<br/>';
        
        //控制器+方法
        echo U('User/aaa').'<br/>';
        
        //控制器+方法+?参数1=值1
        echo U('User/add?id=5').'<br/>';
        
        //模块+控制器+方法+?参数1=值1
        echo U('Admin/User/add?id=5').'<br/>';
        
        //U()方法第二个参数可以分离参数和值的操作，支持字符串和数组的写法。
        //使用数组参数1=值1,参数2=值2
        echo U('User/add',array('id'=>5,'type'=>'a')).'<br/>';
        
        //使用字符串参数1=值1,参数2=值2
        echo U('User/add','id=5&type=a').'<br/>';
        
        //U()方法第三个参数可以指定伪静态后缀，比如：
        //指定伪静态后缀
        echo U('User/add',array('id'=>5),'xml').'<br/>';
        
        //生成路由地址 //规则路由 'u/:id\d'=>'User/index',
        echo U('/u/5').'<br/>';
        
        ///生成正则路由地址 '/^u_(\d+)$/'=>'User/index?id=:1',
        echo U('/u_5').'<br/>';
        
        //域名支持
        echo U('User/add@www.ycuk.com?id=5').'<br/>';
        
        //锚点支持
        echo U('User/add#comment?id=5');
        
    }
    
}