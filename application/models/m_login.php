<?php
class M_login extends CI_Model{
	function login_check($table, $where){
		$this->db->join('usergroup', 'usergroup.id = user.groupid');
		return $this->db->get_where($table, $where);
	}
}
?>