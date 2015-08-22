<?php if ( ! defined('BASEPATH')) exit('No direct script access aloowed');
class Usercheck  extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Usercheck_model');
	}
	/**
	checkId method
	id와 pw를 입력받고 DB에서 조회한다. 일치하면 1, 존재하지 않거나 일치하지 않으면 0
	link : http://(serverIP)/index.php/Usercheck/checkId/(id)/(pw)
	*/
	function checkId($id, $pw) {
		$result=$this->Usercheck_model->searchUser($id,$pw);
		echo json_encode($result);
	}
	/**
	checkDevice method
	ino와 일치하는 디바이스를 조회한다. 일치하면 1, 존재하지 않으면 0
	link : http://(serverIP)/index.php/Usercheck/checkDevice/(ino)
	*/
	function checkDevice($ino) {
		$result = $this->Usercheck_model->searchDevice($ino);
		echo json_encode($result);
	}
}


?>