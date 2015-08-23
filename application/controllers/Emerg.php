<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emerg extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('emerg_model');
	}

	/**
	getinfo는 emerg_model에 ino를 넘겨줘서 getdata메소드를 통해
	마지막 위치데이터를 리턴 받아 loc_data 변수에 저장한다.
	또한  해당 ino를 등록한 App User의 아이디를 groupcheck메소드를 통해
	불러온 아이디를 get_id_data 변수에 저장한다.
	loc_id_data 변수는 배열로 저장된 loc_data(마지막 위치데이터)와 get_id_data (해당 ino를 저장한 id들)을
	다시 배열로 저장하여 한 번에 표시해 주는 메소드이다.

	link : http://(serverIP)/index.php/Emerg/getinfo/(ino)
	*/
	public function getinfo($ino){

		$loc_data=$this->emerg_model->getdata($ino);
		$get_id_data=$this->emerg_model->groupcheck($ino);
		$loc_id_data=array($loc_data[0],$get_id_data);

		echo json_encode($loc_id_data);
	}
}
?>