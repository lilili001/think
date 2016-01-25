<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
        $this->show('前台 User控制器 index方法');
    }
    public function test($user,$pass){
        $this->show('前台 User控制器 test方法<br/>user:'.$user.'<br/>pass:'.$pass);
    }
    public function model(){
    	echo '前台 User控制器 model<br/>';
        
        /**数据库操作
       /**数据查询**/

        	//1-使用Model基类方法 实例化Model类，传一个数据表名  
        	//如果传了第三个参数(数据库信息) 这里可以连接数据库 就不需要用config.php中的数据库配置了
        	//Model(['模型名'],['数据表前缀'],['数据库连接信息']);
        	//$user = new Model('User','think_','mysql://root@localhost/thinkphp');

        	//2-使用M() 可以不用导入命名空间 use Think\Model; 调用的是Model
        	 //$user = M('User');

        	//3.模型类UserModel
        	//$user = new UserModel();

        	//4.D() 调用的是UserModel
        	//$user = D('User');

        	//5.前台Home模块调用后台Admin模块的Model
        	//$user = D('Admin/User');

        	//打印出所有数据
    		  //var_dump($user->select());

        	//6.用原生sql语句
            //$user = M(); //或者new Model();空基类
    		    // var_dump($user->query("SELECT * FROM think_user WHERE user='蜡笔小新'"));

        	//7.查看缓存字段 用M('User')
      		 //$user = M('User');
    		   // var_dump($user->getDbFields());

        	//8.手动缓存字段
        	  // $user = D('User');
        	  // var_dump($user->getDbFields());
        	 

        	//显示变量结构
        	//var_dump($user);

       /**查询方式**/
           //1.字符串作为条件查询
           // $user = M('User');
           // var_dump($user->where('id=1 AND user="蜡笔小新"')->select());
           //最终生成的 SQL 语句
           //SELECT * FROM 'think_user' WHERE ( id=1 AND user="蜡笔小新" )

           //2.使用索引数组作为查询条件
           
            //索引数组作为条件查询
            // $user = M('User');
            // $condition['id'] = 1;
            // $condition['user'] = '蜡笔小新';
            // $condition['_logic'] = 'AND';
            // var_dump($user->where($condition)->select());
            //最终生成的 SQL 语句
            //SELECT * FROM 'think_user' WHERE ( 'id' = 1 ) AND ( 'user' = '蜡笔小新' )
            //PS：索引数组查询的默认逻辑关系是 AND，如果想改变为 OR，可以使用_logic 定义查询逻辑。

           //3.使用对象方式来查询
            //对象作为条件查询
            // $user = M('User');
            // $condition = new \stdClass();
            // $condition->id = 1;
            // $condition->user = '蜡笔小新';
            // $condition->_logic='AND';
            // var_dump($user->where($condition)->select());
            //最终生成的 SQL 语句
            //SELECT * FROM 'think_user' WHERE ( 'id' = 1 ) AND ( 'user' = '蜡笔小新' )
            /*
              PS：stdClass 类是 PHP 内置的类，可以理解为一个空类，在这里可以理解为把条件的
                  字段作为成员保存到 stdClass 类里。而这里的'\'是将命名空间设置为根目录，否则会导
                  致当前目录找不到此类。 使用对象和数组查询， 效果是一样的， 可以互换。在大多数情况下，
                  ThinkPHP 推荐使用数组形式更加高效。
            */

       /**表达式查询**/ 
          $user = M('User');
          //1.EQ：等于(=)
          //$map['id'] =  array('eq', 1); //SELECT * FROM 'think_user' WHERE 'id' = 1

          //2.NEQ：不等于(<>)
          //$map['id'] =  array('neq', 1); //SELECT * FROM `think_user` WHERE `id` <> 1
          
          //GT：大于(>)
          //$map['id'] =  array('gt', 1); //SELECT * FROM `think_user` WHERE `id` > 1

          //EGT：大于等于(>=)
          //$map['id'] =  array('egt', 1);//SELECT * FROM `think_user` WHERE `id` >= 1

          //ELT：小于等于(<=)
          //$map['id'] =  array('elt', 1); //SELECT * FROM `think_user` WHERE `id` <= 1 

          //[NOT]LIKE：模糊查询
          //$map['user'] =  array('like', '%小%');//SELECT * FROM `think_user` WHERE `user` LIKE '%小%'

          //[NOT]LIKE：模糊查询
          //$map['user'] =  array('notlike', '%小%');//SELECT * FROM `think_user` WHERE `user` NOT LIKE '%小%'

          //[NOT]LIKE：模糊查询的数组方式
          //$map['user'] =  array('like',  array('%小%', '%明天%'), 'OR');
          //SELECT * FROM `think_user` WHERE (`user` LIKE '%小%' OR `user` LIKE '%明天%')

          //[NOT] BETWEEN：区间查询
          //$map['id'] =  array('between','1,3');
          //SELECT * FROM `think_user` WHERE `id` BETWEEN '1' AND '3'

          //同上等效
          //$map['id'] =  array('between',array('1','3'));
          //SELECT * FROM `think_user` WHERE `id` BETWEEN '1' AND '3' 


          //[NOT] BETWEEN：区间查询
          //$map['id'] =  array('not between','1,3');
          //SELECT * FROM `think_user` WHERE `id` NOT BETWEEN '1' AND '3' 

          //[NOT] IN：区间查询
          //$map['id'] =  array('in','1,2,4');
          //SELECT * FROM `think_user` WHERE `id` IN ('1','2','4')

          //[NOT] IN：区间查询
          //$map['id'] =  array('not in','1,2,4');
          //SELECT * FROM `think_user` WHERE `id` NOT IN ('1','2','4')

          //EXP：自定义
          //$map['id'] =  array('exp','in (1,2,4)');
          //SELECT * FROM `think_user` WHERE `id` in (1,2,4)

          //EXP：自定义增加 OR 语句
          // $map['id'] =  array('exp', '=1');
          // $map['user'] =  array('exp', '="蜡笔小新"');
          // $map['_logic'] = 'OR';
          //SELECT * FROM `think_user` WHERE `id` =1 OR `user` ="蜡笔小新"

          //----
          //快捷查询方式是一种多字段查询的简化写法， 在多个字段之间用'|'隔开表示OR， 用'&'隔开表示AND。
          //1.不同字段相同查询条件
          //使用相同查询条件
          
          //$map['user|email'] = '雪莲花开'; //'|'换成'&'变成AND
          //SELECT * FROM `think_user` WHERE ( `user` = '雪莲花开' OR `email` = '雪莲花开' )

          //2.不同字段不同查询条件
          //使用不同查询条件
           
          //$map['id&user'] =  array(1,'蜡笔小新','_multi'=> true);
          //PS：设置'_multi'为 true，是为了让 id 对应 1，让 user 对应'蜡笔小新'，否则就
          // 会出现 id 对应了 1 还要对应'蜡笔小新'的情况。而且，这设置要在放在数组最后。

          //支持使用表达式结合快捷查询
          //$map['id&user'] =  array( array('gt', 0),'蜡笔小新','_multi'=> true);
          //SELECT * FROM `think_user` WHERE ( (`id` > 0) AND (`user` = '蜡笔小新') ) 

          //区间查询
          //$map['id'] =  array( array('gt', 1),  array('lt', 4));
          //SELECT * FROM `think_user` WHERE ( `id` > 1 AND `id` < 4 )
            
          //第三个参数设置逻辑OR
          //$map['id'] =  array( array('gt', 1),  array('lt', 4), 'OR');
          //SELECT * FROM `think_user` WHERE ( `id` > 1 OR `id` < 4 )

          //字符串查询(_string)
          // $map['id'] =  array('eq', 1);
          // $map['_string'] ='user="蜡笔小新" AND email="labixiaoxin@11.com"';
          //SELECT * FROM `think_user` WHERE `id` = 1 AND ( user="蜡笔小新" AND email="labixiaoxin@11.com" ) 

          //请求字符串查询(_query)
          // $map['id'] =  array('eq', 1);
          // $map['_query'] ='user=蜡笔小新&email=lufei@qq.com&_logic=OR';
          //SELECT * FROM `think_user` WHERE `id` = 1 AND ( `user` = '蜡笔小新' OR `email` = 'xiaoxin@163.com' ) 
          //PS：这种方式是 URL 方式，不需要加引号。

          //复合查询(_complex)
          // $where['user'] =  array('like', '%小%');
          // $where['id'] = 1;
          // $where['_logic'] = 'OR';
          // $map['_complex'] = $where;
          // $map['id'] = 3;
          // $map['_logic'] = 'OR';
          // SELECT * FROM `think_user` WHERE ( `user` LIKE '%小%' OR `id` = 1 ) OR `id` = 3

          //echo '<pre>'.print_r($user->where($map)->select(),1).'</pre>';

          //统计查询
          //var_dump($user->count());
          //SELECT COUNT(*) AS tp_count FROM `think_user` LIMIT 1

          //字段数据条数
          //var_dump($user->count('email'));
          //SELECT COUNT(email) AS tp_count FROM `think_user` LIMIT 1

          //最大值
          //var_dump($user->max('id'));
          //SELECT MAX(id) AS tp_max FROM `think_user` LIMIT 1

          //最小值
          // var_dump($user->min('id'));
          // SELECT MIN(id) AS tp_min FROM `think_user` LIMIT 1

          //平均值
          // var_dump($user->avg('id'));
          // SELECT AVG(id) AS tp_avg FROM `think_user` LIMIT 1

          //求和
          //var_dump($user->sum('id'));

          //七． 动态查询
          //1.getBy 动态查询 //查找email=xiaoin@163.com的数据
          //查找email=xiaoin@163.com的数据
          //echo '<pre>'.print_r($user->getByemail('labixiaoxin@11.com'),1).'</pre>';

          //2.getFieldBy 动态查询 //通过user得到相对应id值
          //echo '<pre>'.print_r($user->getFieldByUser('路飞', 'id'),1).'</pre>';

          //八．L SQL  查询
          //1.query 读取
          //echo '<pre>'.print_r($user->query('SELECT * FROM think_user'),1).'</pre>';

          //2.execute写入 更新
          //echo '<pre>'.print_r($user->execute('UPDATE think_user set user="蜡笔大新" WHERE id=1'),1).'</pre>';
    
       /**连贯操作**/       
          //echo '<pre>'.print_r( $user-> where('id>1')->order('date DESC')->limit(2) ->select(),1).'</pre>';

          //数组操作
          //var_dump($user->select( array('where'=>'id in (1,2,3,4)', 'limit'=>'2','order'=>'date DESC')));
        
          //var_dump($user->where('id>1')->find());
          //var_dump($user->where('id=7')->delete());

          //连贯方法
          //1.where
          //echo '<pre>'.print_r($user->where('id>1')->select(),1).'</pre>';
          
          //多个where  下面的写法后面的where会把前面的冲掉 
          //echo '<pre>'.print_r($user->where('id>1')->where('user="久伴成了酒伴"')->select(),1).'</pre>';

          // $map['id']=1;
          // echo '<pre>'.print_r($user->where($map)->where('user="蜡笔大新"')->select(),1).'</pre>';

          //排序 倒序
          // echo '<pre>'.print_r($user-> order('id DESC') ->select(),1).'</pre>';
          // SELECT * FROM `think_user` ORDER BY id DESC 

          //echo '<pre>'.print_r($user->   order(array('id' => 'DESC') ) ->select(),1).'</pre>';
          //SELECT * FROM `think_user` ORDER BY `id` DESC

          //第二排序
          //var_dump($user->order('id desc,email desc')->select());
          //PS：先按 id 倒序，再按 email 倒序

          //feild 方法可以返回或操作字段，可以用于查询和写入操作。
          //echo '<pre>'.print_r($user-> field('id, user')->select(),1).'</pre>';
          //SELECT `id`,`user` FROM `think_user`
          
          //使用SQL函数和别名
          //echo '<pre>'.print_r($user-> field('SUM(id) as count')->select(),1).'</pre>';
          //SELECT SUM(id) as count FROM `think_user` 

          //使用数组
          //echo '<pre>'.print_r($user-> field(array('id','user'))->select(),1).'</pre>';

          //使用LEFT
          //echo '<pre>'.print_r($user->field(array( 'id','LEFT(user,3) AS left_user' ))->select(),1).'</pre>';
          //SELECT `id`,LEFT(user,3) AS left_user FROM `think_user` 

          //直接指向
          //echo '<pre>'.print_r($user->field(array( 'id','LEFT(user,3)' => 'left_user' ))->select(),1).'</pre>';

          //获取所有字段
          //echo '<pre>'.print_r($user->field()->select(),1).'</pre>';
          //SELECT * FROM `think_user`

          //用于写入
          //$user->field('user,email')->create();

          //echo '<pre>'.print_r($user->limit(2)->select(),1).'</pre>';
          //SELECT * FROM `think_user` LIMIT 2 

          //limit(n1,n2) n1代表从第几条开始  n1起始值0   n2代表多少条
          //echo '<pre>'.print_r($user->limit(2,2)->select(),1).'</pre>'; //从第三条开始，显示两条
          //SELECT * FROM `think_user` LIMIT 2,2

          //分页查询 page(n1,n2) n1代表第n1页 n1从1开始 n2代表多少条
          //echo '<pre>'.print_r($user->page(2,2)->select(),1).'</pre>';//第二页,显示两条

          //table 方法用于数据表操作，主要是切换数据表或多表操作
          //echo '<pre>'.print_r($user->table('think_info')->select(),1).'</pre>';

          //获取简化表名  think_info -- __INFO__
          //echo '<pre>'.print_r($user->table('__INFO__')->select(),1).'</pre>';
          //SELECT * FROM `think_info` 

          //多表查询
          //var_dump($user->field('a.id,b.id')->table('__USER__ a,__INFO__b')->select());
           
           //echo '<pre>'.print_r($user->field('a.user,b.user')->table('__USER__ a,__INFO__ b')->select(),1).'</pre>';
           //echo '<pre>'.print_r($user->field('a.id,b.id')->table( array('think_user'=>'a','think_info'=>'b'))->select(),1).'</pre>';

          //设置别名 
          //var_dump($user->alias('a')->select());
          //SELECT * FROM think_user a

          //echo '<pre>'.print_r($user->field('user,max(id)')->group('id')->select(),1).'</pre>';

          //echo '<pre>'.print_r($user->field('user,SUM(id)')->group('id')->having('id>2')->select(),1).'</pre>';
          //SELECT `user`,SUM(id) FROM `think_user` GROUP BY id HAVING id>2 

          //comment SQL注释
          //echo '<pre>'.print_r( $user->comment('所有用户')->select() ,1).'</pre>';
          //SELECT * FROM `think_user` /* 所有用户 */ 

          //返回不重复的列 可以用于去重
          //echo '<pre>'.print_r($user->distinct( true)->field('user')->select(),1).'</pre>';

          //var_dump($user->join('think_user ON think_info.id = think_user.id')->select());
          
          //缓存 查询缓存，第二次读取缓存内容
          //echo '<pre>'.print_r($user->cache( true)->select(),1).'</pre>';

          //命名范围其实就是将 SQL 语句封装在模型定义类里，而不在控制器里
          $user = D('User');
          //echo '<pre>'.print_r($user->scope('sql2')->select(),1).'</pre>';
          
          //支持多个调用
          //echo '<pre>'.print_r( $user->scope('sql1')->scope('sql2')->select(),1 ).'</pre>';

          //default默认 不选为默认
          //echo '<pre>'.print_r( $user->scope()->select(),1 ).'</pre>'; 

          //scope 第二个参数可以重新调整
          //echo '<pre>'.print_r($user->scope('sql2',  array('limit'=>4))->select(),1).'</pre>'; 

          //直接覆盖
          //echo '<pre>'.print_r($user->scope( array('where'=>1,'order'=>'date DESC','limit'=>2))->select(),1).'</pre>';
           
          //直接使用命名范围调用
          //echo '<pre>'.print_r($user->sql2()->select(),1).'</pre>';
      }    
    //数据创建 $user->create()
    public function create(){
        $user = M('User');
        //根据表单提交的POST数据，创建数据对象
        //PS：这里 create()方法就是数据创建，数据的结果就是提交的 POST 数据的键值对。
        //特别注意的是：提交过来的字段和数据表字段是对应的，否则无法解析。
        
        //create()方法可创建数据
        //方法一：
        //创建或者叫接收从表单提交过来的数据,类似Post方法。前提是 表单的域需要和数据库表自丢按对应。
        //查看数据结果就是 action的地址http://www1.webphp-lc.com/mvc-imook/weibo_v/1.4/Home/User/create
        //echo '<pre>'.print_r($user->create(),1).'</pre>';
        
        //方法二：手工创建数据 这个可以覆盖掉之前的
        //该方法不需要表单提交 直接刷新页面即可见创建的数据结果
        //$data['user']='樱桃小丸子';
        //$data['email']='yingtao@qq.com';
        //echo '<pre>'.print_r($user->create($data),1).'</pre>';
        
        //方法三：$_POST接收数据 数组形式
        //$data['user']= $_POST['user'];
        //$data['email']=$_POST['email'];
        //$data['date']=date('Y-m-d H:i:s');//时间不用提交过来 
        //echo '<pre>'.print_r($user->create($data),1).'</pre>';
        
        //方法四：对象形式获取数据
        //$data = new \stdClass();
        //$data->user = $_POST['user'];
        //$data->email =$_POST['email'];
        //$data->date =date('Y-m-d H:i:s');//时间不用提交过来 
        //echo '<pre>'.print_r($user->create($data),1).'</pre>';
        
        //方法五：GET获取数据
        //表单提交默认是POST方式的 下面改成GET方式提交 当然html中的表单提交方法也需要改成GET
        //echo '<pre>'.print_r($user->create($_GET),1).'</pre>';
        
        //------限制输出字段-------------------------------
        
        //create()结合field 只显示所需要的字段 起对提交过来的数据进行过滤作用
        //echo '<pre>'.print_r($user->field('user')->create(),1).'</pre>';
        
        //模型内进行过滤字段 
        /*UserModel.class.php 
        protected $insertFields = 'user';
        protected $updateFields = 'user';
         */
        $user = D('User');
        echo '<pre>'.print_r($user->create(),1).'</pre>'; 
    }       
    
    //数据新增-数据创建后新增到数据库
    public function add(){
        //新增一条手动添加的数据
        //$user = M('User');
        //$data['user']='annays';
        //$data['email']='anays@126.com';
        //$data['date']=date('Y-m-s H:i:s');
        //$user->add($data);
        
        //新增表单提交的数据
        //$user = M('User');
        //$data = $user->create();//将表单提交过来的数据对象赋给$data 这样操作的原因是 时间不能提交 但是可以设置 所以先创建对象$data
        //$data['date']=date('Y-m-s H:i:s');
        //$user->add($data);
        
        //add也支持连贯操作 例如data
        //$user = M('User');
        //$data = $user->create();//将表单提交过来的数据对象赋给$data 这样操作的原因是 时间不能提交 但是可以设置 所以先创建对象$data
        //$data['date']=date('Y-m-s H:i:s');
        //$user->data($data)->add();
        
        //连贯方法date可以支持字符串形式的键值对 只有data()方法可以 直接刷新页面 然后查看数据库
        $user = M('User');
        $data='user=星矢&email=xingshi@163.com&date='.date('Y-m-s H:i:s');
        $user->data($data)->add(); 
    }
    
    //数据读取
    public function select(){
        $user =M('User');
        //echo '<pre>'.print_r($user->select(),1).'</pre>';
        //读取第一条
        //echo '<pre>'.print_r($user->find(),1).'</pre>';
        
        //获取第一条user字段的值
        //echo '<pre>'.print_r($user->getField('user'),1).'</pre>';
        
        //获取所有user字段的值
        //echo '<pre>'.print_r($user->getField('user',true),1).'</pre>';
        //SELECT `user` FROM `think_user`
         
        //传递多个字段，获取所有 重复的被屏蔽了
        //echo '<pre>'.print_r($user->getField('user,email'),1).'</pre>';
        
        //id冒号分隔
        //echo '<pre>'.print_r($user->getField('id,user,email',':'),1).'</pre>';//id是主键
        
        //限制2条数据
        //echo '<pre>'.print_r($user->getField('id,user,email',2),1).'</pre>';
        //SELECT `id`,`user`,`email` FROM `think_user` LIMIT 2   
    }
    
    //数据更新
    public function save(){
        $user=M('User');
        
        /*修改第一条数据
        $data['user']='蜡笔大新';
        $data['email']='labidaxin@qq.com';
        $map['id']=1;//用于where
        $user->where($map)->save($data);
        
        //默认主键为条件
     
        $data['id'] = 1;//这种就不需要$map 会自动判断主键
        $data['user'] = '蜡笔老新';
        $data['email'] = 'xiaoxinold@163.com';
        $user->save($data); 
         
        //通过表单提交修改数据 需要在表单里设置一个隐藏域<input type="hidden" name="id" value="1"> 用来设置where
        //UPDATE `think_user` SET `user`='rose',`email`='rose@163.com' WHERE `id` = 1
     
        $user->create();
        $user->save();//返回值1 、 0

        
        //修改某一个值
        $map['id'] = 1;
        $user->where($map)->setField('user', '蜡笔大新');
      
        //统计累计，累加 
        $map['id'] = 1;
        $user->where($map)->setInc('count',1); //累加，setDec 累减 
        //每次刷新 http://www1.webphp-lc.com/mvc-imook/weibo_v/1.4/Home/User/save id为1的count都会自增
        //UPDATE `think_user` SET `count`=count+1 WHERE `id` = 1
        
        //累减
        $user->where($map)->setDec('count',1);
        //UPDATE `think_user` SET `count`=count-1 WHERE `id` = 1
         * 
         */
    }
    
    //数据删除
    public function delete(){
        //直接删除主键(id=17)
        $user = M('User');
        /*
        $user->delete(23);
          
        //根据ID来删除
        $map['id'] = 26;
        $user->where($map)->delete();
        //DELETE FROM `think_user` WHERE `id` = 26
         
        //批量删除多个
        $user->delete('1,3,5');
          
        //删除count为0且按时间倒序的前五个
        $map['count'] = 0;
        $user->where($map)->order(array('date'=>'DESC'))->limit(2)->delete();
        //DELETE FROM `think_user` WHERE `count` = 0 ORDER BY `date` DESC LIMIT 2
         
        //删除所有数据
         echo $user->where('1')->delete(); //1代表true 删除成功之后会返回1
         * 
         * delete()方法支持的连贯操作有：
            1.where，查询或更新条件；
            2.table，要操作的数据表名称；
            3.alias，数据表别名；
            4.order，结果排序；
            5.lock，锁；
            6.relation，关联查询；
            7.scope，命名范围；
            8.bind，数据绑定操作；
            9.comment，SQL 注释。
         * 
         */
    }

    //activeRecord
    //ActiveReocrd  模式
    //这种模式最大的特别就是简化了 CURD 的操作，并且采用对象化的操作方式，便于使用和理解。
    public function ar(){
        $user = M('User');
        /*
         * 添加一条数据
        $user->user = '火影忍者';
        $user->email = 'huoyin@qq.com';
        $user->date = date('Y-m-d H:i:s');
        $user->add();
        INSERT INTO `think_user` (`user`,`email`,`date`) VALUES ('火影忍者','huoyin@qq.com','2015-10-05 14:24:43');
      
         //结合create 这个不需要设置html的主键
        $user->create();
        $user->date = date('Y-m-d H:i:s');
        $user->add();
         
        //找到主键为4的值
        echo '<pre>'.print_r($user->find(4),1).'</pre>';

        //查找user=蜡笔小新的记录
        echo '<pre>'.print_r($user->getByUser('蜡笔大新'),1).'</pre>';
        echo $user->email; //输出对应"蜡笔大新" 的 email
        
        //通过主键查询多个
        echo '<pre>'.print_r($user->select('1,2,3'),1).'</pre>';
        //SELECT * FROM `think_user` WHERE `id` IN ('1','2','3')
         
        //修改一条数据
        $user->find(1);
        $user->user='蜡笔老新';
        $user->email='labilaoxin@qq.com';
        $user->save();
        //SELECT * FROM `think_user` WHERE `id` = 1 LIMIT 1 
        //UPDATE `think_user` SET `user`='蜡笔老新',`email`='labilaoxin@qq.com',`date`='2015-09-05 15:42:00',`count`='2' WHERE `id` = 1
        
        //删除当前找到的数据
        $user->find(11);
        $user->delete();
        
        //删除主键为10的数据
        $user->delete(10);
        
        //删除主键为10,11的数据
        $user->delete('10,11');
         * * 
         */   
    }
    
    //字段映射 需要在模型里设置映射的字段 如果表单域的字段 数据表里没有 就会获取不到
    public function zdys(){
        $user = D('User');
        echo '<pre>'.print_r($user->create() ).'</pre>';
    }

    //自动验证
    public function validate(){
        /* 静态验证 验证规则在模型里
        $user = D('User');
        //模拟POST验证 在UserModel.class.php中对字段进行验证
        $data['user']='ss';
        $data['email']='bbb';
        if( $user->create($data) ){
            echo '所有字段验证成功';
        }else{
            echo '<pre>'.print_r($user->getError()).'</pre>';
            //返回JSON格式
            //$this->ajaxReturn($user->getError());
        }
        */
        //动态验证 动态验证就是把验证的规则放在控制器端，这样，在操作的时候比较灵活，缺点就是比较混乱。
        $rule =  array(
            array('user', 'require', '用户名不得为空'),
        );
        $user = M('User');
        $data['user'] = '';
        if ($user->validate($rule)->create($data)) {
            echo '验证所有字段成功！';
        } else {
         var_dump($user->geterror());
        }
        
    }
}