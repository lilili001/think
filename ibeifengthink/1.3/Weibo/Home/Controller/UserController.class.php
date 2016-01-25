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
    
          
    }
}