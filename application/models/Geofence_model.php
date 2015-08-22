<?php
class Geofence_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	/**
	getGeofenceData method
	기본으로 설정된 DB를 everywear에서 service로 변경후
	ino와 일치하는 Geofence data를 return
	*/
	function getGeofenceData($ino){
		$change_DB="USE SERVICE";
		$this->db->query($change_DB);
		$query="SELECT * FROM GEOFENCE WHERE INO='$ino'";
		$geofenceData=$this->db->query($query)->result_array();
		return $geofenceData;
	}
}
?>	