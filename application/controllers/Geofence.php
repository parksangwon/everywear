<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Geofence extends CI_Controller {
 	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('geofence_model');
 }

public function geodata($ino){
	$get_geofence_data=$this->geofence_model->geofence_Table($ino);
	 echo json_encode($get_geofence_data)."<br/><br/>";
}



}
?>