<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Event;
use Think\Controller;
class UserEvent extends Controller {
    public function test() {
        echo '当事件触发时Admin<br/>';
    }
}
