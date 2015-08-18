<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Location_model');
	}
	/**
	insert method
	URL로 입력받은 데이터를 DB에 저장하고 성공 : 0 , 실패 : 1 json으로 return
	link : http://(serverIP)/index.php/Location/insert_locaton?ino=(data)&date=(date)&lon=(data)&lat=(data)
	*/
	function insert_location() {

		$result = $this->Location_model->add(array(
			'ino'	=>$this->input->get('ino'),
			'date'	=>$this->input->get('date'),
			'lon'	=>$this->input->get('lon'),
			'lat'	=>$this->input->get('lat')
		));
		#성공시 auto_increment 값, 실패시 null
		if ( $result != NULL ) {
			$json_data = array(
				'result' => 0
			);
		}  else {
			$json_data = array(
				'result' => 1
			);
		}
		$json_data = json_encode($json_data);
		echo $json_data;
	}
}
?>