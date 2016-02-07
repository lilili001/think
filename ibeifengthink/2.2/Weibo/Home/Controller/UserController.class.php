<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;
use Think\Verify;
use Think\Model;
use Home\Model\UserModel;
use Home\Event\UserEvent;
 
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
    
    public function shijian(){
        //事件控制器调用方法1
        $userEvent = new UserEvent();

        //事件控制器调用方法2
        //$userEvent = A('User', 'Event');
        
       // $userEvent = A('Admin/User', 'Event');
        
        $userEvent->test();
        echo 'test';
    }
    
    //http://www.netb-lc.com/thinkphp/2.0/User/byorder/3/5
    //定义按顺序传参绑定
    //'URL_PARAMS_BIND_TYPE'=>1,
    public function byorder($id, $type) {
        echo 'id:'.$id.',type:'.$type;
    }
    
    //跳转和重定向
    public function tiaozhuan(){
        echo '跳转';
        $flag=true;
        if($flag){
            //$this->success('新增成功','../User/shijian',5);
            
            //ThinkPHP 还单独提供了重定向方法 redirect()，参数和 U()方法一样。这个方法使用的是 URL 规则。
            $this->redirect('User/all',  array('id'=>5), 1, '页面跳转中...');
            
            //如果只是想纯粹的 URL 跳转，不去使用 URL 规则，那么直接使用 redirect()函数。
            //redirect('http://www.baidu.com', 5, '页面跳转中...');
        }else{
            $this->error('新增失败！');
        }
    }
    
    //这里的id是url参数 通过get方式获得的 http://www1.weibo-lc.com/2.0/index.php/User/all?id=4
    public function all($id=1){
        //echo '所有用户列表,id:'.$id;
        //等同于 echo $_GET['id']
        
        //I()
        //echo I('get.id');
        
        //$_GET['id']没有值，则默认1
        //echo I('get.id', 1);
        
        //过滤$_GET['id']
        //echo I('get.id', '', 'md5');
        
        //获取$_GET;
        //print_r(I('get.'));
        
        //param变量自动判断变量类型
       // echo I('param.id');
        
        //param可以省略
        //echo I('id');
        
        //param获取URL所有参数
        //print_r(I('param.')); //或者 print_r(I('param.0'));
        
        //设置过滤函数，会忽略配置文件里的设置
        //echo I('get.id', '', 'htmlspecialchars');
        
        //设置屏蔽系统默认过滤
        //echo I('get.id','',  false); //第三参数为空字符串均可
        
    }
    
    //请求类型
    public function request(){
        if(IS_GET){
            echo 'get';
        }else{
            echo 'post';
        }
    }
    
    //空操作 找不到操作方法时调用这个方法
    public function _empty($name){
        //echo '找不到方法'.$name;
        echo '您的名字是：'.ACTION_NAME;
       
    }
     //session
    public function session(){
        //session 赋值
        session('user','Mr.Leesaa');//$_SESSION['user'] = 'Mr.Lee';
        session('pass','123456');
        echo '<pre>'.print_r($_SESSION,1).'</pre>';
        //获取session
       // echo session('user');//测试方法：在别的操作方法中调用 看是否存在
        
        /*
        //删除session
        session('user',null);//unset($_SESSION['user']);
        
        //删除所有session
        session(null);//$_SESSION=array();
        
        //判断session是否存在
        echo session('?user'); //isset($_SESSION['user'])
        
        //暂停session，写入关闭
        session('[pause]'); //session_write_close();
        
        //销毁session
        session('[destroy]'); //session_destroy();
        
        //重新生成session id
        session('[regenerate]'); //session_regenerate_id();
         * */
         
    }
    
     //cookie
    public function cookie(){
       //cookie赋值
       cookie('user','Mr.Zhao');
       //cookie取值
        //echo cookie('user');
        
        //cookie赋值，第三参数数组设置过期时间和前缀
        //cookie('user', 'Lee', array( 'expire'=>3600, 'prefix'=>'think_', 'domain'=>'www.alice.com' ));
        cookie('pass', 'sssMr.Leesss', 'expire=3600&prefix=think_');
        
        cookie('withdomain','Mr.Green',3600,"/",'http://www.netb-lc.com/thinkphp/2.0');
       
        //cookie取值，带前缀
        echo cookie('withdomain');
        
        //PS：除了过期和前缀，还有 path(保存路径)和 domain(域)。当然也支持配置文件的
        //写法：COOKIE_PREFIX、COOKIE_EXPIRE、COOKIE_PATH、COOKIE_DOMAIN。
        
        //cookie赋值，数组
        cookie('user', array('Mr.', 'Lee'));
        //cookie删除user
        cookie('user', null);
        //cookie删除在配置文件里指定前缀的所有
        cookie(null);
        //cookie删除指定前缀的
        cookie(null, 'think_');
        
    }
    //图像处理
    public function img(){
        
        //实例化图像处理类，默认为GD库
         $image = new Image();
        //加载一张预处理的图片
        $image->open('./Public/images/1.jpg');
        
        //上面两句，可以用一句话包含
        //$image = new Image(Image::IMAGE_GD, './Public/images/1.jpg');
        
        //获取图片信息
        $arr['width'] = $image->width();
        $arr['height'] = $image->height();
        $arr['type'] = $image->type();
        $arr['mime'] = $image->mime();
        $arr['size'] = $image->size();
        
        //裁剪图片，高400，宽400
        $image->crop(400,400)->save('./Public/images/1.jpg');
        
        $image->open('./Public/images/2.jpg');
        $image->thumb(300,300,Image::IMAGE_THUMB_CENTER)->save('./Public/images/2.jpg');
        
        //在图片右下角添加水印并生成
        $image->open('./Public/images/3.jpg');
        $image->water('./Public/images/logo.png')->save('./Public/images/3.jpg');
        echo '<pre>'.print_r($arr,1).'</pre>';
    }
    //验证码
    public function yzm(){
        //实例化验证码类
        $verify = new Verify();
        
        //生成一个验证码图形
        $verify->entry();
        
        print_r($_SESSION);
    }
     
}