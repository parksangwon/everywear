<?php
class Usercheck_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function getdata($id, $pw){
		$query="select id from appuser where id='$id' and pw='$pw'";
		$data=$this->db->query($query)->row();
		/**
		id와 pw가 모두 일치할 때 1
		id는 일치하고 pw는 일치하지 않을때 0
		id는 일치하지 않고 pw는 일치할 때 0
		id와 pw가 모두 일치하지 않을 때 0
		*/

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