<?php
class Emerg_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

/**
getdata는 비상을 나타내는 flag 0 or 1의 값과 ino를 받은 후,
DB의 location 테이블에서 IoT사용자의 마지막 데이터를 불러 온다.
추가로 groupcheck()메서드를 통해 in0를 등록한 아이디들을 반환.
*/
public function getdata($flag,$ino){

 		$query="select * from location where ino='$ino' order by lno desc limit 1";
		$iotdata=$this->db->query($query)->result_array();
			//$id_data= $this->groupcheck($ino);

		return $iotdata;

	

}




/**
groupcheck는 ino 데이터를 받아 DB의 party 테이블에서 아이디를 조회한 후, 
IoT일련번호를 등록한 ID들을 배열로 리턴하는 역할을 한다.
*/
public function groupcheck($ino){
	

	$query="select id from party where ino='$ino'";
	$id_data=$this->db->query($query)->result_array();
	
	return $id_data;

}
}
?>	