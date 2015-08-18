<?php
class Emerg_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

/**
getdata메소드는 emerg로부터 ino를 받아서 DB에서 해당 ino의 마지막 위치 데이터를 배열로 리턴한다.
*/
	public function getdata($ino){

	 		$query="select * from location where ino='$ino' order by lno desc limit 1";
			$iotdata=$this->db->query($query)->result_array();
			return $iotdata;

	}

/**
groupcheck는 ino 데이터를 받아 DB의 party 테이블에서 
 해당 ino를 등록한 아이디를 조회한 후,  ID들을 배열로 리턴하는 역할을 한다.
*/
	public function groupcheck($ino){
		
		$query="select id from party where ino='$ino'";
		$id_data=$this->db->query($query)->result_array();
		
		return $id_data;

	}

}
?>	