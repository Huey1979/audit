<?php
namespace Home\Controller;

use Think\Controller;
class Base extends Controller {
	
    protected function _initialize() {
		session_start();
		if(empty($_SESSION['adminid'])){
			$this->redirect('/User/index');
		}
		$siteInfo = array(
			'title' => C('WEBNAME'),
		);
		$this->assign('siteInfo', $siteInfo);
	}
}