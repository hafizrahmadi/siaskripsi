<?php 
if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
* 
*/
class M_User extends CI_Model
{
	function login($username,$password){
		$this->db->select('id_user,username,password,level');
		$this->db->from('tb_user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result_array();
		}else{
			return false;
		}
	}
}
 ?>