<?php if ( ! defined('BASEPATH')) exit('No direct script access aloowed');
class Usercheck  extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Usercheck_model');
	}

	function check_id($id, $pw){
		$id=$this->Usercheck_model->getdata($id,$pw);
		echo json_encode($id);
	}
}


?>