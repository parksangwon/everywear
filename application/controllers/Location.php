<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Location_model');
	}
	/**
	insert method
	URL로 입력받은 데이터를 DB에 저장하고 성공 : 1 , 실패 : 0 json으로 return
	link : http://(serverIP)/index.php/Location/insert_locaton?ino=(data)&date=(date)&lon=(data)&lat=(data)
	*/
	/*
	function insert_location() {
		// parse dateStr to datetime format string
		$dateStr = $this->input->get('date');
		$formatedStr = substr($dateStr, 0, 4)."-".substr($dateStr, 4, 2)."-".substr($dateStr, 6, 2)." "
						.substr($dateStr, 8, 2).":".substr($dateStr, 10, 2).":".substr($dateStr, 12, 2);
		$result = $this->Location_model->add(array(
			'ino'	=>$this->input->get('ino'),
			'date'	=>$formatedStr,
			'lon'	=>$this->input->get('lon'),
			'lat'	=>$this->input->get('lat')
		));
		//성공시 auto_increment 값, 실패시 null
		if ( $result != NULL ) {
			$json_data = array(
				'result' => 1
			);
		}  else {
			$json_data = array(
				'result' => 0
			);
		}
		$json_data = json_encode($json_data);
		echo $json_data;
	}*/
	function insert_location($ino, $date, $lon, $lat) {
		// parse dateStr to datetime format string
		$dateStr = $date;
		$formatedStr = substr($dateStr, 0, 4)."-".substr($dateStr, 4, 2)."-".substr($dateStr, 6, 2)." "
						.substr($dateStr, 8, 2).":".substr($dateStr, 10, 2).":".substr($dateStr, 12, 2);
		$result = $this->Location_model->add(array(
			'ino'	=>$ino,
			'date'	=>$formatedStr,
			'lon'	=>$lon,
			'lat'	=>$lat
		));
		//성공시 auto_increment 값, 실패시 null
		if ( $result != NULL ) {
			$json_data = array(
				'result' => 1
			);
		}  else {
			$json_data = array(
				'result' => 0
			);
		}
		$json_data = json_encode($json_data);
		echo $json_data;
	}
}
?>