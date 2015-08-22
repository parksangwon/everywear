<?php
class Usercheck_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	/**
	searchUser method
	id, pw가 일치하는 데이터가 있는지 조회
	id와 pw가 모두 일치할 때 1
	id는 일치하고 pw는 일치하지 않을때 0
	id는 일치하지 않고 pw는 일치할 때 0
	id와 pw가 모두 일치하지 않을 때 0
	*/
	function searchUser($id, $pw) {
		$query="SELECT ID from APPUSER WHERE ID='$id' and PW='$pw'";
		$data=$this->db->query($query)->row();

		$json_data = null;
		if($data!=null){
			$json_data = array(
				'result' =>1
			);
		}else{
			$json_data=array(
				'result' =>0
			);
		}
		return $json_data;
	}
	/**
	searchDevice method
	ino와 일치하는 Device가 존재하는지 조회
	*/
	function searchDevice($ino) {
		$query = "SELECT INO FROM IOT WHERE INO='$ino'";
		$data = $this->db->query($query)->row();
		
		$json_data = null;
		if($data!=null){
			$json_data = array(
				'result' =>1
			);
		}else{
			$json_data=array(
				'result' =>0
			);
		}
		return $json_data;
	}
}
?>