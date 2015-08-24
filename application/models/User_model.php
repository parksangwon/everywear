<?php
class User_model extends CI_Model{
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
		$query="SELECT NAME from APPUSER WHERE ID='$id' and PW='$pw'";
		$data=$this->db->query($query)->row();

		$json_data = array('result' => 0);
		if ( !is_null($data) ) {
			$name = $data->NAME;
			$json_data = array(
				'result' => 1,
				'name' => urlencode($name)
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
		
		$json_data = array('result' => 0);
		if( !is_null($data) ){
			$json_data = array(
				'result' => 1
			);
		}
		return $json_data;
	}

	/**
	isExsist method
	id가 존재하면 true, 존재하지 않으면 false
	*/
	function isExsist($id) {
		$query="SELECT ID from APPUSER WHERE ID='$id'";
		$data = $this->db->query($query)->row();
		// 존재하면 true 존재하지 않으면 false

		$result = false;
		if ( !is_null($data) ) {
			$result = true;
		}
		return $result;
	}

	/**
	addUser method
	id가 중복되는지 확인 한 후 삽입 성공 1 실패 0
	*/
	function addUser($data) {
		$id = $data['id'];
		$pw = $data['pw'];
		$name = $data['name'];
		$email = $data['email'];
		$sex = $data['sex'];

		/* 중복되는 ID인지 먼저 validation */
		$json_data = array('result' => 0);
		if ( !( $this->isExsist( $id ) ) ) {
			// 존재하지 않으면 
			$query = "INSERT INTO APPUSER VALUES('$id', '$pw', '$name', '$email', '$sex')";
			$result = $this->db->query($query);

			if ( $result == TRUE ) {
				$json_data = array(
					'result' => 1
				);
			}
		}
		return $json_data;
	}

}
?>