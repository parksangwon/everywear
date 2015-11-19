<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Location_model');
	}
	/**
	insertLocaton method
	URL로 입력받은 데이터를 DB에 저장하고 결과값 json으로 return
	link : http://(serverIP)/index.php/Location/insertLocaton?ino=(ino)&date=(date)&lon=(lon)&lat=(lat)
	*/
	function insertLocation() {
		$ino  = $this->input->post('ino', true);
		$date = $this->input->post('date', true);
		$lon  = $this->input->post('lon', true);
		$lat  = $this->input->post('lat', true);
		if ( $ino == null || $date == null || $lon == null || $lat == null ) {
			echo json_encode(array('resut' => 0));
			return 0;
		}
		if ( strcmp($ino, "NULL")==0 || strcmp($date, "NULL")==0 || strcmp($lon, "NULL")==0 || strcmp($lat, "NULL")==0 ) {
			echo json_encode(array('result' => 0));
			return 0; 
		}

		$formatedStr = substr($date, 0, 4)."-".substr($date, 4, 2)."-".substr($date, 6, 2)." "
						.substr($date, 8, 2).":".substr($date, 10, 2).":".substr($date, 12, 2);
		
		$result = $this->Location_model->addLocation(array(
			'ino'	=>$ino,
			'date'	=>$formatedStr,
			'lon'	=>$lon,
			'lat'	=>$lat
		));

		echo json_encode($result);
	}

	/**
	searchLocations method
	URL로 입력받은 IOT 일련번호에 따라 저장된 위치 데이터를 json으로 return
	link : http://(serverIP)/index.php/Location/searchLocations?ino=(ino)
	*/
	function searchLocations(){
		$ino  = $this->input->get('ino', true);
		$get_loc_data=$this->Location_model->getLocations($ino);
		echo json_encode($get_loc_data);
	}

}
?>
