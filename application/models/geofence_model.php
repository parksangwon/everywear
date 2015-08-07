<?php
class Geofence_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	/** geofence_Table은 IoT칩으로부터 ino를 받음.
	기본으로 설정된 DB를 everywear에서 service로 변경후
	geofence 테이블에서 해당 ino의 데이터를 반환한다.*/
public function geofence_Table($ino){
	$change_DB="use service";
	$this->db->query($change_DB);
	$query="select * from geofence where ino='$ino'";
	$geofence_data=$this->db->query($query)->result_array();
	return $geofence_data;
}
}
?>	