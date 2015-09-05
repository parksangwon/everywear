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
		$ino  = $this->input->get('ino');
		$date = $this->input->get('date');
		$lon  = $this->input->get('lon');
		$lat  = $this->input->get('lat');

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
		$ino  = $this->input->get('ino');
		$get_loc_data=$this->search_model->getLocations($ino);
		echo json_encode($get_loc_data);
	}
}
?>