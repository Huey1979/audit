<?php
namespace Home\Model;
class UserModel extends DataModel{
	
	protected $trueTableName = 'dede_member';
	
	public function getUser($userid, $password){
		$info = $this->table('dede_member m JOIN dede_admin a ON m.mid=a.id LEFT JOIN tbl_userright r ON r.mid=m.mid')->where(array('m.userid' => $userid, 'm.pwd' => md5($password)))->field('m.mid, a.usertype, r.type')->select();
		print_r($this);
		if(is_array($info) && sizeof($info) > 0){
			$_SESSION['adminid'] = $info[0]['mid'];
			$_SESSION['isSYSOP'] = $info[0]['usertype'] == 10;
			foreach($info as $val){
				switch($val['type']){
					case 0:
						$_SESSION['isAdder'] = true;
						break;
					case 1:
						$_SESSION['isAuditer'] = true;
						break;
					case 2:
						$_SESSION['isChecker'] = true;
						break;
				}
			}
			echo 'success'; 
		}else{
			echo 'badpwd';
		}
	}
}