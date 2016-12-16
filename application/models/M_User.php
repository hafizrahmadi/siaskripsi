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

	function setUser($data){
		if ($data['id_user']=='') {
			$query = "INSERT INTO tb_user(username,password,level,DELETED) VALUES(
			'".$data['username']."',
			'".$data['password']."',
			'".$data['level']."',
			'N')";
		}else{
			$query = "UPDATE tb_user SET ".
			"username = '".$data['username']."',".
			"password = '".$data['password']."',".
			" WHERE id_user = ".$data['id_user'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	function getIDUser($id){
		$query = "select * from tb_user where id_user =".$id;
		$result = $this->db->query($query);
		return $result->result_array();
	}
}
 ?>