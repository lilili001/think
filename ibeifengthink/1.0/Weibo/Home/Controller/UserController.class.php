<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show('user index');
    }

    public function test(){
    	$this->show('user test');
    }
}