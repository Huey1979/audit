<?php
namespace Home\Controller;

use Think\Controller;
class UserController extends Controller {
	
    protected function _initialize() {
		session_start();
	}
	
	public function index(){
		if(!empty($_SESSION['adminid'])){
			$this->redirect('Index/index');
		}
		$this->assign('jsFiles', array('user.js'));
		$this->display();
	}
	
	public function login(){
		$user = I('get.userid');
		$password = I('get.password');
		D('User')->getUser($user, $password);
	}
}