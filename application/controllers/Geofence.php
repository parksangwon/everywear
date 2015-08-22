<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Geofence extends CI_Controller {
 	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('Geofence_model');
	}
	/**
	getGeofence method
	일련번호가 ino인 Geofence를 가져와 return
	link : http://(serverIP)/index.php/Geofence/getGeofence/(ino)
	*/
	function getGeofence($ino){
		$geofenceData=$this->Geofence_model->getGeofenceData($ino);
		 echo json_encode($geofenceData);
	}
}
?>