<?php
namespace Home\Model;
use Think\Model;
class DataModel extends Model{
	protected $tablePrefix = 'tbl_';
	
	protected $connection = array (
			'db_type' => 'mysql',
			'db_user' => 'dedecms',
			'db_pwd' => 'dedecms123',
			'db_port' => '3306',
			'db_prefix' => 'tbl_', // ���ݿ��ǰ׺
			'db_dsn'    => 'mysql:host=localhost;dbname=dedecms;charset=utf8',
	);
}