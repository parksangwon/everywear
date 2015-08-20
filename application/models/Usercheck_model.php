<?php
class Usercheck_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function getdata($id, $pw){
		$id_query="select id from appuser where id='$id'";
		$pw_query="select pw from appuser where id='$id'";
		$DB_id=$this->db->query($id_query)->row();
		$DB_pw=$this->db->query($pw_query)->row();

		if($id==$DB_id->id&&$pw==$DB_pw->pw){
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