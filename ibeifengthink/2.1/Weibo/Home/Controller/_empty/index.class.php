<?php
namespace Home\Controller\_empty;
use Think\Controller;
class index extends Controller {
    //put your code here
    public function run(){
        echo '找不到'.CONTROLLER_NAME.'控制器的'.ACTION_NAME;
    }
}
