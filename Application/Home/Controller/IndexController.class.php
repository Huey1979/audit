<?php
namespace Home\Controller;
class IndexController extends Base {
    public function index(){
		$menus = array(
			array(
				'title' => '项目设置',
				'submenu' => array(
					array(
						'title' => '项目列表',
						'url' => '/project',
					),
					array(
						'title' => '学员列表',
						'url' => '/student',
					),
				),
			),
		);
		if($_SESSION['adminType'] == 10){
		$menus[] = 
			array(
				'title' => '系统配置',
				'submenu' => array(
					array(
						'title' => '类型列表',
						'url' => '/select',
					),
					array(
						'title' => '表格列表',
						'url' => '/table',
					),
					array(
						'title' => '手续办理',
						'url' => '/audit',
					),
					array(
						'title' => '会员权限',
						'url' => '/users',
					),
				),
			);
		} 	
		$this->assign('menus', $menus);
		$this->assign('jsFiles', 'index.js');
		$this->display();
    }
}