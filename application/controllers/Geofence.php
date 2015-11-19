<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Geofence extends CI_Controller {
 	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('Geofence_model');
	}
	/**
	getGeofence method
	일련번호가 ino인 Geofence를 return
	link : http://(serverIP)/index.php/Geofence/getGeofence?ino=(ino)
	*/
	function getGeofence(){
		$ino = $this->input->get('ino', true);
		$geofenceData=$this->Geofence_model->getGeofenceData($ino);
		 echo json_encode($geofenceData);
	}
}
?>
