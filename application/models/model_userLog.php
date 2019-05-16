<?php 
class model_userLog extends CI_Model{

	function login($username, $password){
		$checking = $this->db->get_where('user', array('username'=>$username,'password'=>md5($password)));
		if($checking->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
}
?>