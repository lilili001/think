<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller\Alice;
use Think\Controller;
class AliceController extends Controller{
    public function index(){
        echo '多级控制器';
    }
    public function test(){
        echo '多级控制器test';
    }
}