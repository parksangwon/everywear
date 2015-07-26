<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('location_model');
	}
	function insert() {
		// validation?

		$result = $this->location_model->add(array(
			'ino'=>$this->input->get('ino'),
			'lon'=>$this->input->get('lon'),
			'lat'=>$this->input->get('lat')
		));
		#echo var_dump($result); #성공시 리턴값 auto_increment 값 # 실패시 null

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
	function gets() {
		$this->load->database();
		$this->load->model('location_model');
		$data = $this->location_model->gets();
	}
}
?>