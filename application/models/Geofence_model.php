<?php
class Geofence_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	/**
	getGeofenceData method
	�⺻���� ������ DB�� everywear���� service�� ������
	ino�� ��ġ�ϴ� Geofence data�� return
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