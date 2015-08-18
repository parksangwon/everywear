<?php
class Search_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function gets($ino){
		$query="select * from location where ino='$ino'";
		$loc_data=$this->db->query($query)->result_array();
		return $loc_data;
	}
}
?>	